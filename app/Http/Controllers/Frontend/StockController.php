<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Validator, Exception, Image, URL, ZipArchive, File;
use App\Models\Vehicle;
use App\Models\VehicleImage;

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
        ]);
    }
    public function details(Request $request, $id){
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
