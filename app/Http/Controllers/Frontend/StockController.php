<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Validator, Exception, Image, URL, ZipArchive, File;
use App\Models\Vehicle;
use App\Models\VehicleImage;
use App\Models\Rate;
class StockController extends Controller
{
    public function index(Request $request)
    {
        $models = config('config.model_catgory');
        $body_type= config('config.body_type');
        $fuel_type= config('config.fuel_type');
        $drive_type= config('config.drive_type');
        $transmission= config('config.transmission');
        $steering= config('config.steering');
        $doors= config('config.doors');
        $country= config('config.country');
        $year = [];
        for ($i=date('Y'); $i >= 1950 ; $i--) { 
            array_push($year, $i);
        }

        $vehicle_data = VehicleImage::leftJoin('vehicle', 'vehicle.id', '=', 'vehicle_image.vehicle_id')
                                    ->groupBy('vehicle_image.vehicle_id')
                                    ->orderBy('vehicle.created_at', 'desc');
        if($request->has('body_type')){
            $vehicle_data = $vehicle_data->where('vehicle.body_type', $request->body_type)->paginate(24);
        } else{
            $vehicle_data = $vehicle_data->paginate(24);
        }
        $rate = Rate::first()->rate;                                    
        $list = '';                            
        if ($request->ajax()) {
            dd($vehicle_data);
            foreach ($vehicle_data as $result) {
                $list.='<div class="contents-list">';
                    $list.= '<div class="stock-mobile-title">';
                        $list.= '<a href="'.route('front.details', ['id' => $result->vehicle_id]).'">';
                            $list.=  '<h5>'.$result->make_type.' '.$result->model_type.' ' .$result->body_type.'</h5>';
                        $list.='</a>';
                    $list.='</div>';
                    $list.='<div class="stock-image">';
                        $list.='<a href="'.route('front.details', ['id' => $result->vehicle_id]).'">';
                            $list.='<img src="'.URL::asset('/uploads/vehicle').'/'.$result->vehicle_id.'/thumb'.'/'.$result->image.'" alt="">';
                        $list.='</a>';                                                
                    $list.='</div>';
                    $list.='<div class="stock-contents">';
                        $list.='<a href="'.route('front.details', ['id' => $result->vehicle_id]).'" class="stock-name">';
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
                            if($result->sale_price==null){
                                $list.='<span class="fob-value">$'.number_format(round($result->price/$rate)).'</span>';
                            } else{
                                $list.='<span class="fob-value">$'.number_format(round($result->sale_price/$rate)).'</span>';
                            }
                        $list.='</div>';
                        $list.='<div class="price-border-bottom"></div>';
                        $list.='<div class="total-price">';
                            $list.='<span class="total-label">Total Price</span>';
                            $list.='<span class="totla-value">$10,500</span>';
                        $list.='</div>';
                        $list.='<div class="price-border-bottom"></div>';
                        $list.='<div class="country-port">';
                            $list.='<p class="cif">(CIF Inspect)</p>';
                            $list.='<p class="port">Durban</p>';
                        $list.='</div>';
                        $list.='<div class="detail-inquire">';
                            $list.='<a href="'.route('front.details', ['id' => $result->vehicle_id]).'" class="btn-detail">Details</a>';
                            $list.='<a href="'.route('front.details', ['id' => $result->vehicle_id]).'" class="btn-inquire">Inquire</a>';
                        $list.='</div>';
                    $list.='</div>';
                    $list.='<div class="contents-border-right"></div>';
                $list.='</div>';
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
            'vehicle_data' => $vehicle_data,
            'rate' => $rate,
        ]);
    }
    public function details(Request $request, $id){
        $vehicle_data = Vehicle::where('id', $id)->first();
        $rate = Rate::first()->rate;
        $vehicle_img = VehicleImage::select('image')->where('vehicle_id', $id)->get();
        $real_url = URL::asset('uploads/vehicle/'.$id.'/real');
        $thumb_url = URL::asset('uploads/vehicle/'.$id.'/thumb');
        $country = config('config.country');
        return view('front.pages.details.index', [
            'vehicle_img' => $vehicle_img,
            'real_url' => $real_url,
            'thumb_url' => $thumb_url,
            'country' => $country,
            'id' =>$id,
            'vehicle_data' => $vehicle_data,
            'rate' => $rate
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
}
