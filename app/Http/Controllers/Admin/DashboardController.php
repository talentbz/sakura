<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Validator, Exception, URL;
use App\Models\Vehicle;
use App\Models\VehicleImage;
use App\Models\User;
use App\Models\News;
use App\Models\UserReview;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $this_month = date('m');
        $last_month = date('m', strtotime("last day of -1 month"));
        $year = date('Y');
        $user = User::where('role', 2)->where('status', 1)->select(DB::raw('count(*) as count'))->first();
        $vehicle = vehicle::select(DB::raw('count(*) as count'))->first();
        $news = News::select(DB::raw('count(*) as count'))->first();
        $customer = UserReview::select(DB::raw('count(*) as count'))->first();
        
        $this_month_user = User::select(DB::raw('MONTH(created_at) as month'), DB::raw('YEAR(created_at) as year'), DB::raw('count(*) as total'))
                            ->where('role', 2)
                            ->where('status', 1)
                            ->whereRaw('MONTH(created_at) = ?', [$this_month])
                            ->whereRaw('YEAR(created_at) = ?', [$year])
                            ->groupBy('month')
                            ->first();
        // dd($this_month_user);
        $last_month_user = User::select(DB::raw('MONTH(created_at) as month'), DB::raw('YEAR(created_at) as year'), DB::raw('count(*) as total'))
                            ->where('role', 2)
                            ->where('status', 1)
                            ->whereRaw('MONTH(created_at) = ?', [$last_month])
                            ->whereRaw('YEAR(created_at) = ?', [$year])
                            ->groupBy('month')
                            ->first();
        
        $user_data = User::select(DB::raw('MONTH(created_at) as month'), DB::raw('YEAR(created_at) as year'), DB::raw('count(*) as total'))
                            ->where('role', 2)
                            ->where('status', 1)
                            ->whereRaw('YEAR(created_at) = ?', [$year])
                            ->groupBy('month')
                            ->get();
                            // dd($user_data);
        if ($request->ajax()) {
            $year = $request->year;
            $user_data = User::select(DB::raw('MONTH(created_at) as month'), DB::raw('YEAR(created_at) as year'), DB::raw('count(*) as total'))
                            ->where('role', 2)
                            ->where('status', 1)
                            ->whereRaw('YEAR(created_at) = ?', [$year])
                            ->groupBy('month')
                            ->get();
            return response()->json(['data' => $user_data]);                            
        }                            
        $vehicle_data = Vehicle::select(DB::raw('count(*) as value'), DB::raw('CASE WHEN status = "" THEN "New Vehicle" ELSE status END as name'))->groupBy('name')->get();
        
        return view('admin.pages.admin.index', [
            'user' => $user,
            'this_month_user' => $this_month_user,
            'last_month_user' => $last_month_user,
            'vehicle' => $vehicle,
            'news' => $news,
            'customer' => $customer,
            'user_data' => $user_data,
            'vehicle_data' => $vehicle_data,
        ]);
    }
}
