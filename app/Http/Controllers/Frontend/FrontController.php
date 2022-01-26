<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        return view('front.index');
    }
    public function clear(Request $request)
    {
        \Artisan::call('route:clear');
        \Artisan::call('view:clear');
        return "cleared cache";
    }
}
