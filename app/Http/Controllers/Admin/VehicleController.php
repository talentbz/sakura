<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use DB, Validator, Exception, Image;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        $data = Vehicle::where('id', 2)->select('image_url')->first();
        dd(unserialize($data->image_url));
        return view('admin.pages.vehicle.index', [

        ]);
    }
    public function create(Request $request)
    {
        $models = config('config.model_catgory');
        $body_type= config('config.body_type');
        $fuel_type= config('config.fuel_type');

        return view('admin.pages.vehicle.create', [
            'models' => $models,
            'body_type' => $body_type,
            'fuel_type' => $fuel_type,
        ]);
    }
    public function edit(Request $request, $id) {
        $data = Vehicle::findOrFail($id);
        $models = config('config.model_catgory');
        $body_type= config('config.body_type');
        $fuel_type= config('config.fuel_type');
        return view('admin.pages.vehicle.edit', [
            'data' => $data,
            'models' => $models,
            'body_type' => $body_type,
            'fuel_type' => $fuel_type,
        ]);
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
            $img_path = [];
            foreach($request->file as $row){
                $fileName = $row->getClientOriginalName();
                array_push($img_path, $fileName);
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
                
            }
        }
        $vehicle->image_url = serialize($img_path);
        $vehicle->save();
        return response()->json(['result' => true, 'Add new vehicle' => $vehicle]);
    }
}
