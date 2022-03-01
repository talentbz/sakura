<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function index(Request $request){
        
        $country= config('config.country');
        return view('front.pages.contact.index', [
            'country' => $country,
        ]);
    }
    public function contactEmail(Request $request){
        Mail::send('mail', array(
            'is_contact'  =>'on',
            'subject' => $request->get('subject'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'country' => $request->get('country'),
            'city' => $request->get('city'),
            'comment' => $request->get('comment'),
        ), function($message) use ($request){
            $message->from('inquiry@sakuramotors.com');
            $message->to('inquiry@sakuramotors.com', $request->subject)
                    ->subject($request->subject);
        });      
        
        return back()->with('success', 'Thanks for contacting!');
    }
    public function inquiryEmail(Request $request){
        Mail::send('mail', array(
            'is_contact'  =>'off',
            'vehicle_name' => $request->get('vehicle_name'),
            'fob_price' => $request->get('fob_price'),
            'inspection' => $request->get('inspection'),
            'insurance' => $request->get('insurance'),
            'inqu_port' => $request->get('inq_port'),
            'total_price' => $request->get('total_price'),
            'site_url' => $request->get('site_url'),
            'inqu_name' => $request->get('inqu_name'),
            'inqu_country' => $request->get('inq_country'),
            'inqu_email' => $request->get('inqu_email'),
            'inqu_address' => $request->get('inqu_address'),
            'inqu_mobile' => $request->get('inqu_mobile'),
            'inqu_city' => $request->get('inqu_city'),
            'inqu_comment' => $request->get('inqu_comment'),
        ), function($message) use ($request){
            $message->from('inquiry@sakuramotors.com');
            $message->to('inquiry@sakuramotors.com', 'Inquiry - Sakura')
                    ->subject('Inquiry - Sakura');
        });      
        
        return back()->with('success', 'Thanks for contacting!');
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
