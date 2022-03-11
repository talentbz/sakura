<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserReview;
use App\Models\UserReviewImage;

class CustomerController extends Controller
{
    public function index(Request $request){
        
        $review = UserReview::leftJoin('user_review_image', 'user_review.id', '=', 'user_review_image.user_review_id')
                            ->groupBy('user_review_image.user_review_id')
                            ->orderBy('user_review.created_at', 'desc')
                            ->get();
        return view('front.pages.customer.index', [
            'review' => $review,
        ]);
    }
}
