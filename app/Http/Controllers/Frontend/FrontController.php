<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Validator, Exception, Image, URL, ZipArchive, File;
use App\Models\Vehicle;
use App\Models\VehicleImage;
use App\Models\Rate;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        $vehicle_data = VehicleImage::leftJoin('vehicle', 'vehicle.id', '=', 'vehicle_image.vehicle_id')
                                     ->leftJoin(DB::raw('(SELECT vehicle_id AS vid,COUNT(vehicle_id) AS image_length FROM vehicle_image GROUP BY vehicle_image.vehicle_id) AS media_option'), 'media_option.vid', '=', 'vehicle.id')   
                                    ->groupBy('vehicle_image.vehicle_id')
                                    ->orderBy('vehicle.created_at', 'desc')
                                    ->paginate(8);
        $rate = Rate::first()->rate;
        $body_bus = Vehicle::select('body_type', DB::raw('count(body_type) as body_count'))->groupBy('body_type')->where('body_type', 'bus')->first();
        $body_truck = Vehicle::select('body_type', DB::raw('count(body_type) as body_count'))->groupBy('body_type')->where('body_type', 'Truck')->first();
        $body_van = Vehicle::select('body_type', DB::raw('count(body_type) as body_count'))->groupBy('body_type')->where('body_type', 'Van')->first();
        $body_sub = Vehicle::select('body_type', DB::raw('count(body_type) as body_count'))->groupBy('body_type')->where('body_type', 'sub')->first();
        $body_sedan = Vehicle::select('body_type', DB::raw('count(body_type) as body_count'))->groupBy('body_type')->where('body_type', 'Sedan')->first();
        $body_pick_up = Vehicle::select('body_type', DB::raw('count(body_type) as body_count'))->groupBy('body_type')->where('body_type', 'Pick up')->first();
        $body_machinery = Vehicle::select('body_type', DB::raw('count(body_type) as body_count'))->groupBy('body_type')->where('body_type', 'Machinery')->first();
        $body_tractor = Vehicle::select('body_type', DB::raw('count(body_type) as body_count'))->groupBy('body_type')->where('body_type', 'Tractor')->first();
        
        return view('front.pages.home.index', [
            'vehicle_data' => $vehicle_data,
            'rate' => $rate,
            'body_bus' => $body_bus,
            'body_truck' => $body_truck,
            'body_van' => $body_van,
            'body_sedan' => $body_sedan,
            'body_pick_up' => $body_pick_up,
            'body_machinery' => $body_machinery,
            'body_tractor' => $body_tractor,
            'body_sub' => $body_sub,
        ]);
    }
    public function clear(Request $request)
    {
        \Artisan::call('route:clear');
        \Artisan::call('view:clear');
        return "cleared cache";
    }
}
