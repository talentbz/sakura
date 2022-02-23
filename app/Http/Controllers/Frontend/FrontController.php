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
        $rate = Rate::first()->rate;
        $vehicle_data = VehicleImage::leftJoin('vehicle', 'vehicle.id', '=', 'vehicle_image.vehicle_id')
                                     ->leftJoin(DB::raw('(SELECT vehicle_id AS vid,COUNT(vehicle_id) AS image_length FROM vehicle_image GROUP BY vehicle_image.vehicle_id) AS media_option'), 'media_option.vid', '=', 'vehicle.id')   
                                     ->groupBy('vehicle_image.vehicle_id')
                                    ->orderBy('vehicle.created_at', 'desc')
                                    ->paginate(8);
        $body_bus = Vehicle::select('body_type', DB::raw('count(body_type) as body_count'))->groupBy('body_type')->where('body_type', 'bus')->first();
        $body_truck = Vehicle::select('body_type', DB::raw('count(body_type) as body_count'))->groupBy('body_type')->where('body_type', 'Truck')->first();
        $body_van = Vehicle::select('body_type', DB::raw('count(body_type) as body_count'))->groupBy('body_type')->where('body_type', 'Van')->first();
        $body_sub = Vehicle::select('body_type', DB::raw('count(body_type) as body_count'))->groupBy('body_type')->where('body_type', 'sub')->first();
        $body_sedan = Vehicle::select('body_type', DB::raw('count(body_type) as body_count'))->groupBy('body_type')->where('body_type', 'Sedan')->first();
        $body_pick_up = Vehicle::select('body_type', DB::raw('count(body_type) as body_count'))->groupBy('body_type')->where('body_type', 'Pick up')->first();
        $body_machinery = Vehicle::select('body_type', DB::raw('count(body_type) as body_count'))->groupBy('body_type')->where('body_type', 'Machinery')->first();
        $body_tractor = Vehicle::select('body_type', DB::raw('count(body_type) as body_count'))->groupBy('body_type')->where('body_type', 'Tractor')->first();
        
        //make type
        $make_toyoda = Vehicle::select('make_type', DB::raw('count(make_type) as make_count'))->groupBy('make_type')->where('make_type', 'Toyota')->first();
        $make_nissan = Vehicle::select('make_type', DB::raw('count(make_type) as make_count'))->groupBy('make_type')->where('make_type', 'Nissan')->first();
        $make_mitsubishi = Vehicle::select('make_type', DB::raw('count(make_type) as make_count'))->groupBy('make_type')->where('make_type', 'Mitsubishi')->first();
        $make_honda= Vehicle::select('make_type', DB::raw('count(make_type) as make_count'))->groupBy('make_type')->where('make_type', 'Honda')->first();
        $make_mazda = Vehicle::select('make_type', DB::raw('count(make_type) as make_count'))->groupBy('make_type')->where('make_type', 'Mazda')->first();
        $make_subaru = Vehicle::select('make_type', DB::raw('count(make_type) as make_count'))->groupBy('make_type')->where('make_type', 'Subaru')->first();
        $make_suzuki = Vehicle::select('make_type', DB::raw('count(make_type) as make_count'))->groupBy('make_type')->where('make_type', 'Suzuki')->first();
        $make_isuzu = Vehicle::select('make_type', DB::raw('count(make_type) as make_count'))->groupBy('make_type')->where('make_type', 'Isuzu')->first();
        $make_daihatsu = Vehicle::select('make_type', DB::raw('count(make_type) as make_count'))->groupBy('make_type')->where('make_type', 'Daihatsu')->first();
        $make_hino = Vehicle::select('make_type', DB::raw('count(make_type) as make_count'))->groupBy('make_type')->where('make_type', 'Hino')->first();
        $make_udTrucks = Vehicle::select('make_type', DB::raw('count(make_type) as make_count'))->groupBy('make_type')->where('make_type', 'Ud Trucks')->first();
        $make_mercedesBenz = Vehicle::select('make_type', DB::raw('count(make_type) as make_count'))->groupBy('make_type')->where('make_type', 'Mercedes benz')->first();
        $make_bmw = Vehicle::select('make_type', DB::raw('count(make_type) as make_count'))->groupBy('make_type')->where('make_type', 'Bmw')->first();
        $make_audi = Vehicle::select('make_type', DB::raw('count(make_type) as make_count'))->groupBy('make_type')->where('make_type', 'Audi')->first();
        $make_chrysler = Vehicle::select('make_type', DB::raw('count(make_type) as make_count'))->groupBy('make_type')->where('make_type', 'Chrysler')->first();
        $make_volkswagen = Vehicle::select('make_type', DB::raw('count(make_type) as make_count'))->groupBy('make_type')->where('make_type', 'Volkswagen')->first();
        
        //config variable
        $models = config('config.model_catgory');
        $body_type= config('config.body_type');
        $fuel_type= config('config.fuel_type');
        $drive_type= config('config.drive_type');
        $transmission= config('config.transmission');
        $steering= config('config.steering');
        $doors= config('config.doors');
        $year = [];
        $price =[];
        for ($i=date('Y'); $i >= 1950 ; $i--) { 
            array_push($year, $i);
        }
        for ($i=1000; $i <= 14000; $i+= 2000) { 
            array_push($price, $i);
        }
        return view('front.pages.home.index', [
            'vehicle_data' => $vehicle_data,
            'rate' => $rate,
            //config variable
            'models' => $models,
            'body_type' => $body_type,
            'fuel_type' => $fuel_type,
            'drive_type' => $drive_type,
            'transmission' => $transmission,
            'steering' => $steering,
            'doors' => $doors,
            'year' => $year,
            'price' => $price,
            //body type
            'body_bus' => $body_bus,
            'body_truck' => $body_truck,
            'body_van' => $body_van,
            'body_sedan' => $body_sedan,
            'body_pick_up' => $body_pick_up,
            'body_machinery' => $body_machinery,
            'body_tractor' => $body_tractor,
            'body_sub' => $body_sub,

             //make type
             'make_toyoda' => $make_toyoda,
             'make_nissan' => $make_nissan,
             'make_mitsubishi' => $make_mitsubishi,
             'make_honda' => $make_honda,
             'make_mazda' => $make_mazda,
             'make_subaru' => $make_subaru,
             'make_suzuki' => $make_suzuki,
             'make_isuzu' => $make_isuzu,
             'make_daihatsu' => $make_daihatsu,
             'make_hino' => $make_hino,
             'make_udTrucks' => $make_udTrucks,
             'make_mercedesBenz' => $make_mercedesBenz,
             'make_bmw' => $make_bmw,
             'make_audi' => $make_audi,
             'make_chrysler' => $make_chrysler,
             'make_volkswagen' => $make_volkswagen,
        ]);
    }
    public function clear(Request $request)
    {
        \Artisan::call('route:clear');
        \Artisan::call('view:clear');
        return "cleared cache";
    }
}
