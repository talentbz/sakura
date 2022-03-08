<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function index(Request $request){ 
        return view('admin.pages.shipping.index', [

        ]);
    }

    public function chat(Request $request, $id){ 
        return view('admin.pages.shipping.chat', [

        ]);
    }
}