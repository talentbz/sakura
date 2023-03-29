<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Validator, Exception, Image, URL, ZipArchive, File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Vehicle;
use App\Models\VehicleImage;
use App\Models\Rate;
use App\Models\Port;
use App\Models\Comments;
use Location;

class StockController extends Controller
{
    public function index(Request $request)
    {
        // $ip = file_get_contents('https://api.ipify.org');
        $ip = $request->getClientIp();
        if($ip == '127.0.0.1'){
            $ip = '188.43.235.177'; //Russia IP address
        }
        $country_ip = \Location::get($ip);
        $current_country = Port::where('country', 'LIKE', "%{$country_ip->countryName}%")->first();
        if(!$current_country){
            $current_country = Port::findOrFail(1); // default country is Zambia
        }
        if($current_country->port) {
            $port_count = count(json_decode($current_country->port));
            $port_key = json_decode($current_country->port);
            $port_price = json_decode($current_country->price);    
        } else {
            $port_count = 0;
            $port_key = [];
            $port_price = [];
        }

        // create new port array
        $port_list = [];
        if($current_country->port){
            $port_unique_name =  array_values(array_unique(json_decode($current_country->port)));
            $port_array = json_decode($current_country->port_array);
            if($port_array) {
                foreach($port_unique_name as $key=>$row){
                    $get_last_body = [];
                    for ($i=0; $i <count($port_array) ; $i++) { 
                        $new_obj_arr = (array)$port_array[$i];
                        if($new_obj_arr[0] == $row){
                            $get_last_body[] =array_splice($new_obj_arr, 0, 1);
                        }
                    }
                    $port_list[$row] = $get_last_body;
                }
            }
        }
        $rate_ins = Rate::first();
        // config variable
        $models = config('config.model_catgory');
        $body_type= config('config.body_type');
        $fuel_type= config('config.fuel_type');
        $drive_type= config('config.drive_type');
        $transmission= config('config.transmission');
        $steering= config('config.steering');
        $doors= config('config.doors');
        $country= Port::get();
        $year = [];
        $price =[];
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
        
        //general and advanced search form
        $search_keyword = $request->search_keyword;
        $maker = $request->maker;
        $model_name = $request->model_name;
        $gear = $request->gear;
        $from_year = $request->from_year;
        $to_year = $request->to_year;
        $from_price = $request->from_price;
        $to_price = $request->to_price;
        
        //price calc
        $price_country = $request->price_country;
        $price_port = $request->price_port;
        $inspection = $request->inspection;
        $insurance = $request->insurance;
        
        //sort by
        $sort_by = $request->sort_by; 

        for ($i=date('Y'); $i >= 1950 ; $i--) { 
            array_push($year, $i);
        }
        for ($i=1000; $i <= 14000; $i+= 2000) { 
            array_push($price, $i);
        }
        $rate = Rate::first()->rate;    
        $vehicle_data = Vehicle::select('vehicle.*', 'vehicle_image.image', DB::raw('CONVERT(SUBSTR(`vehicle`.registration, 1, 4), SIGNED) AS YEAR'), DB::raw('ROUND(price /"'.$rate.'") AS price_usd'), 'image_length')
                                ->join(DB::raw('(SELECT vehicle_id, COUNT(*) AS image_length, MIN(image) AS image FROM vehicle_image GROUP BY vehicle_id) AS vehicle_image'), 'vehicle.id', '=', 'vehicle_image.vehicle_id')
                                ->whereNull('vehicle.deleted_at')
                                ->whereIn('vehicle.status', ['', Vehicle::INQUIRY, Vehicle::INVOICE_ISSUED]);
        

        // filter section                                
        if(isset($request->body_type)){
            $vehicle_data = $vehicle_data->where('vehicle.body_type', $request->body_type);
        } 
        if(isset($request->make_type)){
            $vehicle_data = $vehicle_data->where('vehicle.make_type', $request->make_type);  
        }
        if(!is_null($request->search_keyword)) {
            $general_search = preg_split('/\s+/', $request->search_keyword, -1, PREG_SPLIT_NO_EMPTY); 
            // $general_search = $request->search_keyword;
            $vehicle_data = $vehicle_data->where(function ($q) use ($general_search) {
                foreach ($general_search as $value) {
                    $q->orWhere('vehicle.make_type', 'LIKE', "%{$value}%");
                    $q->orWhere('vehicle.stock_no', 'LIKE', "%{$value}%");
                    $q->orWhere('vehicle.model_type', 'LIKE', "%{$value}%");
                    $q->orWhere('vehicle.body_type', 'LIKE', "%{$value}%");
                    $q->orWhere('vehicle.registration', 'LIKE', "%{$value}%");
                    $q->orWhere('vehicle.engine_model', 'LIKE', "%{$value}%");
                    $q->orWhere('vehicle.model_code', 'LIKE', "%{$value}%");
                    $q->orWhere('vehicle.fuel_type', 'LIKE', "%{$value}%");
                    $q->orWhere('vehicle.drive_type', 'LIKE', "%{$value}%");
                    $q->orWhere('vehicle.exterior_color', 'LIKE', "%{$value}%");
                    $q->orWhere('vehicle.chassis', 'LIKE', "%{$value}%");
                }
            });
        }
        if(!is_null($request->maker)){
            $vehicle_data = $vehicle_data->where('make_type', $request->maker);  
        }
        if(!is_null($request->model_name)){
            $vehicle_data = $vehicle_data->where('model_type', $request->model_name);
        }
        if(!is_null($request->gear)){
            $vehicle_data = $vehicle_data->where('transmission', $request->gear);  
        }
        if(!is_null($request->from_year)){
            $vehicle_data = $vehicle_data->where('year', '>=', $request->from_year);  
        }
        if(!is_null($request->to_year)){
            $vehicle_data = $vehicle_data->where('year', '<=', $request->to_year);  
        }                
        if ($request->ajax()) {
            // filter section                                
            if(isset($request->body_type)){
                $vehicle_data = $vehicle_data->where('vehicle.body_type', $request->body_type);
            } 
            if(isset($request->make_type)){
                $vehicle_data = $vehicle_data->where('vehicle.make_type', $request->make_type);  
            }
            if(!is_null($request->search_keyword)) {
                $general_search = preg_split('/\s+/', $request->search_keyword, -1, PREG_SPLIT_NO_EMPTY); 
                // $general_search = $request->search_keyword;
                $vehicle_data = $vehicle_data->where(function ($q) use ($general_search) {
                    foreach ($general_search as $value) {
                        $q->orWhere('vehicle.make_type', 'LIKE', "%{$value}%");
                        $q->orWhere('vehicle.stock_no', 'LIKE', "%{$value}%");
                        $q->orWhere('vehicle.model_type', 'LIKE', "%{$value}%");
                        $q->orWhere('vehicle.body_type', 'LIKE', "%{$value}%");
                        $q->orWhere('vehicle.registration', 'LIKE', "%{$value}%");
                        $q->orWhere('vehicle.engine_model', 'LIKE', "%{$value}%");
                        $q->orWhere('vehicle.model_code', 'LIKE', "%{$value}%");
                        $q->orWhere('vehicle.fuel_type', 'LIKE', "%{$value}%");
                        $q->orWhere('vehicle.drive_type', 'LIKE', "%{$value}%");
                        $q->orWhere('vehicle.exterior_color', 'LIKE', "%{$value}%");
                        $q->orWhere('vehicle.chassis', 'LIKE', "%{$value}%");
                    }
                });
            }
            if(!is_null($request->maker)){
                $vehicle_data = $vehicle_data->where('make_type', $request->maker);  
            }
            if(!is_null($request->model_name)){
                $vehicle_data = $vehicle_data->where('model_type', $request->model_name);
            }
            if(!is_null($request->gear)){
                $vehicle_data = $vehicle_data->where('transmission', $request->gear);  
            }
            if(!is_null($request->from_year)){
                $vehicle_data = $vehicle_data->where('year', '>=', $request->from_year);  
            }
            if(!is_null($request->to_year)){
                $vehicle_data = $vehicle_data->where('year', '<=', $request->to_year);  
            }                
            if(!is_null($request->sort_by)){
                $sort_by = $request->sort_by;
                if($sort_by == "new_arriaval"){
                    $vehicle_data = $vehicle_data->orderBy('vehicle.created_at', 'desc');
                } elseif($sort_by == 'price_to_low') {
                    $vehicle_data = $vehicle_data->orderBy('price_usd', 'asc');
                } elseif($sort_by == 'price_to_high') {
                    $vehicle_data = $vehicle_data->orderBy('price_usd', 'desc');
                } elseif($sort_by == 'year_to_new') {
                    $vehicle_data = $vehicle_data->orderBy('vehicle.created_at', 'asc');
                } else{
                    $vehicle_data = $vehicle_data->orderBy('vehicle.created_at', 'desc');
                }
            }
            $vehicle_data = $vehicle_data->paginate(10);
            // dd($vehicle_data);
            return view('front.pages.stock.list', [
                'vehicle_data' => $vehicle_data,
                'rate' => $rate,
            ]);
        }
        $vehicle_data = $vehicle_data->paginate(10);
        // dd($vehicle_data);
        return view('front.pages.stock.index', [
            'vehicle_data' => $vehicle_data,
            'models' => $models,
            'body_type' => $body_type,
            'fuel_type' => $fuel_type,
            'drive_type' => $drive_type,
            'transmission' => $transmission,
            'steering' => $steering,
            'doors' => $doors,
            'year' => $year,
            'country' => $country,
            'rate' => $rate,
            'vehicle_type' => $vehicle_type,
            
            'price' => $price,
            'current_country' => $current_country,
            'port_count' => $port_count,
            'port_key' => $port_key, 
            'port_price' => $port_price,
            'rate_ins' => $rate_ins,
            'port_list' => $port_list,
            //make type
            'make_type' => $make_type,
            // search form
            'search_keyword' => $search_keyword,
            'maker' => $maker,
            'model_name' => $model_name,
            'gear' => $gear,
            'from_year' => $from_year,
            'to_year' => $to_year,
            'from_price' => $from_price,
            'to_price' => $to_price,
            //price form
            'price_country' =>$price_country,
            'price_port' => $price_port,
            'inspection' => $inspection,
            'insurance' => $insurance,
        ]);
    }
    public function details(Request $request, $id){
        
        $ip = $request->getClientIp();
        if($ip == '127.0.0.1'){
            $ip = '188.43.235.177'; //Russia IP address
        }
        $country_ip = \Location::get($ip);
        $current_country = Port::where('country', 'LIKE', "%{$country_ip->countryName}%")->first();
        if(!$current_country){
            $current_country = Port::findOrFail(1); // default country is Zambia
        }
        // $current_country = Port::where('country', 'LIKE', "%Russia%")->first();
        $total_price = '';
        $port = '';
        $inspection = '';
        $insurance = '';
        if($request->has('total_price')){
            $current_country = Port::where('id', $request->country)->first();
            $total_price = $request->total_price;
            $port = $request->port;
            $inspection = $request->inspection;
            $insurance = $request->insurance;
        }
        if($current_country->port) {
            $port_count = count(json_decode($current_country->port));
            $port_key = json_decode($current_country->port);
            $port_price = json_decode($current_country->price);    
        } else {
            $port_count = 0;
            $port_key = [];
            $port_price = [];
        }
        // create new port array
        $port_list = [];
        if($current_country->port){
            $port_unique_name =  array_values(array_unique(json_decode($current_country->port)));
            $port_array = json_decode($current_country->port_array);
            if($port_array) {
                foreach($port_unique_name as $key=>$row){
                    $get_last_body = [];
                    for ($i=0; $i <count($port_array) ; $i++) { 
                        $new_obj_arr = (array)$port_array[$i];
                        if($new_obj_arr[0] == $row){
                            $get_last_body[] =array_splice($new_obj_arr, 0, 1);
                        }
                    }
                    $port_list[$row] = $get_last_body;
                }
            }
        }
        $vehicle_data = Vehicle::where('id', $id)->first();
        $rate = Rate::first();
        $vehicle_img = VehicleImage::select('image')->where('vehicle_id', $id)->orderByRaw('CONVERT(image, SIGNED) asc')->get();
        $real_url = URL::asset('uploads/vehicle/'.$id.'/real');
        $thumb_url = URL::asset('uploads/vehicle/'.$id.'/thumb');
        $country = Port::get();
        //if exist inquiry list, then don't show inquiry list
        $user_info = Auth::guard('web')->user();
        if($user_info){
            $comments = Comments::where('user_id', $user_info->id)->where('vehicle_id', $id)->first();
        } else {
            $comments ='';
        }
        
        return view('front.pages.details.index', [
            'vehicle_img' => $vehicle_img,
            'real_url' => $real_url,
            'thumb_url' => $thumb_url,
            'country' => $country,
            'id' =>$id,
            'vehicle_data' => $vehicle_data,
            'rate' => $rate,
            'current_country' => $current_country,
            'port_count' => $port_count,
            'port_key' => $port_key, 
            'port_price' => $port_price,
            'total_price' =>$total_price,
            'port' => $port,
            'inspection' => $inspection,
            'insurance' => $insurance,
            'comments' =>$comments,  
            'port_list' => $port_list,
        ]);
    }
    public function image_download(Request $request, $id){
        $zip = new ZipArchive;
        $public_dir='uploads/vehicle/'.$id.'/real';
        $fileName = 'SakuraMotors_'.$id.'.zip';
   
        if ($zip->open(public_path($public_dir.$fileName), ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE)
        {
            $files = File::files(public_path($public_dir));
            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }
            $zip->close();
        }
    
        return response()->download(public_path($public_dir.$fileName));
    }
    public function select_port(Request $request){ 
        $country_id = $request->id;
        $port = Port::where('id', $country_id)->first();
        $port_list = [];
        if($port->port){
            $port_unique_name =  array_values(array_unique(json_decode($port->port)));
            // create new port array
            $port_array = json_decode($port->port_array);
            if($port_array) {
                foreach($port_unique_name as $key=>$row){
                    $get_last_body = [];
                    for ($i=0; $i <count($port_array) ; $i++) { 
                        $new_obj_arr = (array)$port_array[$i];
                        if($new_obj_arr[0] == $row){
                            $get_last_body[] =array_splice($new_obj_arr, 0, 1);
                        }
                    }
                    $port_list[$row] = $get_last_body;
                }
            }
        }
        return response()->json(['result' => true, 'port' => $port, 'port_list' =>$port_list]);
    }
}
