<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use DB, Validator, Exception, Image, URL;
use App\Models\UserReview;
use App\Models\UserReviewImage;


class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $review = UserReview::leftJoin('user_review_image', 'user_review.id', '=', 'user_review_image.user_review_id')
                            ->groupBy('user_review_image.user_review_id')
                            ->orderBy('user_review.created_at', 'desc')
                            ->get();
        
        return view('admin.pages.customer.index', [
            'review' => $review,
        ]);
    }
    public function add(Request $request)
    {
        $country = config('config.country');
        return view('admin.pages.customer.create', [
            'country' => $country,
        ]);
    }
    public function edit(Request $request, $id)
    {
        $country = config('config.country');
        $review = UserReview::findOrFail($id);
        $image_path = UserReviewImage::where('user_review_id', $id)->get();
        $get_url = URL::asset('uploads/review/'.$id);
        $get_image_path = [];
        $id_array = [];
        foreach($image_path as $row){
            array_push($get_image_path, $get_url.'/'.$row->image);
            array_push($id_array, ["key"=>($row->id)]);
        }
        return view('admin.pages.customer.edit', [
            'country' => $country,
            'get_image_path' => $get_image_path,
            'review' => $review,
            'id_array' => $id_array,
        ]);
    }
    public function edit_post(Request $request) {
        $review = UserReview::findOrFail($request->id);
        $review->customer_name = $request->customer_name;
        $review->country = $request->country;
        $review->register_date = $request->register_date;
        $review->title = $request->title;
        $review->description = $request->description;
        $review->rate = $request->rate;
        $review->save();
        return response()->json(['updated' => true]);
    }
    public function add_post(Request $request){
        $review = new UserReview;
        $review->customer_name = $request->customer_name;
        $review->country = $request->country;
        $review->title = $request->title;
        $review->description = $request->description;
        $review->register_date = $request->register_date;
        $review->rate = $request->rate;
        $review->save();
        if ($request->has('file')) { 
            $review_id = UserReview::latest('id')->first()->id;
            $path = public_path('uploads/review/'.$review_id.'/');
            if(!file_exists($path)){
                File::makeDirectory($path);
            }
            foreach($request->file as $row){
                $review_image = new UserReviewImage;
                $fileName = $row->getClientOriginalName();
                $imgx = Image::make($row->getRealPath())->save($path.$fileName);
                $review_image->user_review_id = $review_id;
                $review_image->image = $fileName;
                $review_image->save(); 
            }
        }
    }
    public function imageDelete(Request $request) {
        $id = $request->key;
        $review_id = UserReviewImage::where('id', $id)->first()->user_review_id;
        $fileName = UserReviewImage::where('id', $id)->first()->image;
        $real_image = ('uploads/review/'.$review_id.'/'.$fileName);
        if(File::exists(public_path($real_image))){
            File::delete(public_path($real_image));   
        }
        $result = UserReviewImage::where('id', $id)->delete();
        return response()->json(['result' => true, 'deleted' => $result]);
    }
    public function imageAdd(Request $request) {
        if ($request->has('file')) { 
            $review_id = $request->review_id;
            $path = public_path('uploads/review/'.$review_id.'/');
            if(!file_exists($path)){
                File::makeDirectory($path);
            }
            foreach($request->file as $row){
                $fileName = $row->getClientOriginalName();
                $imgx = Image::make($row->getRealPath())->save($path.$fileName);
                $news_image = new UserReviewImage;
                $news_image->user_review_id = $review_id;
                $news_image->image = $fileName;
                $news_image->save(); 
            }
        }
        return response()->json(['uploaded' => true]);
    }
    public function delete(Request $request){
        $review_id = $request->id;
        $fileNames = UserReviewImage::where('user_review_id', $review_id)->get();

        foreach($fileNames as $fileName){
            $real_image = ('uploads/review/'.$review_id.'/'.$fileName->image);
            if(File::exists(public_path($real_image))){
                File::delete(public_path($real_image));   
            }
        }
        UserReviewImage::where('user_review_id', $review_id)->delete();
        UserReview::where('id', $review_id)->delete();
        return response()->json(['result' => true]);
    }
}
