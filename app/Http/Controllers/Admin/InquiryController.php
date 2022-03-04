<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiry;


class InquiryController extends Controller
{
    public function index(Request $request){
        
        $inquery = Inquiry::get();
        return view('admin.pages.inquiry.index', [
            'inquery' => $inquery,
        ]);
    }
}
