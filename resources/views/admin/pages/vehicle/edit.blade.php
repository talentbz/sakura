@extends('admin.layouts.master')
@section('title') User List @endsection
@section('css')
    <link href="{{ URL::asset('/assets/admin/plugin/fileinput/fileinput.css') }}" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/admin/pages/vehicle/create.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Vehicle Management @endslot
        @slot('title') Edit Vehicle @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="detail-wrapper">
                    <form id="myForm"  method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Car Details</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="detail-list mb-3 row">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Make</label>
                                            </div>
                                            <div class="col-md-8">
                                                <select class="form-select select-category" name="make_type">
                                                    <option value="">select</option>
                                                    @foreach($models as $model)
                                                        <option value="{{$model['category_name']}}" {{ $data->make_type == $model['category_name'] ? "selected" : "" }}  >{{$model['category_name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="detail-list mb-3 row">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Model</label>
                                            </div>
                                            <div class="col-md-8">
                                                <select id="subcategory" class="form-select" name="model_type">
                                                    <option value="">select</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="detail-list mb-3 row">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Body Type</label>
                                            </div>
                                            <div class="col-md-8">
                                                <select class="form-select" name="body_type">
                                                    <option value="">Select Body Type</option>
                                                    @foreach($body_type as $row)
                                                        <option value="{{$row}}" {{ $data->body_type == $row ? "selected" : "" }}>{{$row}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="detail-list mb-3 row">
                                            <div class="col-md-4">
                                                <label class="col-form-label"> Stock No</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" placeholder="Enter Stock No" name="stock_no" value="{{$data->stock_no}}"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="detail-list mb-3 row">
                                            <div class="col-md-4">
                                                <label class="col-form-label"> Registration</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" placeholder="Enter Registration" name="registration" value="{{$data->registration}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="detail-list mb-3 row">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Fuel type</label>
                                            </div>
                                            <div class="col-md-8">
                                                <select class="form-select" name="fuel_type">
                                                    <option value="">Select Fuel type</option>
                                                        @foreach($fuel_type as $row)
                                                            <option value="{{$row}}" {{ $data->fuel_type == $row ? "selected" : "" }}>{{$row}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="detail-list mb-3 row">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Mileage</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" placeholder="Enter Mileage(km)" name="mileage" value="{{$data->mileage}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="detail-list mb-3 row">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Engine Model</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" placeholder="Enter Engine Model" name="engine_model" value="{{$data->engine_model}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="detail-list mb-3 row">
                                            <div class="col-md-4">
                                                <label class="col-form-label"> Engine Size CC</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" placeholder="Enter Engine Size CC" name="engine_size" value="{{$data->engine_size}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="detail-list mb-3 row">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Seats</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" placeholder="Enter Seats" name="seats" value="{{$data->seats}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="detail-list mb-3 row">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Model Code</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" placeholder="Enter Model Code" name="model_code" value="{{$data->model_code}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="detail-list mb-3 row">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Exterior Color</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" placeholder="Enter Exterior Color" name="exterior_color" value="{{$data->exterior_color}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="detail-list mb-3 row">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Drive Type</label>
                                            </div>
                                            <div class="col-md-8">
                                                <select class="form-select" name="drive_type">
                                                    <option value="">Select Drive Type</option>
                                                    <option value="2 Wheel">2 Wheel</option>
                                                    <option value="4 Wheel">4 Wheel</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="detail-list mb-3 row">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Transmission</label>
                                            </div>
                                            <div class="col-md-8">
                                                <select class="form-select" name="transmission">
                                                    <option value="">Select Transmission</option>
                                                    <option value="Automatic">Automatic</option>
                                                    <option value="Manual">Manual</option>
                                                    <option value="Semi-Automatic">Semi-Automatic</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="detail-list mb-3 row">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Steering</label>
                                            </div>
                                            <div class="col-md-8">
                                                <select class="form-select" name="steering">
                                                    <option value="">Select Steering</option>
                                                    <option value="Right">Right</option>
                                                    <option value="Left">Left</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="detail-list mb-3 row">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Doors</label>
                                            </div>
                                            <div class="col-md-8">
                                                <select class="form-select" name="doors">
                                                    <option value="">Select Doors</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="detail-list mb-3 row">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Max Loading Capacity</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" placeholder="Enter Max Loading Capacity" name="loading_capacity" value="{{$data->loading_capacity}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="detail-list mb-3 row">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Length(cm)</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" placeholder="Enter Length(cm)" name="length" value="{{$data->length}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="detail-list mb-3 row">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Width(cm)</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" placeholder="Enter Width(cm)" name="width" value="{{$data->width}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="detail-list mb-3 row">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Height(cm)</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" placeholder="Enter Height(cm)" name="height" value="{{$data->height}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="detail-list mb-3 row">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Chassis</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" placeholder="Enter Chassis" name="chassis" value="{{$data->chassis}}">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Select Your Car Features</h4>
                                <div class="row">
                                    <div class="col-md-2">
                                        <h4 class="card-title mb-3">Comfort</h4>
                                        <div class="car-feature mb-3">
                                            <input class="form-check-input" type="checkbox" id="ac" name="ac" {{$data->ac == 1? 'checked':''}}>
                                            <label class="form-check-label" for="ac">A/C</label>
                                        </div>
                                        <div class="car-feature mb-3">
                                            <input class="form-check-input" type="checkbox" id="power_steering" name="power_steering" {{$data->power_steering == 1? 'checked':''}}>
                                            <label class="form-check-label" for="power_steering">Power Steering</label>
                                        </div>
                                        <div class="car-feature mb-3">
                                            <input class="form-check-input" type="checkbox" id="auto_door" name="auto_door" {{$data->auto_door == 1? 'checked':''}}>
                                            <label class="form-check-label" for="auto_door">Auto Door</label>
                                        </div>
                                        <div class="car-feature mb-3">
                                            <input class="form-check-input" type="checkbox" id="remote_key" name="remote_key" {{$data->remote_key == 1? 'checked':''}}>
                                            <label class="form-check-label" for="remote_key">Remote Key</label>
                                        </div>
                                        <div class="car-feature mb-3">
                                            <input class="form-check-input" type="checkbox" id="backup_camera" name="backup_camera" {{$data->backup_camera == 1? 'checked':''}}>
                                            <label class="form-check-label" for="backup_camera">Backup Camera</label>
                                        </div>
                                        <div class="car-feature mb-3">
                                            <input class="form-check-input" type="checkbox" id="navigation" name="navigation" {{$data->navigation == 1? 'checked':''}}>
                                            <label class="form-check-label" for="navigation">Navigation</label>
                                        </div>
                                        <div class="car-feature mb-3">
                                            <input class="form-check-input" type="checkbox" id="power_locks" name="power_locks" {{$data->power_locks == 1? 'checked':''}}>
                                            <label class="form-check-label" for="power_locks">Power Locks</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <h4 class="card-title mb-3">Entertainment</h4>
                                        <div class="car-feature mb-3">
                                            <input class="form-check-input" type="checkbox" id="cd_player" name="cd_player" {{$data->cd_player == 1? 'checked':''}}>
                                            <label class="form-check-label" for="cd_player">CD player</label>
                                        </div>
                                        <div class="car-feature mb-3">
                                            <input class="form-check-input" type="checkbox" id="dvd" name="dvd">
                                            <label class="form-check-label" for="dvd">DVD</label>
                                        </div>
                                        <div class="car-feature mb-3">
                                            <input class="form-check-input" type="checkbox" id="mp3_interface" name="mp3_interface" {{$data->mp3_interface == 1? 'checked':''}}>
                                            <label class="form-check-label" for="mp3_interface">MP3 interface</label>
                                        </div>
                                        <div class="car-feature mb-3">
                                            <input class="form-check-input" type="checkbox" id="ratio" name="ratio" {{$data->ratio == 1? 'checked':''}}>
                                            <label class="form-check-label" for="ratio">Radio</label>
                                        </div>
                                        <div class="car-feature mb-3">
                                            <input class="form-check-input" type="checkbox" id="sun_roof" name="sun_roof" {{$data->sun_roof == 1? 'checked':''}}>
                                            <label class="form-check-label" for="sun_roof">Sun Roof</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <h4 class="card-title mb-3">Safety</h4>
                                        <div class="car-feature mb-3">
                                            <input class="form-check-input" type="checkbox" id="air_bag" name="air_bag" {{$data->air_bag == 1? 'checked':''}}>
                                            <label class="form-check-label" for="air_bag">Air bag</label>
                                        </div>
                                        <div class="car-feature mb-3">
                                            <input class="form-check-input" type="checkbox" id="abs" name="abs" {{$data->abs == 1? 'checked':''}}>
                                            <label class="form-check-label" for="abs">ABS</label>
                                        </div>
                                        <div class="car-feature mb-3">
                                            <input class="form-check-input" type="checkbox" id="s_power_locks" name="s_power_locks" {{$data->s_power_locks == 1? 'checked':''}}>
                                            <label class="form-check-label" for="s_power_locks">Power Locks</label>
                                        </div>
                                        <div class="car-feature mb-3">
                                            <input class="form-check-input" type="checkbox" id="parking_sensors" name="parking_sensors" {{$data->parking_sensors == 1? 'checked':''}}>
                                            <label class="form-check-label" for="parking_sensors">Parking sensors</label>
                                        </div>
                                        <div class="car-feature mb-3">
                                            <input class="form-check-input" type="checkbox" id="grill_guard" name="grill_guard" {{$data->grill_guard == 1? 'checked':''}}>
                                            <label class="form-check-label" for="grill_guard">Grill Guard</label>
                                        </div>
                                        <div class="car-feature mb-3">
                                            <input class="form-check-input" type="checkbox" id="back_camera" name="back_camera" {{$data->back_camera == 1? 'checked':''}}>
                                            <label class="form-check-label" for="back_camera">Back Camera</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <h4 class="card-title mb-3">Seats</h4>
                                        <div class="car-feature mb-3">
                                            <input class="form-check-input" type="checkbox" id="leather_seat" name="leather_seat" {{$data->leather_seat == 1? 'checked':''}}>
                                            <label class="form-check-label" for="leather_seat">Leather Seat</label>
                                        </div>
                                        <div class="car-feature mb-3">
                                            <input class="form-check-input" type="checkbox" id="power_seat" name="power_seat" {{$data->power_seat == 1? 'checked':''}}>
                                            <label class="form-check-label" for="power_seat">Power Seat</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <h4 class="card-title mb-3">Windows</h4>
                                        <div class="car-feature mb-3">
                                            <input class="form-check-input" type="checkbox" id="power_mirrors" name="power_mirrors" {{$data->power_mirrors == 1? 'checked':''}}>
                                            <label class="form-check-label" for="power_mirrors">Power Mirrors</label>
                                        </div>
                                        <div class="car-feature mb-3">
                                            <input class="form-check-input" type="checkbox" id="power_window" name="power_window" {{$data->power_window == 1? 'checked':''}}>
                                            <label class="form-check-label" for="power_window">Power Window</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <h4 class="card-title mb-3">Other</h4>
                                        <div class="car-feature mb-3">
                                            <input class="form-check-input" type="checkbox" id="rear_spoiler" name="rear_spoiler" {{$data->rear_spoiler == 1? 'checked':''}}>
                                            <label class="form-check-label" for="rear_spoiler">Rear Spoiler</label>
                                        </div>
                                        <div class="car-feature mb-3">
                                            <input class="form-check-input" type="checkbox" id="alloy_wheels" name="alloy_wheels" {{$data->alloy_wheels == 1? 'checked':''}}>
                                            <label class="form-check-label" for="alloy_wheels">Alloy wheels</label>
                                        </div>
                                        <div class="car-feature mb-3">
                                            <input class="form-check-input" type="checkbox" id="bluetooth" name="bluetooth" {{$data->bluetooth == 1? 'checked':''}}>
                                            <label class="form-check-label" for="bluetooth">Bluetooth</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Add Vehicle Image</h4>
                                <div class="row">
                                    <label class="col-form-label">Image Upload</label>
                                    <div class="file-loading">
                                            <input id="input-24" name="file[]" type="file" multiple>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Add Video</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">Video link</label>
                                        <input class="form-control" type="text" placeholder="Enter Video link" name="video_link" value="{{$data->video_link}}">
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mt-4">If you don't have the videos handy, don't worry. You can add or edit them after you complete your ad using the "Manage Your Ad" page.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Add Price</h4>
                                <div class="row">
                                    <p>Determine a competitive price by comparing your vehicle's information and mileage to similar vehicles for sale by dealers and private sellers in your area. Then consider pricing your vehicle within range. Be sure to provide Seller's Comments and photos to highlight the best features of your vehicle, especially if your asking price is above average.</p>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="col-form-label">Price* (¥)</label>
                                                <input class="form-control" type="number" placeholder="" require name="price" value="{{$data->price}}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Sale Price (¥)</label>
                                                <input class="form-control" type="number" placeholder="" require name="sale_price" value="{{$data->sale_price}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var models = @json($models);
        var create_url = "{{route('admin.vehicle.create_post')}}";
    </script>
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/admin/plugin/fileinput/fileinput.js') }}"></script>
    <script src="{{ URL::asset('/assets/admin/pages/vehicle/create.js') }}"></script>
@endsection