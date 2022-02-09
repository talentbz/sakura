<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Arr;
use DB, Validator, Exception, Image, URL;
use App\Models\Vehicle;
use App\Models\VehicleImage;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        $data = Vehicle::leftJoin('vehicle_image', 'vehicle.id', '=', 'vehicle_image.vehicle_id')
                        ->groupBy('vehicle.id')
                        ->select('vehicle.*', 'vehicle_image.image')
                        ->get();
        return view('admin.pages.vehicle.index', [
            'data' => $data,
        ]);
    }
    public function create(Request $request)
    {
        $models = config('config.model_catgory');
        $body_type= config('config.body_type');
        $fuel_type= config('config.fuel_type');
        $drive_type= config('config.drive_type');
        $transmission= config('config.transmission');
        $steering= config('config.steering');
        $doors= config('config.doors');

        return view('admin.pages.vehicle.create', [
            'models' => $models,
            'body_type' => $body_type,
            'fuel_type' => $fuel_type,
            'drive_type' => $drive_type,
            'transmission' => $transmission,
            'steering' => $steering,
            'doors' => $doors,
        ]);
    }
    public function edit(Request $request, $id) {
        $data = Vehicle::findOrFail($id);
        $stock_id =$data->stock_no;
        $image_path = VehicleImage::where('stock_no', $stock_id)->get();
        $get_url = URL::asset('uploads/vehicle/'.$stock_id.'/real');
        $get_image_path = [];
        $id_array = [];
        foreach($image_path as $row){
            array_push($get_image_path, $get_url.'/'.$row->image);
            array_push($id_array, ["key"=>($row->id)]);
        }
        $models = config('config.model_catgory');
        $body_type= config('config.body_type');
        $fuel_type= config('config.fuel_type');
        $drive_type= config('config.drive_type');
        $transmission= config('config.transmission');
        $steering= config('config.steering');
        $doors= config('config.doors');
        return view('admin.pages.vehicle.edit', [
            'data' => $data,
            'models' => $models,
            'body_type' => $body_type,
            'fuel_type' => $fuel_type,
            'drive_type' => $drive_type,
            'transmission' => $transmission,
            'steering' => $steering,
            'doors' => $doors,
            'get_image_path' => $get_image_path,
            'id_array' => $id_array,
        ]);
    }
    public function imageDelete(Request $request){
        $id = $request->key;
        $stock_no = VehicleImage::where('id', $id)->first()->stock_no;
        $fileName = VehicleImage::where('id', $id)->first()->image;
        $real_image = ('uploads/vehicle/'.$stock_no.'/real'.'/'.$fileName);
        $thumb_image = ('uploads/vehicle/'.$stock_no.'/thumb'.'/'.$fileName);
        if(File::exists(public_path($real_image))){
            File::delete(public_path($real_image));   
        }
        if(File::exists(public_path($thumb_image))){
            File::delete(public_path($thumb_image));   
        }
        $result = VehicleImage::where('id', $id)->delete();
        return response()->json(['result' => true, 'deleted' => $result]);
    }

    public function delete(Request $request){
        $vehicleId = $request->id;
        $stock_no = VehicleImage::where('vehicle_id', $vehicleId)->first()->stock_no;
        $fileNames = VehicleImage::where('vehicle_id', $vehicleId)->get();

        foreach($fileNames as $fileName){
            $real_image = ('uploads/vehicle/'.$stock_no.'/real'.'/'.$fileName->image);
            $thumb_image = ('uploads/vehicle/'.$stock_no.'/thumb'.'/'.$fileName->image);
            if(File::exists(public_path($real_image))){
                File::delete(public_path($real_image));   
            }
            if(File::exists(public_path($thumb_image))){
                File::delete(public_path($thumb_image));   
            }
        }
        VehicleImage::where('vehicle_id', $vehicleId)->delete();
        Vehicle::where('id', $vehicleId)->delete();
        return response()->json(['result' => true]);

    }
    public function create_post(Request $request)
    {
        $vehicle = new Vehicle;
        $vehicle->stock_no = $request->stock_no;
        $vehicle->make_type = $request->make_type;
        $vehicle->model_type = $request->model_type;
        $vehicle->body_type = $request->body_type;
        $vehicle->registration = $request->registration;
        $vehicle->fuel_type = $request->fuel_type;
        $vehicle->mileage = $request->mileage;
        $vehicle->engine_model = $request->engine_model;
        $vehicle->engine_size = $request->engine_size;
        $vehicle->seats = $request->seats;
        $vehicle->model_code = $request->model_code;
        $vehicle->exterior_color = $request->exterior_color;
        $vehicle->drive_type = $request->drive_type;
        $vehicle->transmission = $request->transmission;
        $vehicle->steering = $request->steering;
        $vehicle->doors = $request->doors;
        $vehicle->length = $request->length;
        $vehicle->width = $request->width;
        $vehicle->height = $request->height;
        $vehicle->chassis = $request->chassis;
        $vehicle->loading_capacity = $request->loading_capacity;
        $vehicle->ac = $request->has('ac');
        $vehicle->power_steering = $request->has('power_steering');
        $vehicle->auto_door = $request->has('auto_door');
        $vehicle->remote_key = $request->has('remote_key');
        $vehicle->backup_camera = $request->has('backup_camera');
        $vehicle->navigation = $request->has('navigation');
        $vehicle->power_locks = $request->has('power_locks');
        $vehicle->cd_player = $request->has('cd_player');
        $vehicle->dvd = $request->has('dvd');
        $vehicle->mp3_interface = $request->has('mp3_interface');
        $vehicle->ratio = $request->has('ratio');
        $vehicle->sun_roof = $request->has('sun_roof');
        $vehicle->air_bag = $request->has('air_bag');
        $vehicle->abs = $request->has('abs');
        $vehicle->s_power_locks = $request->has('s_power_locks');
        $vehicle->parking_sensors = $request->has('parking_sensors');
        $vehicle->grill_guard = $request->has('grill_guard');
        $vehicle->back_camera = $request->has('back_camera');
        $vehicle->leather_seat = $request->has('leather_seat');
        $vehicle->power_seat = $request->has('power_seat');
        $vehicle->power_mirrors = $request->has('power_mirrors');
        $vehicle->power_window = $request->has('power_window');
        $vehicle->rear_spoiler = $request->has('rear_spoiler');
        $vehicle->alloy_wheels = $request->has('alloy_wheels');
        $vehicle->bluetooth = $request->has('bluetooth');
        $vehicle->price = $request->price;
        $vehicle->sale_price = $request->sale_price;
        $vehicle->video_link = $request->video_link;
        $vehicle->save();

        //image upload section
        if ($request->has('file')) { 
            $path = public_path('uploads/vehicle/'.$request->stock_no.'/');
            if(!file_exists($path)){
                File::makeDirectory($path);
            }
            $thumb_path = $path.'thumb/';
            $real_path = $path.'real/';
            if (!file_exists($thumb_path)) {
                File::makeDirectory($thumb_path); //create thumb image folder
            }
            if(!file_exists($real_path)) {
                File::makeDirectory($real_path); //create thumb image folder
            }
            foreach($request->file as $row){
                $vehicle_image = new VehicleImage;
                $vehicle_id = $vehicle->id;
                $fileName = $row->getClientOriginalName();
                $imgx = Image::make($row->getRealPath());
                // get real image
                $imgx->resize(640, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->crop(640, 480)
                ->save($real_path.$fileName);
                //get thumbnail image
                $imgx->resize(300, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($thumb_path.$fileName);
                
                $vehicle_image->image = $fileName;
                $vehicle_image->vehicle_id = $vehicle_id;
                $vehicle_image->stock_no = $request->stock_no;
                $vehicle_image->save(); 
            }
        }
        return response()->json(['result' => true, 'Add new vehicle' => $vehicle]);
    }
    public function edit_post(Request $request, $id) {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->stock_no = $request->stock_no;
        $vehicle->make_type = $request->make_type;
        $vehicle->model_type = $request->model_type;
        $vehicle->body_type = $request->body_type;
        $vehicle->registration = $request->registration;
        $vehicle->fuel_type = $request->fuel_type;
        $vehicle->mileage = $request->mileage;
        $vehicle->engine_model = $request->engine_model;
        $vehicle->engine_size = $request->engine_size;
        $vehicle->seats = $request->seats;
        $vehicle->model_code = $request->model_code;
        $vehicle->exterior_color = $request->exterior_color;
        $vehicle->drive_type = $request->drive_type;
        $vehicle->transmission = $request->transmission;
        $vehicle->steering = $request->steering;
        $vehicle->doors = $request->doors;
        $vehicle->length = $request->length;
        $vehicle->width = $request->width;
        $vehicle->height = $request->height;
        $vehicle->chassis = $request->chassis;
        $vehicle->loading_capacity = $request->loading_capacity;
        $vehicle->ac = $request->has('ac');
        $vehicle->power_steering = $request->has('power_steering');
        $vehicle->auto_door = $request->has('auto_door');
        $vehicle->remote_key = $request->has('remote_key');
        $vehicle->backup_camera = $request->has('backup_camera');
        $vehicle->navigation = $request->has('navigation');
        $vehicle->power_locks = $request->has('power_locks');
        $vehicle->cd_player = $request->has('cd_player');
        $vehicle->dvd = $request->has('dvd');
        $vehicle->mp3_interface = $request->has('mp3_interface');
        $vehicle->ratio = $request->has('ratio');
        $vehicle->sun_roof = $request->has('sun_roof');
        $vehicle->air_bag = $request->has('air_bag');
        $vehicle->abs = $request->has('abs');
        $vehicle->s_power_locks = $request->has('s_power_locks');
        $vehicle->parking_sensors = $request->has('parking_sensors');
        $vehicle->grill_guard = $request->has('grill_guard');
        $vehicle->back_camera = $request->has('back_camera');
        $vehicle->leather_seat = $request->has('leather_seat');
        $vehicle->power_seat = $request->has('power_seat');
        $vehicle->power_mirrors = $request->has('power_mirrors');
        $vehicle->power_window = $request->has('power_window');
        $vehicle->rear_spoiler = $request->has('rear_spoiler');
        $vehicle->alloy_wheels = $request->has('alloy_wheels');
        $vehicle->bluetooth = $request->has('bluetooth');
        $vehicle->price = $request->price;
        $vehicle->sale_price = $request->sale_price;
        $vehicle->video_link = $request->video_link;
        // $vehicle->save();
        
        //image upload section
        // if ($request->has('file')) { 
        //     dd($request->all());
        //     $path = public_path('uploads/vehicle/'.$request->stock_no.'/');
        //     if(!file_exists($path)){
        //         File::makeDirectory($path);
        //     }
        //     $thumb_path = $path.'thumb/';
        //     $real_path = $path.'real/';
        //     if (!file_exists($thumb_path)) {
        //         File::makeDirectory($thumb_path); //create thumb image folder
        //     }
        //     if(!file_exists($real_path)) {
        //         File::makeDirectory($real_path); //create thumb image folder
        //     }
        //     foreach($request->file as $row){
        //         $vehicle_image = new VehicleImage;
        //         $fileName = $row->getClientOriginalName();
        //         $imgx = Image::make($row->getRealPath());
        //         // get real image
        //         $imgx->resize(640, null, function ($constraint) {
        //             $constraint->aspectRatio();
        //             $constraint->upsize();
        //         })->crop(640, 480)
        //         ->save($real_path.$fileName);
        //         //get thumbnail image
        //         $imgx->resize(300, null, function ($constraint) {
        //                 $constraint->aspectRatio();
        //             })->save($thumb_path.$fileName);
                
        //         $vehicle_image->image = $fileName;
        //         $vehicle_image->stock_no = $request->stock_no;
        //         $vehicle_image->save(); 
        //     }
        // }
        return response()->json(['result' => true, 'Add new vehicle' => $vehicle]);
    }
    public function imageAdd(Request $request){
        
        //image upload section
        if ($request->has('file')) { 
            dd($request->all());
            $path = public_path('uploads/vehicle/'.$request->stock_no.'/');
            if(!file_exists($path)){
                File::makeDirectory($path);
            }
            $thumb_path = $path.'thumb/';
            $real_path = $path.'real/';
            if (!file_exists($thumb_path)) {
                File::makeDirectory($thumb_path); //create thumb image folder
            }
            if(!file_exists($real_path)) {
                File::makeDirectory($real_path); //create thumb image folder
            }
            foreach($request->file as $row){
                $vehicle_image = new VehicleImage;
                $fileName = $row->getClientOriginalName();
                $imgx = Image::make($row->getRealPath());
                // get real image
                $imgx->resize(640, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->crop(640, 480)
                ->save($real_path.$fileName);
                //get thumbnail image
                $imgx->resize(300, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($thumb_path.$fileName);
                
                $vehicle_image->image = $fileName;
                $vehicle_image->stock_no = $request->stock_no;
                $vehicle_image->save(); 
            }
        }
    }
}
