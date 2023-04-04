<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Validator, Exception, Image, URL;
use App\Models\VehicleType;

class BodyTypeController extends Controller
{
    public function index(Request $request){
        $data = VehicleType::get();
        return view('admin.pages.bodyType.index', [
            'data' => $data, 
        ]);
    }

    public function add(Request $request){
        return view('admin.pages.bodyType.add');
    }

    public function add_post(Request $request){
        // get max code id and add plus 1 in here.
        //dd($request->all());
        $code_id = VehicleType::select(DB::raw("CONCAT('BDT', LPAD(CAST(SUBSTRING(MAX(code_id), 4) AS UNSIGNED) + 1, 3, '0')) AS new_code_id"))
                                ->get()
                                ->pluck('new_code_id')
                                ->first();
        $order_id = VehicleType::max('order_id') + 1 ;
        $data = new VehicleType;
        $data->vehicle_type = $request->vehicle_type;
        $data->code_id = $code_id;
        $data->order_id = $order_id;
        if ($request->has('file')) {
            $path = public_path('uploads/body_type/');
            if(!file_exists($path)){
                File::makeDirectory($path);
            }
            $file = $request->file;
            $fileName = $file->getClientOriginalName();
            $imgx = Image::make($file->getRealPath());
            $imgx->resize(50, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path.$fileName);
            $data->image = $fileName; 
        };
        $data->save();
        return response()->json(['result' => true]);
    }

    public function edit(Request $request, $id){
        $data = VehicleType::findOrFail($id);
        return view('admin.pages.bodyType.edit', [
            'data' => $data, 
        ]);
    }

    public function edit_post(Request $request){
        $data = VehicleType::findOrFail($request->id);
        $data->vehicle_type = $request->vehicle_type;
        if ($request->has('file')) {
            $path = public_path('uploads/body_type/');
            if(!file_exists($path)){
                File::makeDirectory($path);
            }
            $file = $request->file;
            $fileName = $file->getClientOriginalName();
            $imgx = Image::make($file->getRealPath());
            $imgx->resize(50, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path.$fileName);
            $data->image = $fileName; 
        };
        $data->save();
        return response()->json(['result' => true, 'Updated data' => $data]);
    }
    public function delete(Request $request){
        $id = $request->id;
        $vehicle_type = VehicleType::where('id', $id)->delete();
        return response()->json(['result' => true]);
    }
}
