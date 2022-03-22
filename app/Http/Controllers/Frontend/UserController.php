<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use DB, Validator, Exception, Image, URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use Location;
use Notification;
use App\Notifications\NewUserNotification;
use App\Models\Port;
use App\Models\User;
use App\Models\Comments;
use App\Models\Reply;
use App\Models\Vehicle;
use App\Models\VehicleImage;


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
        $country = config('config.country');
        $user = Auth::guard('web')->user();
        return view('front.pages.user.mypage', [
            'country' => $country,
            'user' => $user,
        ]);
    }
    public function mypage_post(Request $request) {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->address = $request->address;
        if ($request->has('file')) {
            $path = public_path('uploads/avatar/'.$user_id.'/');
            if(!file_exists($path)){
                File::makeDirectory($path);
            }
            $file = $request->file;
            $fileName = $file->getClientOriginalName();
            $imgx = Image::make($file->getRealPath());
            $imgx->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path.$fileName);
            $user->avatar = $fileName; 
        };
        $user->save();
        return response()->json(['result' => true, 'Updated data' => $user]);
    }
    public function changePassword(Request $request) {
        // return view('front.pages.user.mypage', [
        //     'country' => $country,
        //     'user' => $user,
        // ]);
    }
    
    public function chatRoom(Request $request) {
        $user_id = Auth::guard('web')->user()->id;
        $comments = Comments::leftJoin('vehicle_image', 'comments.vehicle_id', '=', 'vehicle_image.vehicle_id')
                            ->where('comments.user_id', $user_id)
                            ->groupBy('comments.vehicle_id')
                            ->groupBy('comments.stock_id')
                            ->select('comments.*', 'vehicle_image.image')
                            ->orderBy('comments.created_at', 'desc')
                            ->get();
        return view('front.pages.user.chatroom', [
            'comments' => $comments,
        ]);
    }
    public function chatDetail(Request $request, $id) {
        $user_id = Auth::guard('web')->user()->id;
        $comments = Comments::leftJoin('vehicle_image', 'comments.vehicle_id', '=', 'vehicle_image.vehicle_id')
                            ->where('comments.user_id', $user_id)
                            ->groupBy('comments.vehicle_id')
                            ->groupBy('comments.stock_id')
                            ->select('comments.*', 'vehicle_image.image')
                            ->orderBy('comments.created_at', 'desc')
                            ->get();
        $customer_message = Comments::leftJoin('users', 'comments.user_id', '=', 'users.id')
                                    ->where('comments.user_id', $user_id)
                                    ->where('comments.vehicle_id', $id)
                                    ->select('comments.*', 'users.name')
                                    ->get();
                                    
        $reply = Reply::leftJoin('comments', 'comments.id', '=', 'replies.comment_id')
                        ->where('comments.user_id', $user_id)
                        ->where('comments.vehicle_id', $id)
                        ->select('replies.*')
                        ->get();
        $stock_info = Comments::where('vehicle_id', $id)->where('user_id', $user_id)->first();
        return view('front.pages.user.chatdetail', [
            'comments' => $comments,
            'customer_message' => $customer_message,
            'reply' => $reply,
            'stock_info' => $stock_info,
        ]);
    }
    public function comments(Request $request){ 
        $comments = new Comments;
        $comments->user_id = $request->user_id;
        $comments->stock_id = $request->stock_id;
        $comments->vehicle_id = $request->vehicle_id;
        $comments->order_status = $request->order_status;
        $comments->comments = $request->comments;
        $comments->site_url = $request->site_url;
        $comments->save();
        $admins = User::where('role', 1)->get();
        Notification::send($admins, new NewUserNotification($comments));
        return response()->json(['result' => true, 'save' => $comments]);
    }
}
