@extends('front.layouts.index')
@section('title') Details @endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/slick/slick-theme.css') }}">
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
                            <select class="form-select" name="">
                                <option value="">Select</option>
                                @foreach($country as $row)
                                    <option value="{{$row}}">{{$row}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="calc-list">
                        <div class="calc-list-label">
                            <label for="">Select Port</label>
                        </div>
                        <div class="calc-list-value">
                            <select class="form-select" name="">
                                <option value="">Select</option>
                            </select>
                        </div>
                    </div>
                    <div class="calc-list">
                        <div class="calc-list-label">
                            <label for="">Inspention</label>
                        </div>
                        <div class="calc-list-value">
                            <a href="#" class="btn btn-ins ins-margin">No</a>
                            <a href="#" class="btn btn-ins">Yes</a>
                        </div>
                        <input type="hidden" name="menuip">
                    </div>
                    <div class="calc-list">
                        <div class="calc-list-label">
                            <label for="">Insurance</label>
                        </div>
                        <div class="calc-list-value">
                            <a href="#" class="btn btn-ins ins-margin">No</a>
                            <a href="#" class="btn btn-ins">Yes</a>
                        </div>
                        <input type="hidden" name="menuip">
                    </div>
                </div>
                <button type="submit" class="ins-submit"><i class="bx bx-calendar"></i> Calculate</button>
            </div>
            <!-- /price calculator -->
            <!-- login register  -->
            <div class="login-register">
                <ul class="nav nav-pills nav-justified" role="tablist">
                    <li class="nav-item waves-effect waves-light inquiry-wrapper">
                        <a class="nav-link inquiry active " data-bs-toggle="tab" href="#inquiry" role="tab"> Guest Inquiry </a>
                    </li>
                    <li class="nav-item waves-effect waves-light login-wrapper">
                        <a class="nav-link login" data-bs-toggle="tab" href="#login" role="tab">LOG IN</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="inquiry" role="tabpanel">
                        <form action="">
                            <div class="inquiry-form">
                                <!-- <div class="inquiry-title">
                                    <h3>Please fill the *required fields</h3>
                                </div> -->
                                <div class="inquiry-contents">
                                    <div class="inquiry-list">
                                        <div class="inquiry-left">
                                            <label for="">Your Name*</label>
                                            <input class="form-control"  type="text" placeholder="Full Name" name="inqu_name" required > 
                                        </div>
                                        <div class="inquiry-right">
                                            <label for="">Select your country</label>
                                            <select class="form-select" name="inq_country" required>
                                                <option value="">Select</option>
                                                @foreach($country as $row)
                                                    <option value="{{$row}}">{{$row}}</option>
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
                                            <input class="form-control"  type="text" placeholder="Mobile Number" name="inqu_mobile" required > 
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
                        <form action="">
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
        </div>
        <div class="main-products">
            <div class="vehicle-info">
                <div class="vehicle-name">
                    <h3>NISSAN CIVILIAN BUS</h3>
                    <div class="vehicle-chas">
                        <span>CHASSIS</span>
                        <p>BHW41-020113</p>
                    </div>
                    <div class="vehicle-name-border"></div>
                </div>
                <div class="vehicle-price">
                    <div class="price-info">
                        <div class="fob-price">
                            <h3 class="fob-label">Price (Fob)</h3>
                            <h3 class="fob-value">$6,250</h3>
                        </div>
                        <div class="total-price">
                            <h5 class="total-price-label">Total Price</h5>
                            <h5 class="total-price-value">(C&F), ASK</h5>
                        </div>
                    </div>
                    <div class="cif">
                        <p>(C&F Inspect), Dar es Salaam</p>
                    </div>
                </div>
            </div>
            <div class="slick-wrapper">
                <div class="product">
                    <div class="product-images">
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
                            <td>SM1716</td>
                            <td class="table-light">Year</td>
                            <td>2002/12</td>
                            <td class="table-light">Model</td>
                            <td>TD42</td>
                        </tr>       
                        <tr>
                            <td class="table-light" scope="row">Transmission</td>
                            <td>Manual</td>
                            <td class="table-light">ENGINE MODEL</td>
                            <td>1HZ</td>
                            <td class="table-light">ENGINE Type</td>
                            <td>Bus</td>
                        </tr>       
                        <tr>
                            <td class="table-light">Engine CC</td>
                            <td>4200</td>
                            <td class="table-light">Seating</td>
                            <td>29</td>
                            <td class="table-light">Chassis</td>
                            <td>HZB50-0007403</td>
                        </tr>        
                        <tr>
                            <td class="table-light">Drive Type</td>
                            <td>2 Wheel</td>
                            <td class="table-light">Mileage</td>
                            <td>30,000 (km)</td>
                            <td class="table-light">Make</td>
                            <td>Nissan</td>
                        </tr>  
                        <tr>
                            <td class="table-light">Width(Cm)</td>
                            <td>210</td>
                            <td class="table-light">Height(cm)</td>
                            <td>290</td>
                            <td class="table-light">Length(cm)</td>
                            <td>700</td>
                        </tr>  
                        <tr>
                            <td class="table-light">Steering</td>
                            <td>Right</td>
                            <td class="table-light">Doors</td>
                            <td>N/A</td>
                            <td class="table-light">Fuel Type</td>
                            <td>Diesel</td>
                        </tr> 
                        <tr>
                            <td class="table-light">Steering</td>
                            <td>Right</td>
                            <td class="table-light">Doors</td>
                            <td>N/A</td>
                            <td class="table-light">Fuel Type</td>
                            <td>Diesel</td>
                        </tr> 
                    </tbody>
                    <tbody class="mobile-table">
                        <tr>
                            <td class="table-light" scope="row">STOCK NO</td>
                            <td>SM1716</td>
                            <td class="table-light">Year</td>
                            <td>2002/12</td>
                        </tr>       
                        <tr>
                            <td class="table-light">Model</td>
                            <td>TD42</td>
                            <td class="table-light" scope="row">Transmission</td>
                            <td>Manual</td>
                        </tr>
                        <tr>
                            <td class="table-light">ENGINE MODEL</td>
                            <td>1HZ</td>
                            <td class="table-light">ENGINE Type</td>
                            <td>Bus</td>
                        </tr>     
                        <tr>
                            <td class="table-light">Engine CC</td>
                            <td>4200</td>
                            <td class="table-light">Drive Type</td>
                            <td>2 Wheel</td>
                        </tr>  
                        <tr>
                            <td class="table-light">Seating</td>
                            <td>29</td>
                            <td class="table-light">Chassis</td>
                            <td>HZB50-0007403</td>
                        </tr>        
                        <tr>
                            <td class="table-light">Mileage</td>
                            <td>30,000 (km)</td>
                            <td class="table-light">Make</td>
                            <td>Nissan</td>
                        </tr>  
                        <tr>
                            <td class="table-light">Width(Cm)</td>
                            <td>210</td>
                            <td class="table-light">Steering</td>
                            <td>Right</td>
                        </tr>
                        <tr>
                            <td class="table-light">Height(cm)</td>
                            <td>290</td>
                            <td class="table-light">Length(cm)</td>
                            <td>700</td>
                        </tr>  
                        <tr>
                            <td class="table-light">Doors</td>
                            <td>N/A</td>
                            <td class="table-light">Fuel Type</td>
                            <td>Diesel</td>
                        </tr> 
                        <tr>
                            <td class="table-light">Doors</td>
                            <td>N/A</td>
                            <td class="table-light">Fuel Type</td>
                            <td>Diesel</td>
                        </tr>
                        <tr>
                            <td class="table-light">Steering</td>
                            <td>Right</td>
                            <td class="table-light">Steering</td>
                            <td>Right</td>
                        </tr> 
                    </tbody>
                </table>
            </div>
        </div>
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
                            <select class="form-select" name="">
                                <option value="">Select</option>
                                @foreach($country as $row)
                                    <option value="{{$row}}">{{$row}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="calc-list">
                        <div class="calc-list-label">
                            <label for="">Select Port</label>
                        </div>
                        <div class="calc-list-value">
                            <select class="form-select" name="">
                                <option value="">Select</option>
                            </select>
                        </div>
                    </div>
                    <div class="calc-list">
                        <div class="calc-list-label">
                            <label for="">Inspention</label>
                        </div>
                        <div class="calc-list-value">
                            <a href="#" class="btn btn-ins ins-margin">No</a>
                            <a href="#" class="btn btn-ins">Yes</a>
                        </div>
                        <input type="hidden" name="menuip">
                    </div>
                    <div class="calc-list">
                        <div class="calc-list-label">
                            <label for="">Insurance</label>
                        </div>
                        <div class="calc-list-value">
                            <a href="#" class="btn btn-ins ins-margin">No</a>
                            <a href="#" class="btn btn-ins">Yes</a>
                        </div>
                        <input type="hidden" name="menuip">
                    </div>
                </div>
                <button type="submit" class="ins-submit"><i class="bx bx-calendar"></i> Calculate</button>
            </div>
            <!-- /price calculator -->
            <!-- login register  -->
            <div class="login-register">
                <ul class="nav nav-pills nav-justified" role="tablist">
                    <li class="nav-item waves-effect waves-light inquiry-wrapper">
                        <a class="nav-link inquiry active " data-bs-toggle="tab" href="#inquiry" role="tab"> Guest Inquiry </a>
                    </li>
                    <li class="nav-item waves-effect waves-light login-wrapper">
                        <a class="nav-link login" data-bs-toggle="tab" href="#login" role="tab">LOG IN</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="inquiry" role="tabpanel">
                        <form action="">
                            <div class="inquiry-form">
                                <!-- <div class="inquiry-title">
                                    <h3>Please fill the *required fields</h3>
                                </div> -->
                                <div class="inquiry-contents">
                                    <div class="inquiry-list">
                                        <div class="inquiry-left">
                                            <label for="">Your Name*</label>
                                            <input class="form-control"  type="text" placeholder="Full Name" name="inqu_name" required > 
                                        </div>
                                        <div class="inquiry-right">
                                            <label for="">Select your country</label>
                                            <select class="form-select" name="inq_country" required>
                                                <option value="">Select</option>
                                                @foreach($country as $row)
                                                    <option value="{{$row}}">{{$row}}</option>
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
                                            <input class="form-control"  type="text" placeholder="Mobile Number" name="inqu_mobile" required > 
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
                        <form action="">
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
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
    </script>
    <script src="{{ URL::asset('/assets/libs/slick/slick.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/frontend/pages/details/index.js')}}"></script>
@endsection