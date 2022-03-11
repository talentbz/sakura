<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Validator, Exception, Image, URL;
use Illuminate\Support\Facades\File; 
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function edit_profile(Request $request)
    {
        $user = User::where('role', 1)->first();
        $country = config('config.country');
        return view('admin.pages.admin.editProfile', [
            'user' => $user,
            'country' => $country,
        ]);
    }

    public function update_profile(Request $request){
        $user_id = User::where('role', 1)->first()->id;
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
}
