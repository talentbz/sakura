<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Validator, Exception, Image, URL, ZipArchive, File;
use Illuminate\Support\Str;
use App\Models\Vehicle;
use App\Models\VehicleImage;
use App\Models\Rate;
use App\Models\Port;
use Location;

class StockController extends Controller
{
    public function index(Request $request)
    {
        $ip = $request->ip();
        $country_ip = \Location::get('112.134.189.70');
        // $country_ip = \Location::get($ip);
        $current_country = Port::where('country', 'LIKE', "%{$country_ip->countryName}%")->first();
        
        if($current_country->port) {
            $port_count = count(json_decode($current_country->port));
            $port_key = json_decode($current_country->port);
            $port_price = json_decode($current_country->price);    
        } else {
            $port_count = 0;
            $port_key = [];
            $port_price = [];
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
        // body type
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
        
        //general and advanced search form
        $search_keyword = $request->search_keyword;
        $maker = $request->maker;
        $model_name = $request->model_name;
        $from_year = $request->from_year;
        $to_year = $request->to_year;
        $from_price = $request->from_price;
        $to_price = $request->to_price;
        
        //price calc
        $price_country = $request->price_country;
        $price_port = $request->price_port;
        $inspection = $request->inspection;
        $insurance = $request->insurance;
        
        for ($i=date('Y'); $i >= 1950 ; $i--) { 
            array_push($year, $i);
        }
        for ($i=1000; $i <= 14000; $i+= 2000) { 
            array_push($price, $i);
        }
        $rate = Rate::first()->rate;    
        $vehicle_data = VehicleImage::leftJoin('vehicle', 'vehicle.id', '=', 'vehicle_image.vehicle_id')
                                    ->leftJoin(DB::raw('(SELECT id AS vid, CONVERT(SUBSTR(registration, 1, 4), SIGNED) AS year FROM vehicle) AS vehicle_year'), 'vehicle_year.vid', '=', 'vehicle.id')   
                                    ->leftJoin(DB::raw('(SELECT id AS price_id, ROUND(price/"'.$rate.'") AS price_usd FROM vehicle) AS vehicle_price'), 'vehicle_price.price_id', '=', 'vehicle.id')   
                                    ->groupBy('vehicle_image.vehicle_id')
                                    ->orderBy('vehicle.created_at', 'desc');
                                
        $list = '';                            
        if ($request->ajax()) {
            if(isset($request->body_type)){
                $vehicle_data = $vehicle_data->where('vehicle.body_type', $request->body_type);
            } elseif(isset($request->make_type)){
                $vehicle_data = $vehicle_data->where('vehicle.make_type', $request->make_type);  
            }
            if(!is_null($request->search_keyword)) {
                $general_search = preg_split('/\s+/', $request->search_keyword, -1, PREG_SPLIT_NO_EMPTY); 
                $vehicle_data = $vehicle_data->where(function ($q) use ($general_search) {
                    foreach ($general_search as $value) {
                        $q->orWhere('make_type', 'LIKE', "%{$value}%");
                        $q->orWhere('stock_no', 'LIKE', "%{$value}%");
                        $q->orWhere('model_type', 'LIKE', "%{$value}%");
                        $q->orWhere('body_type', 'LIKE', "%{$value}%");
                        $q->orWhere('registration', 'LIKE', "%{$value}%");
                        $q->orWhere('engine_model', 'LIKE', "%{$value}%");
                        $q->orWhere('model_code', 'LIKE', "%{$value}%");
                        $q->orWhere('fuel_type', 'LIKE', "%{$value}%");
                        $q->orWhere('drive_type', 'LIKE', "%{$value}%");
                        $q->orWhere('exterior_color', 'LIKE', "%{$value}%");
                    }
                });
            }
            if(!is_null($request->maker)){
                $vehicle_data = $vehicle_data->where('make_type', $request->maker);  
            }
            if(!is_null($request->model_name)){
                $vehicle_data = $vehicle_data->where('model_type', $request->model_name);  
            }
            if(!is_null($request->from_year)){
                $vehicle_data = $vehicle_data->where('year', '>=', $request->from_year);  
            }
            if(!is_null($request->to_year)){
                $vehicle_data = $vehicle_data->where('year', '<=', $request->to_year);  
            }
            if(!is_null($request->from_price)){
                $vehicle_data = $vehicle_data->where('price_usd', '>=', $request->from_price);  
            }
            if(!is_null($request->to_price)){
                $vehicle_data = $vehicle_data->where('price_usd', '<=', (int)$request->to_price);  
            }
            $vehicle_data = $vehicle_data->paginate(24);
            // if($request->id > 0) {
            //     $vehicle_data = $vehicle_data->where('vehicle.id', '<', $request->id)->paginate(24);
            // } else {
            //     $vehicle_data = $vehicle_data->paginate(24);
            // }
            if(!$vehicle_data->isEmpty()) {
                foreach ($vehicle_data as $result) {
                    $list.='<div class="contents-list">';
                        $list.= '<div class="stock-mobile-title">';
                            $list.= '<a target="_blank" href="'.route('front.details', ['id' => $result->vehicle_id]).'">';
                                $list.=  '<h5>'.$result->make_type.' '.$result->model_type.' ' .$result->body_type.'</h5>';
                            $list.='</a>';
                        $list.='</div>';
                        $list.='<div class="stock-image">';
                            $list.='<a target="_blank" href="'.route('front.details', ['id' => $result->vehicle_id]).'">';
                                $list.='<img src="'.URL::asset('/uploads/vehicle').'/'.$result->vehicle_id.'/thumb'.'/'.$result->image.'" alt="">';
                            $list.='</a>';                                                
                        $list.='</div>';
                        $list.='<div class="stock-contents">';
                            $list.='<a target="_blank" href="'.route('front.details', ['id' => $result->vehicle_id]).'" class="stock-name">';
                                $list.='<h5>'.$result->make_type.' '.$result->model_type.' '.$result->body_type.'</h5>';
                            $list.='</a>';
                            $list.='<table class="table table-bordered dt-responsive  nowrap w-100">';
                                $list.='<thead>';
                                $list.='</thead>';
                                $list.='<tbody>';
                                    $list.='<tr>';
                                        $list.='<td class="table-light" scope="result">STOCK NO</td>';
                                        $list.='<td>SM'.$result->stock_no.'</td>';
                                        $list.='<td class="table-light">Year</td>';
                                        $list.='<td>'.$result->registration.'</td>';
                                        $list.='<td class="table-light">Model</td>';
                                        $list.='<td>TD42</td>';
                                    $list.='</tr>';
                                    $list.='<tr>';
                                        $list.='<td class="table-light" scope="result">Transmission</td>';
                                        $list.='<td>'.$result->transmission.'</td>';
                                        $list.='<td class="table-light">ENGINE MODEL</td>';
                                        $list.='<td>'.$result->engine_model.'</td>';
                                        $list.='<td class="table-light">Body Type</td>';
                                        $list.='<td>'.$result->body_type.'</td>';
                                    $list.='</tr>';       
                                    $list.='<tr>';
                                        $list.='<td class="table-light">Engine CC</td>';
                                        $list.='<td>'.$result->engine_size.'</td>';
                                        $list.='<td class="table-light">Seating</td>';
                                        $list.='<td>'.$result->seats.'</td>';
                                        $list.='<td class="table-light">Chassis</td>';
                                        $list.='<td>'.$result->chassis.'</td>';
                                    $list.='</tr>';  
                                $list.='<tr>';
                                $list.='<td class="table-light">OPTIONS</td>';
                                $list.='<td colspan="5">'
                                                    .($result->ac==1 ? 'A/C, ':'')
                                                    .($result->power_steering==1 ? 'Power Steering, ':'')
                                                    .($result->auto_door==1 ? 'Auto Door, ':'')
                                                    .($result->remote_key==1 ? 'Remote Key, ':'')
                                                    .($result->navigation==1 ? 'Navigation, ':'')
                                                    .($result->power_locks==1 ? 'Power Locks, ':'')
                                                    .($result->cd_player==1 ? 'CD player, ':'')
                                                    .($result->dvd==1 ? 'DVD, ':'')
                                                    .($result->mp3_interface==1 ? 'MP3 interface, ':'')
                                        .'</td>';
                                $list.='</tr>';        
                                $list.='</tbody>';
                            $list.='</table>';
                        $list.='</div>';
                        $list.='<div class="stock-mobile-contents">';
                            $list.='<p class="stock-label">Stock No</p>';
                            $list.='<p class="stock-value">SM'.$result->stock_no.'</p>';
                            $list.='<p class="stock-label">Year</p>';
                            $list.='<p class="stock-value">'.$result->registration.'</p>';
                            $list.='<p class="stock-label">Model</p>';
                            $list.='<p class="stock-value">TD42</p>';
                            $list.='<p class="stock-label">Trans</p>';
                            $list.='<p class="stock-value">'.$result->transmission.'</p>';
                            $list.='<p class="stock-label">Trans</p>';
                            $list.='<p class="stock-value">Manual</p>';
                        $list.='</div>';
                        $list.='<div class="stock-price-list">';
                            $list.='<div class="fob-price">';
                                $list.='<span class="fob-label">Price (FOB)</span>';
                                $list.='<input type="hidden" class="cubic-meter" value="'.(($result->length * $result->width * $result->height)/1000000).'">';
                                if($result->sale_price==null){
                                    $list.='<input type="hidden" class="price" value="'.round($result->price/$rate).'">';
                                    $list.='<span class="fob-value">$'.number_format(round($result->price/$rate)).'</span>';
                                } else{
                                    $list.='<input type="hidden" class="price" value="'.round($result->sale_price/$rate).'">';
                                    $list.='<span class="fob-value">$'.number_format(round($result->sale_price/$rate)).'</span>';
                                }
                            $list.='</div>';
                            $list.='<div class="price-border-bottom"></div>';
                            $list.='<div class="total-price">';
                                $list.='<span class="total-label">Total Price</span>';
                                $list.='<span class="totla-value">ASK</span>';
                            $list.='</div>';
                            $list.='<div class="price-border-bottom"></div>';
                            $list.='<div class="country-port">';
                                $list.='<p class="cif">(Final Country)</p>';
                                $list.='<p class="port">Port</p>';
                            $list.='</div>';
                            $list.='<div class="detail-inquire">';
                                $list.='<a target="_blank" href="'.route('front.details', ['id' => $result->vehicle_id]).'" data-contents="'.route('front.details', ['id' => $result->vehicle_id]).'" class="btn-detail">Details</a>';
                                $list.='<a target="_blank" href="'.route('front.details', ['id' => $result->vehicle_id]).'" class="btn-inquire">Inquire</a>';
                            $list.='</div>';
                        $list.='</div>';
                        $list.='<div class="contents-border-right"></div>';
                    $list.='</div>';
                    $last_id = $result->vehicle_id;
                }
                $list.='<div id="load_more">
                            <button type="button" name="load_more_button" data-id="'.$last_id.'" id="load_more_button">Load More</button>
                        </div>';
            } else {
                $list.= '<div id="load_more" style="display:none">
                            <button type="button" name="load_more_button">No Data Found</button>
                        </div>';
            }
            return $list;
        }
        return view('front.pages.stock.index', [
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
            'body_bus' => $body_bus,
            'body_truck' => $body_truck,
            'body_van' => $body_van,
            'body_sedan' => $body_sedan,
            'body_pick_up' => $body_pick_up,
            'body_machinery' => $body_machinery,
            'body_tractor' => $body_tractor,
            'body_sub' => $body_sub,
            'price' => $price,
            'current_country' => $current_country,
            'port_count' => $port_count,
            'port_key' => $port_key, 
            'port_price' => $port_price,
            'rate_ins' => $rate_ins,
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
            // search form
            'search_keyword' => $search_keyword,
            'maker' => $maker,
            'model_name' => $model_name,
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
        
        $ip = $request->ip();
        $country_ip = \Location::get('112.134.189.70');
        // $country_ip = \Location::get($ip);
        $current_country = Port::where('country', 'LIKE', "%{$country_ip->countryName}%")->first();
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
        $vehicle_data = Vehicle::where('id', $id)->first();
        $rate = Rate::first();
        $vehicle_img = VehicleImage::select('image')->where('vehicle_id', $id)->get();
        $real_url = URL::asset('uploads/vehicle/'.$id.'/real');
        $thumb_url = URL::asset('uploads/vehicle/'.$id.'/thumb');
        $country = Port::get();
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
        return response()->json(['result' => true, 'port' => $port]);
    }
}
