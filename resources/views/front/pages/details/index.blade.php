@extends('front.layouts.index')
@section('title') Details @endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/lightgallery/lightgallery.min.css') }}">
    <link href="{{ URL::asset('/assets/frontend/pages/details/style.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<!-- banner && menu section-->
<div class="hero">
    <div class="hero-wrapper">
        @include('front.layouts.menu')
    </div>
</div>
<!-- /end banner && menu -->
<!-- contents -->
<div class="contents">
    <div class="contents-details">
        <!-- mobile -->
        <div class="detail-sidebar mobile-sidebar">
            <!-- price calculator -->
            <div class="price-calculator">
                <div class="calc-title">
                    <h3>Price Calculator</h3>
                </div>
                <div class="clac-form">
                    <div class="calc-list">
                        <div class="calc-list-label">
                            <label for="">Select Country</label>
                        </div>
                        <div class="calc-list-value">
                            <select class="form-select select-country" name="">
                                @foreach($country as $row)
                                    <option value="{{$row->id}}" {{ $current_country->country == $row->country ? "selected" : "" }}>{{$row->country}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="calc-list">
                        <div class="calc-list-label">
                            <label for="">Select Port</label>
                        </div>
                        <div class="calc-list-value">
                            <select class="form-select port-ad" name="">
                                @if($port_count)
                                    @foreach($port_list as $key=>$row)
                                        <option value='{{json_encode($row)}}'>{{$key}}</option>
                                    @endforeach
                                    <option value="0"></option>
                                @else
                                    <option value="0"></option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="calc-list">
                        <div class="calc-list-label">
                            <label for="">Inspection</label>
                        </div>
                        <div class="calc-list-value">
                            <a href="javascript:void(0)" class="btn btn-ins ins-margin insp-n" data-id="0">No</a>
                            <a href="javascript:void(0)" class="btn btn-ins insp-y" data-id="{{$rate->inspection}}">Yes</a>
                        </div>
                        <input type="hidden" class="insp-value" value="{{$inspection?$inspection:0}}">
                    </div>
                    <div class="calc-list">
                        <div class="calc-list-label">
                            <label for="">Insurance</label>
                        </div>
                        <div class="calc-list-value">
                            <a href="javascript:void(0)" class="btn btn-ins ins-margin insu-n" data-id="0">No</a>
                            <a href="javascript:void(0)" class="btn btn-ins insu-y" data-id="{{$rate->insurance}}">Yes</a>
                        </div>
                        <input type="hidden" class="insu-value" value="{{$insurance?$insurance:0}}">
                    </div>
                </div>
                <button type="submit" class="ins-submit" id="mobile-calc"><i class="bx bx-calendar"></i> Calculate</button>
            </div>
            <!-- /price calculator -->
        </div><!-- /end mobile -->
        <div class="main-products">
            <div class="vehicle-info">
                <div class="vehicle-name">
                    <h3>{{$vehicle_data->make_type}} {{$vehicle_data->model_type}} {{$vehicle_data->body_type}}</h3>
                    <div class="vehicle-chas">
                        <span>CHASSIS</span>
                        <p>{{$vehicle_data->chassis}}</p>
                    </div>
                    <div class="vehicle-name-border"></div>
                </div>
                <div class="vehicle-price">
                    <div class="price-info">
                        <div class="fob-price">
                            <h3 class="fob-label">Price (Fob)</h3>
                            <input type="hidden" class="cubic-meter" value="{{($vehicle_data->width*$vehicle_data->length*$vehicle_data->height)/1000000}}">
                            @if($vehicle_data->sale_price==null)
                                <input type="hidden" class="price" value="{{round($vehicle_data->price/$rate->rate)}}"/>
                                <h3 class="fob-value">${{number_format(round($vehicle_data->price/$rate->rate))}}</h3>
                            @else                                
                                <input type="hidden" class="price" value="{{round($vehicle_data->sale_price/$rate->rate)}}"/>
                                <h3 class="fob-value">${{number_format(round($vehicle_data->sale_price/$rate->rate))}}</h3>
                            @endif
                        </div>
                        <div class="total-price">
                            <h5 class="total-price-label">Total Price</h5>
                            <h5 class="total-price-value">{{!$total_price=='' ? $total_price:'ASK'}}</h5>
                        </div>
                        <div class="ml-2 cif">
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- -->
            <div class="slick-wrapper">
                <div class="product">
                    <div class="product-images">
                        @if($vehicle_data->status)
                        <div class="special-label">Reserved</div>
                        @endif
                        <div class="media-count">
                            @if($vehicle_img)
                            <div class="image-count" data-id="{{$vehicle_data->id}}">
                                <i class="fas fa-camera"></i>
                                <span>{{count($vehicle_img)}}</span>
                            </div>
                            @endif
                            @if(isset($vehicle_data->video_link))
                            <div class="video-count" data-id="{{$vehicle_data->video_link}}">
                                <i class="fas fa-video"></i>
                                <span>1</span>
                            </div>
                            @endif
                        </div>
                        <div class="slider">
                            @foreach($vehicle_img as $row)
                                <div>
                                    <img src="{{$real_url}}/{{$row->image}}" >
                                </div>
                            @endforeach
                        </div>
                        <div class="slider-thumbnails">
                            @foreach($vehicle_img as $row)
                                <div>
                                    <img src="{{$thumb_url}}/{{$row->image}}" >
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="social-share">
                <div class="social-wrapper">
                    <a href="#" class="social-face"><i class="fab fa-facebook-f"></i> share</a>
                    <a href="#" class="social-viber"><i class="fab fa-viber"></i> share</a>
                    <a href="#" class="social-whatsapp"><i class="bx bxl-whatsapp"></i> share</a>
                    <a href="{{route('front.details.image_download', ['id' => $id])}}" class="download-image"><i class="fas fa-download"></i>Download all images</a>
                </div>
            </div>
            <div class="car-detail">
                <div class="car-detail-title">
                    <h3>Car <span>Details</span></h3>
                </div>
                <table class="table table-bordered dt-responsive  nowrap w-100">
                    <thead>
                    </thead>
                    <tbody class="pc-table">
                        <tr>
                            <td class="table-light" scope="row">STOCK NO</td>
                            <td class="stock-no">SM{{$vehicle_data->stock_no}}</td>
                            <td class="table-light">Year</td>
                            <td>{{$vehicle_data->registration}}</td>
                            <td class="table-light">Model</td>
                            <td>TD42</td>
                            <input type="hidden" value="{{$vehicle_data->body_type}}" class="body_type">
                               
                        <tr>
                            <td class="table-light" scope="row">Transmission</td>
                            <td>{{$vehicle_data->transmission}}</td>
                            <td class="table-light">ENGINE MODEL</td>
                            <td>{{$vehicle_data->engine_model}}</td>
                            <td class="table-light">Fuel Type</td>
                            <td>{{$vehicle_data->fuel_type}}</td>
                        </tr>       
                        <tr>
                            <td class="table-light">Engine CC</td>
                            <td>{{$vehicle_data->engine_size}}</td>
                            <td class="table-light">Seating</td>
                            <td>{{$vehicle_data->seats}}</td>
                            <td class="table-light">Chassis</td>
                            <td>{{$vehicle_data->chassis}}</td>
                        </tr>        
                        <tr>
                            <td class="table-light">Drive Type</td>
                            <td>{{$vehicle_data->drive_type}}</td>
                            <td class="table-light">Mileage</td>
                            <td>{{$vehicle_data->mileage}} (km)</td>
                            <td class="table-light">Make</td>
                            <td>{{$vehicle_data->make_type}}</td>
                        </tr>  
                        <tr>
                            <td class="table-light">Width(Cm)</td>
                            <td>{{$vehicle_data->width}}</td>
                            <td class="table-light">Height(cm)</td>
                            <td>{{$vehicle_data->height}}</td>
                            <td class="table-light">Length(cm)</td>
                            <td>{{$vehicle_data->length}}</td>
                        </tr>  
                        <tr>
                            <td class="table-light">Steering</td>
                            <td>{{$vehicle_data->steering}}</td>
                            <td class="table-light">Doors</td>
                            <td>{{$vehicle_data->doors}}</td>
                            <td class="table-light">Fuel Type</td>
                            <td>{{$vehicle_data->fuel_type}}</td>
                        </tr> 
                    </tbody>
                    <tbody class="mobile-table">
                        <tr>
                            <td class="table-light" scope="row">STOCK NO</td>
                            <td>SM{{$vehicle_data->stock_no}}</td>
                        </tr>    
                        <tr>
                            <td class="table-light">Year</td>
                            <td>{{$vehicle_data->registration}}</td>
                        </tr>
                        <tr>
                            <td class="table-light">Model</td>
                            <td>TD42</td>
                        </tr>   
                        <tr>
                            <td class="table-light" scope="row">Transmission</td>
                            <td>{{$vehicle_data->transmission}}</td>
                        </tr>
                        <tr>
                            <td class="table-light"> ENGINE MODEL </td>
                            <td>{{$vehicle_data->engine_model}}</td>
                        </tr>       
                        <tr>
                            <td class="table-light">Fuel Type</td>
                            <td>{{$vehicle_data->fuel_type}}</td>
                        </tr>
                        <tr>
                            <td class="table-light">Engine CC</td>
                            <td>{{$vehicle_data->engine_size}}</td>
                        </tr>
                        <tr>
                            <td class="table-light">Drive Type</td>
                            <td>{{$vehicle_data->drive_type}}</td>
                        </tr>
                        <tr>
                            <td class="table-light">Seating</td>
                            <td>{{$vehicle_data->seats}}</td>
                        </tr>        
                        <tr>
                            <td class="table-light">Chassis</td>
                            <td>{{$vehicle_data->chassis}}</td>
                        </tr>
                        <tr>
                            <td class="table-light">Mileage</td>
                            <td>{{$vehicle_data->mileage}} (km)</td>
                        </tr>
                        <tr>
                            <td class="table-light">Make</td>
                            <td>{{$vehicle_data->make_type}}</td>
                        </tr>
                        <tr>
                            <td class="table-light">Width(Cm)</td>
                            <td>{{$vehicle_data->width}}</td>
                        </tr>  
                        <tr>
                            <td class="table-light">Steering</td>
                            <td>{{$vehicle_data->steering}}</td>
                        </tr>
                        <tr>
                            <td class="table-light">Height(cm)</td>
                            <td>{{$vehicle_data->height}}</td>
                        </tr>  
                        <tr>
                            <td class="table-light">Length(cm) </td>
                            <td>{{$vehicle_data->length}}</td>
                        </tr>
                        <tr>
                            <td class="table-light">Doors</td>
                            <td>{{$vehicle_data->doors}}</td>
                        </tr> 
                        <tr>
                            <td class="table-light">Fuel Type </td>
                            <td>{{$vehicle_data->fuel_type}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- feature table -->
            <div class="featured-option">
                <div class="car-detail-title">
                    <h3>Featured Options</h3>
                </div>
                <table class="table table-bordered dt-responsive  nowrap w-100">
                    <tr>
                        <td class="{{$vehicle_data->ac==1?'attached-on':'attached-off'}}">AC</td>
                        <td class="{{$vehicle_data->power_steering==1?'attached-on':'attached-off'}}">Power Steering</td>
                        <td class="{{$vehicle_data->auto_door==1?'attached-on':'attached-off'}}">Auto Door</td>
                        <td class="{{$vehicle_data->remote_key==1?'attached-on':'attached-off'}}">Remote Key</td>
                        <td class="{{$vehicle_data->backup_camera==1?'attached-on':'attached-off'}}">Backup Camera</td>
                        <td class="{{$vehicle_data->navigation==1?'attached-on':'attached-off'}}">Navigation</td>
                    </tr>
                    <tr>
                        <td class="{{$vehicle_data->power_locks==1?'attached-on':'attached-off'}}">Power Locks</td>
                        <td class="{{$vehicle_data->cd_player==1?'attached-on':'attached-off'}}">CD player</td>
                        <td class="{{$vehicle_data->dvd==1?'attached-on':'attached-off'}}">DVD</td>
                        <td class="{{$vehicle_data->mp3_interface==1?'attached-on':'attached-off'}}">MP3 interface</td>
                        <td class="{{$vehicle_data->ratio==1?'attached-on':'attached-off'}}">Radio</td>
                        <td class="{{$vehicle_data->sun_roof==1?'attached-on':'attached-off'}}">Sun Roof</td>
                    </tr>
                    <tr>
                        <td class="{{$vehicle_data->air_bag==1?'attached-on':'attached-off'}}">Air bag</td>
                        <td class="{{$vehicle_data->abs==1?'attached-on':'attached-off'}}">ABS</td>
                        <td class="{{$vehicle_data->s_power_locks==1?'attached-on':'attached-off'}}">Power Locks</td>
                        <td class="{{$vehicle_data->parking_sensors==1?'attached-on':'attached-off'}}">Parking sensors</td>
                        <td class="{{$vehicle_data->grill_guard==1?'attached-on':'attached-off'}}">Grill Guard</td>
                        <td class="{{$vehicle_data->back_camera==1?'attached-on':'attached-off'}}">Back Camera</td>
                    </tr>
                    <tr>
                        <td class="{{$vehicle_data->leather_seat==1?'attached-on':'attached-off'}}">Leather Seat</td>
                        <td class="{{$vehicle_data->power_seat==1?'attached-on':'attached-off'}}">Power Seat</td>
                        <td class="{{$vehicle_data->power_mirrors==1?'attached-on':'attached-off'}}">Power Mirrors</td>
                        <td class="{{$vehicle_data->power_window==1?'attached-on':'attached-off'}}">Power Window</td>
                        <td class="{{$vehicle_data->rear_spoiler==1?'attached-on':'attached-off'}}">Rear Spoiler</td>
                        <td class="{{$vehicle_data->alloy_wheels==1?'attached-on':'attached-off'}}">Alloy wheels</td>
                    </tr>
                    <tr>
                        <td class="{{$vehicle_data->bluetooth==1?'attached-on':'attached-off'}}">Bluetooth</td>
                        <td colspan="5"></td>
                    </tr>
                </table>
            </div>
            <div class="mobile-featured-option">
                <div class="car-detail-title">
                    <h3>Featured Options</h3>
                </div>
                
                    <div class="{{$vehicle_data->ac==1?'attached-on':'attached-off'}}">AC</div>
                    <div class="{{$vehicle_data->power_steering==1?'attached-on':'attached-off'}}">Power Steering</div>
                
                
                    <div class="{{$vehicle_data->auto_door==1?'attached-on':'attached-off'}}">Auto Door</div>
                    <div class="{{$vehicle_data->remote_key==1?'attached-on':'attached-off'}}">Remote Key</div>
                
                
                    <div class="{{$vehicle_data->backup_camera==1?'attached-on':'attached-off'}}">Backup Camera</div>
                    <div class="{{$vehicle_data->navigation==1?'attached-on':'attached-off'}}">Navigation</div>
                
                
                    <div class="{{$vehicle_data->power_locks==1?'attached-on':'attached-off'}}">Power Locks</div>
                    <div class="{{$vehicle_data->cd_player==1?'attached-on':'attached-off'}}">CD player</div>
                
                
                    <div class="{{$vehicle_data->dvd==1?'attached-on':'attached-off'}}">DVD</div>
                    <div class="{{$vehicle_data->mp3_interface==1?'attached-on':'attached-off'}}">MP3 interface</div>
                
                
                    <div class="{{$vehicle_data->ratio==1?'attached-on':'attached-off'}}">Radio</div>
                    <div class="{{$vehicle_data->sun_roof==1?'attached-on':'attached-off'}}">Sun Roof</div>
                
                
                    <div class="{{$vehicle_data->air_bag==1?'attached-on':'attached-off'}}">Air bag</div>
                    <div class="{{$vehicle_data->abs==1?'attached-on':'attached-off'}}">ABS</div>
                
                
                    <div class="{{$vehicle_data->s_power_locks==1?'attached-on':'attached-off'}}">Power Locks</div>
                    <div class="{{$vehicle_data->parking_sensors==1?'attached-on':'attached-off'}}">Parking sensors</div>
                
                
                    <div class="{{$vehicle_data->grill_guard==1?'attached-on':'attached-off'}}">Grill Guard</div>
                    <div class="{{$vehicle_data->back_camera==1?'attached-on':'attached-off'}}">Back Camera</div>
                
                
                    <div class="{{$vehicle_data->leather_seat==1?'attached-on':'attached-off'}}">Leather Seat</div>
                    <div class="{{$vehicle_data->power_seat==1?'attached-on':'attached-off'}}">Power Seat</div>
                
                
                    <div class="{{$vehicle_data->power_mirrors==1?'attached-on':'attached-off'}}">Power Mirrors</div>
                    <div class="{{$vehicle_data->power_window==1?'attached-on':'attached-off'}}">Power Window</div>
                
                
                    <div class="{{$vehicle_data->rear_spoiler==1?'attached-on':'attached-off'}}">Rear Spoiler</div>
                    <div class="{{$vehicle_data->alloy_wheels==1?'attached-on':'attached-off'}}">Alloy wheels</div>
                
                
                    <div class="{{$vehicle_data->bluetooth==1?'attached-on':'attached-off'}}">Bluetooth</div>
            </div>
        </div>
        <!-- mobile -->
        <div class="detail-sidebar mobile-sidebar">
            <!-- login register  -->
            @if($comments)
                <div class="login-register">
                    <div class="notice">
                        <h3>Notice</h3>
                    </div>
                    <div class="notice-content">
                        <p>
                            You have already made an inquiry about this vehicle.
                            Please click <a href="{{route('front.user.chatdetail', ['id' => $comments->vehicle_id])}}">here</a>.
                        </p>
                    </div>
                </div>
            @else
            <div class="login-register">
                <ul class="nav nav-pills nav-justified" role="tablist">
                    <li class="nav-item waves-effect waves-light inquiry-wrapper">
                        <a class="nav-link inquiry active " data-bs-toggle="tab" href="#inquiry" role="tab"> Guest Inquiry </a>
                    </li>
                    <!-- <li class="nav-item waves-effect waves-light login-wrapper">
                        <a class="nav-link login" data-bs-toggle="tab" href="#login" role="tab">LOG IN</a>
                    </li> -->
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="inquiry" role="tabpanel">
                        <form class="custom-validation inquForm" >
                            <div class="inquiry-form">
                                <!-- <div class="inquiry-title">
                                    <h3>Please fill the *required fields</h3>
                                </div> -->
                                <input type="hidden" name="vehicle_name" value="{{($vehicle_data->make_type)}} {{$vehicle_data->model_type}} {{$vehicle_data->body_type}}">
                                <input type="hidden" name="fob_price" class="inqu_fob_price" value="">
                                <input type="hidden" name="inspection" class="inqu_inspection" value="">
                                <input type="hidden" name="insurance" class="inqu_insurance" value="">
                                <input type="hidden" name="inqu_port" class="inqu_port" value="">
                                <input type="hidden" name="total_price" class="inqu_total_price" value="">
                                <input type="hidden" name="site_url" class="inqu_url" value="">
                                <input type="hidden" name="stock_no" class="stock_no" value=""> 
                                <input type="hidden" name="vehicle_id" class="vehicle_id" value="{{$vehicle_data->id}}">
                                <input type="hidden" name="user_id" class="user_id" value="{{isset(Auth::user()->id)?Auth::user()->id:''}}">
                                <div class="inquiry-contents">
                                    <div class="inquiry-list">
                                        <div class="inquiry-left">
                                            <label for="">Your Name*</label>
                                            <input class="form-control"  type="text" placeholder="Full Name" name="inqu_name" required > 
                                        </div>
                                        <div class="inquiry-right">
                                            <label for="">Select your country</label>
                                            <select class="form-select" name="inqu_country" required>
                                                @foreach($country as $row)
                                                    <option value="{{$row->id}}" {{ $current_country->country == $row->country ? "selected" : "" }}>{{$row->country}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="inquiry-list">
                                        <div class="inquiry-left">
                                            <label for="">Your Email*</label>
                                            <input class="form-control"  type="email" placeholder="Email address" name="inqu_email" required > 
                                        </div>
                                        <div class="inquiry-right">
                                            <label for="">Address*</label>
                                            <input class="form-control"  type="text" placeholder="Street, Town..." name="inqu_address" required > 
                                        </div>
                                    </div>
                                    <div class="inquiry-list">
                                        <div class="inquiry-left">
                                            <label for="">Mobile*</label>
                                            <input class="form-control"  type="text" placeholder="+81298683668" name="inqu_mobile" required > 
                                        </div>
                                        <div class="inquiry-right">
                                            <label for="">City*</label>
                                            <input class="form-control"  type="text" placeholder="Your City" name="inqu_city" required > 
                                        </div>
                                    </div>
                                    <div class="inquiry-list">
                                        <label for="">Your Message</label>
                                        <textarea  class="form-control" rows="3" placeholder="" ></textarea>
                                    </div>
                                    <div class="inquiry-list">
                                        <div class="inquiry-right">
                                            <button type="submit" class="btn btn-inquiry">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="login" role="tabpanel">
                        <form class="custom-validation" action="">
                            <div class="login-form">
                                <div class="login-list">
                                    <label for="">Email*</label>
                                    <input class="form-control"  type="email" placeholder="Email" name="login_email" required > 
                                </div>
                                <div class="login-list">
                                    <label for="">Password*</label>
                                    <input class="form-control"  type="password" placeholder="Email" name="login_pass" required > 
                                </div>
                                <div class="login-list">
                                    <button type="submit" class="btn btn-login">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div><!-- /end mobile -->
        <div class="detail-sidebar pc-sidebar">
            <!-- price calculator -->
            <div class="price-calculator">
                <div class="calc-title">
                    <h3>Price Calculator</h3>
                </div>
                <div class="clac-form">
                    <div class="calc-list">
                        <div class="calc-list-label">
                            <label for="">Select Country</label>
                        </div>
                        <div class="calc-list-value">
                            <select class="form-select select-country" name="">
                                @foreach($country as $row)
                                    <option value="{{$row->id}}" {{ $current_country->country == $row->country ? "selected" : "" }}>{{$row->country}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="calc-list">
                        <div class="calc-list-label">
                            <label for="">Select Port</label>
                        </div>
                        <div class="calc-list-value">
                            <select class="form-select port" name="">
                                @if($port_count)
                                    @foreach($port_list as $key=>$row)
                                        <option value='{{json_encode($row)}}'>{{$key}}</option>
                                    @endforeach
                                    <option value="0"></option>
                                @else
                                    <option value="0"></option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="calc-list">
                        <div class="calc-list-label">
                            <label for="">Inspection</label>
                        </div>
                        <div class="calc-list-value">
                            <a href="javascript:void(0)" class="btn btn-ins ins-margin insp-n" data-id="0">No</a>
                            <a href="javascript:void(0)" class="btn btn-ins insp-y" data-id="{{$rate->inspection}}">Yes</a>
                        </div>
                        <input type="hidden" class="insp-value" value="{{$inspection?$inspection:0}}">
                    </div>
                    <div class="calc-list">
                        <div class="calc-list-label">
                            <label for="">Insurance</label>
                        </div>
                        <div class="calc-list-value">
                            <a href="javascript:void(0)" class="btn btn-ins ins-margin insu-n" data-id="0">No</a>
                            <a href="javascript:void(0)" class="btn btn-ins insu-y" data-id="{{$rate->insurance}}">Yes</a>
                        </div>
                        <input type="hidden" class="insu-value" value="{{$insurance?$insurance:0}}">
                    </div>
                </div>
                <button type="submit" class="ins-submit" id="pc-calc"><i class="bx bx-calendar"></i> Calculate</button>
            </div>
            <!-- /price calculator -->
            <!-- login register  -->
            @if($comments)
                <div class="login-register">
                    <div class="notice">
                        <h3>Notice</h3>
                    </div>
                    <div class="notice-content">
                        <p>
                            You have already made an inquiry about this vehicle.
                            Please click <a href="{{route('front.user.chatdetail', ['id' => $comments->vehicle_id])}}">here</a>.
                        </p>
                    </div>
                </div>
            @else
            <div class="login-register">
                <ul class="nav nav-pills nav-justified" role="tablist">
                    <li class="nav-item waves-effect waves-light inquiry-wrapper">
                        <a class="nav-link inquiry active " data-bs-toggle="tab" href="#inquiry-pc" role="tab"> Guest Inquiry </a>
                    </li>
                    <!-- <li class="nav-item waves-effect waves-light login-wrapper">
                        <a class="nav-link login" data-bs-toggle="tab" href="#login-pc" role="tab">LOG IN</a>
                    </li> -->
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="inquiry-pc" role="tabpanel">
                        <form class="custom-validation inquForm"  method="post">
                            @csrf
                            <div class="inquiry-form">
                                <input type="hidden" name="vehicle_name" value="{{($vehicle_data->make_type)}} {{$vehicle_data->model_type}} {{$vehicle_data->body_type}}">
                                <input type="hidden" name="fob_price" class="inqu_fob_price" value="">
                                <input type="hidden" name="inspection" class="inqu_inspection" value="">
                                <input type="hidden" name="insurance" class="inqu_insurance" value="">
                                <input type="hidden" name="inqu_port" class="inqu_port" value="">
                                <input type="hidden" name="total_price" class="inqu_total_price" value="">
                                <input type="hidden" name="site_url" class="inqu_url" value="">
                                <input type="hidden" name="stock_no" class="stock_no" value="">
                                <input type="hidden" name="vehicle_id" class="vehicle_id" value="{{$vehicle_data->id}}">
                                <input type="hidden" name="user_id" class="user_id" value="{{isset(Auth::user()->id)?Auth::user()->id:''}}">
                                <div class="inquiry-contents">
                                    <div class="inquiry-list">
                                        <div class="inquiry-left">
                                            <label for="">Your Name*</label>
                                            <input class="form-control"  type="text" placeholder="Full Name" name="inqu_name" required > 
                                        </div>
                                        <div class="inquiry-right">
                                            <label for="">Select your country</label>
                                            <select class="form-select" name="inqu_country" required>
                                                @foreach($country as $row)
                                                    <option value="{{$row->country}}" {{ $current_country->country == $row->country ? "selected" : "" }}>{{$row->country}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="inquiry-list">
                                        <div class="inquiry-left">
                                            <label for="">Your Email*</label>
                                            <input class="form-control"  type="email" placeholder="Email address" name="inqu_email" required > 
                                        </div>
                                        <div class="inquiry-right">
                                            <label for="">Address*</label>
                                            <input class="form-control"  type="text" placeholder="Street, Town..." name="inqu_address" required > 
                                        </div>
                                    </div>
                                    <div class="inquiry-list">
                                        <div class="inquiry-left">
                                            <label for="">Mobile*</label>
                                            <input class="form-control" type="text" placeholder="+81298683668" name="inqu_mobile" required > 
                                        </div>
                                        <div class="inquiry-right">
                                            <label for="">City*</label>
                                            <input class="form-control"  type="text" placeholder="Your City" name="inqu_city" required > 
                                        </div>
                                    </div>
                                    <div class="inquiry-list">
                                        <label for="">Your Message</label>
                                        <textarea  class="form-control" rows="3" placeholder="" name="inqu_comment"></textarea>
                                    </div>
                                    <div class="inquiry-list">
                                        <div class="inquiry-right">
                                            <button type="submit" class="btn btn-inquiry">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="login-pc" role="tabpanel">
                        <form class="custom-validation" action="">
                            <div class="login-form">
                                <div class="login-list">
                                    <label for="">Email*</label>
                                    <input class="form-control"  type="email" placeholder="Email" name="login_email" required > 
                                </div>
                                <div class="login-list">
                                    <label for="">Password*</label>
                                    <input class="form-control"  type="password" placeholder="Email" name="login_pass" required > 
                                </div>
                                <div class="login-list">
                                    <button type="submit" class="btn btn-login">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        var select_port = "{{route('front.select_port')}}";
        var inq_url = "{{route('front.inquiry.email')}}";
        var light_url = "{{route('front.light_gallery')}}";
    </script>
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/slick/slick.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/lightgallery/lightgallery.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/lightgallery/lg-video.js') }}"></script>
    <script src="{{ URL::asset('/assets/frontend/pages/details/index.js')}}"></script>
@endsection