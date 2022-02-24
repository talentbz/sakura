<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request){
        
        return view('front.pages.contact.index', [

        ]);
    }
    public function company(Request $request){
        
        return view('front.pages.company.index', [

        ]);
    }
    public function agents(Request $request){
        
        return view('front.pages.agents.index', [

        ]);
    }
    public function gallery(Request $request){
        
        return view('front.pages.gallery.index', [

        ]);
    }
    public function payment(Request $request){
        
        return view('front.pages.payment.index', [

        ]);
    }
}
