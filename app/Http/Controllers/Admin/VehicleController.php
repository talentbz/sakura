<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
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
}
