<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use DB, Validator, Exception, Image, URL;
use Auth;
use App\Models\News;
use App\Models\NewsImage;
use App\Models\User;

class NewsController extends Controller
{
    public function index(Request $request) {
        $news = News::leftJoin('news_image', 'news_image.news_id', '=', 'news.id')
                    ->groupBy('news.id')
                    ->orderBy('news.created_at', 'desc')
                    ->get();
        return view('admin.pages.news.index', [
            'news' => $news,
        ]);
    }
    public function add(Request $request) {
        return view('admin.pages.news.create', [
        ]);
    }
    public function add_post(Request $request) {
        $user_id = Auth::user()->id;
        $user_name = User::where('id', $user_id)->first()->name;
        $news = new News;
        $news->title = $request->news_title;
        $news->description = $request->news_contents;
        $news->date = $request->news_date;
        $news->user = $user_name;
        $news->save();
        if ($request->has('file')) { 
            $news_id = News::latest('id')->first()->id;
            $path = public_path('uploads/news/'.$news_id.'/');
            if(!file_exists($path)){
                File::makeDirectory($path);
            }
            foreach($request->file as $row){
                $news_image = new NewsImage;
                $fileName = $row->getClientOriginalName();
                $imgx = Image::make($row->getRealPath())->save($path.$fileName);
                $news_image->news_id = $news_id;
                $news_image->image = $fileName;
                $news_image->save(); 
            }
        }
    }
    public function edit(Request $request, $id) {
        $news = News::findOrFail($id);
        $image_path = NewsImage::where('news_id', $id)->get();
        $get_url = URL::asset('uploads/news/'.$id);
        $get_image_path = [];
        $id_array = [];
        foreach($image_path as $row){
            array_push($get_image_path, $get_url.'/'.$row->image);
            array_push($id_array, ["key"=>($row->id)]);
        }
        return view('admin.pages.news.edit', [
            'news' => $news,
            'get_image_path' => $get_image_path,
            'id_array' => $id_array,
        ]);
    }
    public function edit_post(Request $request) {
        $user_id = Auth::user()->id;
        $user_name = User::where('id', $user_id)->first()->name;
        $news = News::findOrFail($request->id);
        $news->title = $request->news_title;
        $news->description = $request->news_contents;
        $news->date = $request->news_date;
        $news->user = $user_name;
        $news->save();
        return response()->json(['updated' => true]);
    }
    public function imageDelete(Request $request) {
        $id = $request->key;
        $news_id = NewsImage::where('id', $id)->first()->news_id;
        $fileName = NewsImage::where('id', $id)->first()->image;
        $real_image = ('uploads/news/'.$news_id.'/'.$fileName);
        if(File::exists(public_path($real_image))){
            File::delete(public_path($real_image));   
        }
        $result = NewsImage::where('id', $id)->delete();
        return response()->json(['result' => true, 'deleted' => $result]);
    }
    public function imageAdd(Request $request) {
        if ($request->has('file')) { 
            $news_id = $request->news_id;
            $path = public_path('uploads/news/'.$news_id.'/');
            if(!file_exists($path)){
                File::makeDirectory($path);
            }
            foreach($request->file as $row){
                $fileName = $row->getClientOriginalName();
                $imgx = Image::make($row->getRealPath())->save($path.$fileName);
                $news_image = new NewsImage;
                $news_image->news_id = $news_id;
                $news_image->image = $fileName;
                $news_image->save(); 
            }
        }
        return response()->json(['uploaded' => true]);
    }
    public function delete(Request $request){
        $news_id = $request->id;
        $fileNames = NewsImage::where('news_id', $news_id)->get();

        foreach($fileNames as $fileName){
            $real_image = ('uploads/news/'.$news_id.'/'.$fileName->image);
            if(File::exists(public_path($real_image))){
                File::delete(public_path($real_image));   
            }
        }
        NewsImage::where('news_id', $news_id)->delete();
        News::where('id', $news_id)->delete();
        return response()->json(['result' => true]);
    }
}
