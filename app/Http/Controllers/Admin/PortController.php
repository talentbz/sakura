<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Port;
class PortController extends Controller
{
    public function index(Request $request){   
        $country= Port::orderBy('id')->get();
        // dd($country[0]);
        return view('admin.pages.port.index', [
            'country' => $country,
        ]);
    }

    public function edit(Request $request, $id){ 
        $country= Port::orderBy('id')->get();
        $port = Port::where('id', $id)->first();
        $current_country = $port->country;
        $body_type = config('config.body_type');
        if($port->port) {
            $port_count = count(json_decode($port->port));
            $port_body_type = json_decode($port->body_type);
            $port_key = json_decode($port->port);
            $port_price = json_decode($port->price);    
        } else {
            $port_count = 0;
            $port_body_type = [];
            $port_key = [];
            $port_price = [];
        }
        return view('admin.pages.port.edit', [
            'country' => $country,
            'current_country' => $current_country,
            'port_count' => $port_count,
            'port_body_type' => $port_body_type,
            'port_key' => $port_key,
            'port_price' => $port_price,
            'body_type' => $body_type,
        ]);
    }
    public function edit_post(Request $request){ 
        // dd($request->all());
        $country_id = $request->country;
        $port = Port::where('id', $country_id)->first();
        $port_name = $request->port;
        $port_price = $request->price;
        $port_body_type = $request->body_type;
        $port->port = $port_name;
        $port->price = $port_price;
        $port->body_type = $port_body_type;
        $port_array = [];
        foreach($port_name as $key=>$row){
            $single_port_array = [];
            $single_port_array[$port_body_type[$key]] =  $port_price[$key];
            array_push($single_port_array, $port_name[$key]);
            $port_array[] = $single_port_array;
        }
        $port->port_array = $port_array;
        $port->save();
        return response()->json(['result' => true, 'save port' => $port]);
    }
}
