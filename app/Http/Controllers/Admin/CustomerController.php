<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserReview;
use App\Models\UserReviewImage;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.pages.customer.index', [
            // 'data' => $data,
        ]);
    }
    public function add(Request $request)
    {
        $country = config('config.country');
        return view('admin.pages.customer.create', [
            'country' => $country,
        ]);
    }
}
