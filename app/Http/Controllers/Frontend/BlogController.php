<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\NewsImage;

class BlogController extends Controller
{
    public function index(Request $request){
        $news = News::leftJoin('news_image', 'news.id', '=', 'news_image.news_id')
                    ->groupBy('news.id')
                    ->orderBy('news.created_at', 'desc')
                    ->paginate(10);
        return view('front.pages.blog.index', [
            'news' => $news,
        ]);
    }
    public function details(Request $request){

        return view('front.pages.blog.details');
    }
}
