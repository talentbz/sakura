<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Validator, Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use Location;
use App\Models\Port;
use App\Models\User;


class UserController extends Controller
{
    public function login(Request $request)
    {
        return view('front.pages.user.login', [
            // 'data' => $data,
        ]);
    }
    public function signup(Request $request)
    {
        $country = config('config.country');
        $ip = $request->ip();
        $country_ip = \Location::get('112.134.189.70');
        // $country_ip = \Location::get($ip);
        $current_country = Port::where('country', 'LIKE', "%{$country_ip->countryName}%")->first()->country;
        return view('front.pages.user.signup', [
            'country' => $country,
            'current_country' => $current_country,
        ]);
    }
    public function signup_post(Request $request) {
        $data = $request->all();
        $rules = array('email' => 'unique:users,email');
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            echo 'exist';
        } else {
            $result = new User;  //create new user
            $result->name = $request->name;
            $result->email = $request->email;
            $result->password = Hash::make($request->password);
            $result->country = $request->country;
            $result->role = 2;
            // $result->real_password = $request->password;
            $result->save();
        }
    }
    public function login_post(Request $request) {
        // at first, get the url from session which will be redirect after login
        if ($request->session()->has('redirectTo')) {
            $redirectURL = $request->session()->get('redirectTo');
        } else {
            $redirectURL = null;
        }
        $credentials = $request->only('email', 'password');
        // login attempt
        if (Auth::guard('web')->attempt($credentials) == 'true') {
            // otherwise, redirect auth user to next url
            if ($redirectURL == null) {
                return 'success';
                // return redirect()->route('front.user.dashboard');
            } else {
                // before, redirect to next url forget the session value
                $request->session()->forget('redirectTo');
                return redirect($redirectURL);
            }
        } else {
            $request->session()->flash('error', 'The provided credentials do not match our records!');
            return redirect()->back();
        }
    }
    public function myPage(Request $request) {
        return view('front.pages.user.mypage', [
            // 'data' => $data,
        ]);
    }

}
