<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

class GalleryController extends Controller
{
    public function index(Request $request){
        $video = Video::orderBy('id', 'Desc')->paginate(12);
        return view('front.pages.gallery.video', [
            'video' => $video,
        ]);
    }
    public function fetch_data(Request $request){
        if($request->ajax()) {
            $video = Video::paginate(12);
            return view('front.pages.gallery.pagination',  [
                'video' => $video,
            ]);
        }
    }
}
