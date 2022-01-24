<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = User::where('role', 2)->get();
        
        return view('admin.pages.user.index', [
            'data'  => $data,
        ]);
    }
    public function change_password($id){
        $data = User::findOrFail($id);
        return view('admin.pages.user.changePassword', [
            'data'  => $data,
        ]);
    }
    
    public function updatePassword(Request $request){
        $messages = [
            'cpass.required' => 'Current password is required',
            'npass.required' => 'New password is required',
            'cfpass.required' => 'Confirm password is required',
        ];

        $request->validate([
            'cpass' => 'required',
            'npass' => 'required',
            'cfpass' => 'required',
        ], $messages);

        $user = User::findOrFail($request->user_id);
        if ($request->cpass) {
            if (Hash::check($request->cpass, $user->password)) {
                if ($request->npass == $request->cfpass) {
                    $input['password'] = Hash::make($request->npass);
                } else {
                    return back()->with('error', __('Confirm password does not match.'));
                }
            } else {
                return back()->with('error', __('Current password Does not match.'));
            }
        }
        dd($input);
        $user->update($input);

        Session::flash('success', 'Password update for ' . $user->name);
        return back();
    }
    public function delete(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->delete();

        return response()->json('success');
    }
}
