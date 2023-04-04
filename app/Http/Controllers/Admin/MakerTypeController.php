<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Validator, Exception, Image, URL;
use App\Models\MakerType;

class MakerTypeController extends Controller
{
    public function index(Request $request){
        $data = MakerType::get();
        return view('admin.pages.makerType.index', [
            'data' => $data, 
        ]);
    }

    public function add(Request $request){
        return view('admin.pages.makerType.add');
    }

    public function add_post(Request $request){
        // get max code id and add plus 1 in here.
        //dd($request->all());
        $code_id = MakerType::select(DB::raw("CONCAT('BDT', LPAD(CAST(SUBSTRING(MAX(code_id), 4) AS UNSIGNED) + 1, 3, '0')) AS new_code_id"))
                                ->get()
                                ->pluck('new_code_id')
                                ->first();
        $order_id = MakerType::max('order_id') + 1 ;
        $data = new MakerType;
        $data->maker_type = $request->maker_type;
        $data->code_id = $code_id;
        $data->order_id = $order_id;
        if ($request->has('file')) {
            $path = public_path('uploads/maker_type/');
            if(!file_exists($path)){
                File::makeDirectory($path);
            }
            $file = $request->file;
            $fileName = $file->getClientOriginalName();
            $imgx = Image::make($file->getRealPath());
            $imgx->resize(30, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path.$fileName);
            $data->image = $fileName; 
        };
        $data->save();
        return response()->json(['result' => true]);
    }

    public function edit(Request $request, $id){
        $data = MakerType::findOrFail($id);
        return view('admin.pages.makerType.edit', [
            'data' => $data, 
        ]);
    }

    public function edit_post(Request $request){
        $data = MakerType::findOrFail($request->id);
        $data->maker_type = $request->maker_type;
        if ($request->has('file')) {
            $path = public_path('uploads/maker_type/');
            if(!file_exists($path)){
                File::makeDirectory($path);
            }
            $file = $request->file;
            $fileName = $file->getClientOriginalName();
            $imgx = Image::make($file->getRealPath());
            $imgx->resize(30, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path.$fileName);
            $data->image = $fileName; 
        };
        $data->save();
        return response()->json(['result' => true, 'Updated data' => $data]);
    }
    public function delete(Request $request){
        $id = $request->id;
        $maker_type = MakerType::where('id', $id)->delete();
        return response()->json(['result' => true]);
    }
}
