<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AdminController extends Controller
{
    public function edit_profile(Request $request)
    {
        $admin = User::where('role', 1)->first();
        return view('admin.pages.admin.editProfile', [
            'admin' => $admin,
        ]);
    }
}
