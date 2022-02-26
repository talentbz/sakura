<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request) {
        return view('admin.pages.news.index', [

        ]);
    }
    public function add(Request $request) {
        
        return view('admin.pages.news.create', [

        ]);
    }
}
