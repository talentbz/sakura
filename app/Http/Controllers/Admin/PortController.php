<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PortController extends Controller
{
    public function index(Request $request){   
        $country= config('config.country');
        return view('admin.pages.port.index', [
            'country' => $country,
        ]);
    }

    public function edit(Request $request, $param){ 
        $country= config('config.country');
        return view('admin.pages.port.edit', [
            'country' => $country,
            'param' => $param,
        ]);
    }
}
