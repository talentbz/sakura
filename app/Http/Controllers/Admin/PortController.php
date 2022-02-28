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
        if($port->port) {
            $port_count = count(json_decode($port->port));
            $port_key = json_decode($port->port);
            $port_price = json_decode($port->price);    
        } else {
            $port_count = 0;
            $port_key = [];
            $port_price = [];
        }
        return view('admin.pages.port.edit', [
            'country' => $country,
            'current_country' => $current_country,
            'port_count' => $port_count,
            'port_key' => $port_key,
            'port_price' => $port_price,
        ]);
    }
    public function edit_post(Request $request){ 
        $country_id = $request->country;
        $port = Port::where('id', $country_id)->first();
        $port->port = $request->port;
        $port->price = $request->price;
        $port->save();
        return response()->json(['result' => true, 'save port' => $port]);
    }
}
