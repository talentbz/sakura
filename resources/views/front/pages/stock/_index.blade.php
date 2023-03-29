@extends('front.layouts.index')
@section('title') Stock @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/lightgallery/lightgallery.min.css') }}">
    <link href="{{ URL::asset('/assets/frontend/pages/stock/style.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<!-- banner && menu section -->
<div class="hero">
    <div class="hero-wrapper">
        @include('front.layouts.menu')
        <div class="banner-desc">
            <h1>Price Calculator</h1>
        </div>
        <div class="">
            <div class="calculator-filter mt-3">
                <div class="calculator-select">
                    <label for="">Select country</label>
                    <select class="form-select" name="price_country" id="select-country">
                        @foreach($country as $row)
                        {{$price_country}}
                            @if($price_country)
                                <option value="{{$row->id}}" {{ $price_country == $row->id ? "selected" : "" }}>{{$row->country}}</option>
                            @else
                                <option value="{{$row->id}}" {{ $current_country->country == $row->country ? "selected" : "" }}>{{$row->country}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="calculator-select">
                    <label for="">Select port</label>
                    <select class="form-select port-pc" name="price_port" id="price-port">
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
                <div class="calculator-select">
                    <label for="">Inspection</label>
                    <select class="form-select inspection" name="inspection" >
                        <option value="0" >No</option>
                        <option value="{{$rate_ins->inspection}}" >Yes</option>
                    </select>
                </div>
                <div class="calculator-select">
                    <label for="">Insurance</label>
                    <select class="form-select insurance" name="insurance">
                        <option value="0" >No</option>
                        <option value="{{$rate_ins->insurance}}" >Yes</option>
                    </select>
                </div>
                <div class="calculator-select">
                    <button type="submit" class="btn btn-primary" id="price-calc"><i class="bx bx-calendar"></i> Calculator</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /end banner && menu -->

<!-- contents -->
<div class="contents">
    <div class="contents-wrapper">
        <!-- left sidebar -->
        <div class="left-sidebar">
            <!-- search car -->
            <div class="search-car">
                <div class="search-title search-car-title">
                    <h3>Search Japanese Car</h3>
                </div>
                <form action="{{route('front.stock')}}" method="get" class="custom-search">
                    <div class="form-content">
                        <input type="text" class="form-control search-input" placeholder="Keywords" name="search_keyword" value="{{$search_keyword}}"> 
                         <span> <button type="submit" class="btn search-submit-key"><i class="fas fa-search"></i></button></span>
                        <p class="req">*Stock No.,Body Type, Chassis</p>
                    </div>
                    <div class="select-search">
                        <div class="input-group mb-2">
                            <span class="input-group-text">Make</span>
                            <select class="form-select select-category" name="maker">
                                <option value="">Any</option>
                                @if(!is_null($maker))
                                    @foreach($models as $model)
                                        <option value="{{$model['category_name']}}" {{ $maker == $model['category_name'] ? "selected" : "" }}>{{Str::upper($model['category_name'])}}</option>
                                    @endforeach
                                @else
                                    @foreach($models as $model)
                                        <option value="{{$model['category_name']}}">{{Str::upper($model['category_name'])}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text">Model</span>
                            <select class="form-select subcategory" name="model_name">
                                <option value="">Any</option>
                                @if(!is_null($model_name))
                                    <option value="{{$model_name}}" selected>{{$model_name}}</option>
                                @else
                                    <option></option>
                                @endif
                            </select>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text">Gear</span>
                            <select class="form-select" name="gear">
                                <option value="">Any</option>
                                @foreach($transmission as $row)
                                    <option value="{{$row}}" {{ $gear == $row ? "selected" : ""}}>{{$row}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text">Year</span>
                            <div class="select-width">
                                <select class="form-select" name="from_year">
                                    <option value="">Any</option>
                                    @if(!is_null($from_year))
                                        @foreach($year as $row)
                                            <option value="{{$row}}" {{ $from_year == $row ? "selected" : "" }}>{{$row}}</option>
                                        @endforeach
                                    @else
                                        @foreach($year as $row)
                                            <option value="{{$row}}">{{$row}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="select-width-last">
                                <select class="form-select" name="to_year">
                                    <option value="">Any</option>
                                    @if(!is_null($to_year))
                                        @foreach($year as $row)
                                            <option value="{{$row}}" {{ $to_year == $row ? "selected" : "" }}>{{$row}}</option>
                                        @endforeach
                                    @else
                                        @foreach($year as $row)
                                            <option value="{{$row}}">{{$row}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn search-submit">Search <i class="fas fa-search"></i></button>
                </form>
            </div>
            <!-- /end search car -->

            <!-- search type -->
            <div class="search-type">
                <div class="search-title">
                    <h3>Search by Type</h3>
                </div>
                <div class="search-type-contents">
                    <div class="search-category">
                        @foreach ($vehicle_type as $row)
                            <a href="{{route('front.stock')}}{{'/?body_type='}}{{$row->vehicle_type}}" class="mb-1">
                                <img src="{{URL::asset ('/assets/frontend/images')}}{{'/'}}{{$row->image}}" alt="">
                                <p>{{$row->vehicle_type}}</p><span>({{$row->cnt}})</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- /end search type -->

            <!-- search Maker -->
            <div class="search-maker">
                <div class="search-title">
                    <h3>Search by Maker</h3>
                </div>
                <div class="search-maker-contents">
                    <div class="search-category">
                        @foreach ($make_type as $row)
                            <a href="{{route('front.stock')}}{{'/?make_type='}}{{$row->maker_type}}" class="mb-1">
                                <img src="{{URL::asset ('/assets/frontend/images')}}{{'/'}}{{$row->image}}" alt="">
                                <p>{{$row->maker_type}}</p><span>({{$row->cnt}})</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- /search maker -->
        </div>
        <!-- /end left sidebar -->

        <!-- mobile calc section -->
        <div class="">
            <div class="calc-mobile">
                <div class="calc-title">
                    <h3>Price Calculator</h3>
                </div>
                <div class="calc-form">
                    <div class="calc-list">
                        <div class="calc-list-label">
                            <label for="">Select Country</label>
                        </div>
                        <div class="calc-list-value">
                            <select class="form-select" id="select-country-mobile" name="">
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
                            <select class="form-select port" name="" id="price-port-mobile">
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
                            <label for="">Inspention</label>
                        </div>
                        <div class="calc-list-value">
                            <a class="btn btn-ins ins-margin insp-n" data-id="0">No</a>
                            <a class="btn btn-ins insp-y" data-id="{{$rate_ins->inspection}}">Yes</a>
                        </div>
                        <input type="hidden" class="insp-value" value="0">
                    </div>
                    <div class="calc-list">
                        <div class="calc-list-label">
                            <label for="">Insurance</label>
                        </div>
                        <div class="calc-list-value">
                            <a  class="btn btn-ins ins-margin insu-n" data-id="0">No</a>
                            <a  class="btn btn-ins insu-y" data-id="{{$rate_ins->insurance}}">Yes</a>
                        </div>
                        <input type="hidden" class="insu-value" value="0">
                    </div>
                    <div class="calc-submit">
                        <button type="submit" class="btn ins-submit" id="mobile-cal-btn"><i class="bx bx-calendar"></i> Calculate</button>
                    </div>
                </div>
            </div>
        </div> <!-- mobile calc section -->
        <!-- main contents -->
        <div class="main-stock">
            <!-- new arrivals -->
            <div class="main-contents-title">
                <h1>List All Vehicles</h1>
                <div class="stock-sort row">
                    <div class="col-md-4">
                        <label class="col-form-label">Sort By:</label>
                    </div>
                    <div class="col-md-8">
                        <select class="form-select sort-by">
                            <option value="new_arriaval">New Arriavals</option>
                            <option value="price_to_low">Price Low to High</option>
                            <option value="price_to_high">Price High to Low</option>
                            <option value="year_to_new">Year New to Old</option>
                            <option value="year_to_old">Year Old to New</option>
                        </select>
                    </div>
                </div>
                <div class="title-border"></div>
                <div id="stock-contents">
                    {{ csrf_field() }}
                    <div id="stock-list">
                        <!-- <div class="stock-spinner">
                            <div class="spinner-border text-danger m-1" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div> -->
                        
                    </div>
                </div>
            </div>
            <!-- /end new arrivals -->

        </div>
        <!-- /end main contents -->
    </div>
</div>
@endsection

@section('script')
    <script>
        var models = @json($models);
        var sock_page = "{{route('front.stock')}}";
        var select_port = "{{route('front.select_port')}}";
        var search_keyword = "{{$search_keyword}}";
        var maker = "{{$maker}}";
        var model_name = "{{$model_name}}";
        var from_year = "{{$from_year}}";
        var to_year = "{{$to_year}}";
        var from_price = "{{$from_price}}";
        var to_price = "{{$to_price}}";
        var light_url = "{{route('front.light_gallery')}}";
        // var price_country = "{{$price_country}}";
        // var price_port = "{{$price_port}}";
        // var inspection = "{{$inspection}}";
        // var insurance = "{{$insurance}}";
    </script>
    <script src="{{ URL::asset('/assets/libs/lightgallery/lightgallery.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/lightgallery/lg-video.js') }}"></script>
    <script src="{{ URL::asset('/assets/frontend/pages/stock/index.js')}}"></script>
@endsection