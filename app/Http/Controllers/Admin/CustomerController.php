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
}
