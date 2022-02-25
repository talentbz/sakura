<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request){

        return view('front.pages.blog.index');
    }
    public function details(Request $request){

        return view('front.pages.blog.details');
    }
}
