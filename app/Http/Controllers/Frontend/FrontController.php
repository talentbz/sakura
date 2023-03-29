<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Validator, Exception, Image, URL, ZipArchive, File;
use Illuminate\Support\Str;
use App\Models\Vehicle;
use App\Models\VehicleImage;
use App\Models\Rate;
use App\Models\UserReview;
use App\Models\UserReviewImage;
use App\Models\VehicleType;
use Location;


class FrontController extends Controller
{
    public function index(Request $request)
    {
        // $ip = $request->ip();
        // $data = \Location::get('80.237.47.16');
        $rate = Rate::first()->rate;
        // $vehicle_data = VehicleImage::leftJoin('vehicle', 'vehicle.id', '=', 'vehicle_image.vehicle_id')
        //                              ->leftJoin(DB::raw('(SELECT vehicle_id AS vid,COUNT(vehicle_id) AS image_length FROM vehicle_image GROUP BY vehicle_image.vehicle_id) AS media_option'), 'media_option.vid', '=', 'vehicle.id')   
        //                              ->whereNull('vehicle.deleted_at')
        //                              ->where(function ($q) use ($request){
        //                                   $q->orWhereNull('vehicle.status');
        //                                   $q->orWhereNull('vehicle.deleted_at');
        //                                   $q->orWhere('vehicle.status', '=', Vehicle::INQUIRY);
        //                                   $q->orWhere('vehicle.status', '=', Vehicle::INVOICE_ISSUED);
        //                                 })
        //                              ->orderBy('vehicle.id', 'desc')
        //                              ->orderByRaw('CONVERT(vehicle_image.image, SIGNED) asc')
        //                              ->groupBy('vehicle_image.vehicle_id')
        //                              ->paginate(8);

        $vehicle_data = DB::select('SELECT a.*,
                                        b.image_length,
                                        b.*
                                    FROM 	 vehicle	a,
                                    (
                                        SELECT vehicle_id,
                                            COUNT(*)	AS image_length,
                                            MIN(image)	AS image
                                        FROM vehicle_image
                                        GROUP BY vehicle_id
                                        ) b
                                    WHERE a.id = b.vehicle_id
                                    AND a.status IN ("", "Inquiry", "Invoice Issued")
                                    ORDER BY a.id DESC
                                    LIMIT 8');
;
                                    //  dd($vehicle_data);
        $best_vehicle_data = DB::select('SELECT a.*,
                                            b.image_length,
                                            b.*
                                        FROM 	 vehicle	a,
                                        (
                                            SELECT vehicle_id,
                                                COUNT(*)	AS image_length,
                                                MIN(image)	AS image
                                            FROM vehicle_image
                                            GROUP BY vehicle_id
                                            ) b
                                        WHERE a.id = b.vehicle_id
                                        AND a.sale_price IS NOT NULL
                                        AND a.status IN ("", "Inquiry", "Invoice Issued")
                                        ORDER BY a.id DESC
                                        LIMIT 8');
        $vehicle_type = DB::select('SELECT  a.*,
                                    IFNULL(b.cnt, 0) AS cnt
                                FROM vehicle_types a
                                LEFT OUTER JOIN 
                                (
                                    SELECT body_type,
                                        COUNT(*) 	cnt
                                    FROM vehicle
                                    GROUP BY body_type
                                ) b ON a.vehicle_type = b.body_type
                                    ORDER BY a.order_id'
                                );
        $make_type = DB::select('SELECT  a.*,
                            IFNULL(b.cnt, 0) AS cnt
                        FROM maker_types a
                        LEFT OUTER JOIN 
                        (
                            SELECT make_type,
                                COUNT(*) 	cnt
                            FROM vehicle
                            GROUP BY make_type
                        ) b ON a.maker_type = b.make_type
                            ORDER BY a.order_id'
                        );
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
        //Customer voice
        $customer = UserReview::leftJoin('user_review_image', 'user_review.id', '=', 'user_review_image.user_review_id')
                              ->groupBy('user_review.id')
                              ->orderBy('user_review.created_at', 'desc')
                              ->paginate(6);                              
        return view('front.pages.home.index', [
            'vehicle_data' => $vehicle_data,
            'best_vehicle_data' => $best_vehicle_data,
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
            'vehicle_type' => $vehicle_type,
             //make type
             'make_type' => $make_type,
             //customer voice
             'customer' => $customer,
        ]);
    }
    public function clear(Request $request)
    {
        \Artisan::call('route:clear');
        \Artisan::call('view:clear');
        return "cleared cache";
    }
    public function light_gallery(Request $request){
        
        $data = VehicleImage::select('image')->where('vehicle_id', $request->id)->get();
        return response()->json(['result' => true, 'data' => $data]);
    }
}
