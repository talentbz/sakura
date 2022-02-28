@extends('front.layouts.index')
@section('title') Stock @endsection
@section('css')
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
        <form action="">
            <div class="calculator-filter mt-3">
                <div class="calculator-select">
                    <label for="">Select your country</label>
                    <select class="form-select" name="">
                        @foreach($country as $row)
                            <option value="{{$row->id}}" {{ $current_country->country == $row->country ? "selected" : "" }}>{{$row->country}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="calculator-select">
                    <label for="">Select port</label>
                    <select class="form-select port" name="">
                        @if($port_count)
                            @for($i=0; $i<$port_count; $i++)
                                <option value="{{$port_price[$i]}}">{{$port_key[$i]}}</option>
                            @endfor
                            <option value="0"></option>
                        @else
                            <option value="0"></option>
                        @endif
                    </select>
                </div>
                <div class="calculator-select">
                    <label for="">Do you need inspection?</label>
                    <select class="form-select" name="inspection">
                        <option value="y" >Yes</option>
                        <option value="n" >No</option>
                    </select>
                </div>
                <div class="calculator-select">
                    <label for="">Do you need insurance?</label>
                    <select class="form-select" name="insurance">
                        <option value="y" >Yes</option>
                        <option value="n" >No</option>
                    </select>
                </div>
                <div class="calculator-select">
                    <button type="submit" class="btn btn-primary"><i class="bx bx-calendar"></i> Calculator</button>
                </div>
            </div>
        </form>
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
                        <span class="bx bx-search-alt"></span>
                        <p class="req">*Ref No., Maker, Model, Model Code, Chassis, Grade</p>
                    </div>
                    <div class="select-search">
                        <div class="input-group mb-2">
                            <span class="input-group-text">Maker</span>
                            <select class="form-select select-category" name="maker">
                                <option value="">Any</option>
                                @if(!is_null($maker))
                                    @foreach($models as $model)
                                        <option value="{{$model['category_name']}}" {{ $maker == $model['category_name'] ? "selected" : "" }}>{{$model['category_name']}}</option>
                                    @endforeach
                                @else
                                    @foreach($models as $model)
                                        <option value="{{$model['category_name']}}">{{$model['category_name']}}</option>
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

                        <div class="input-group mb-2">
                            <span class="input-group-text">Price</span>
                            <div class="select-width">
                                <select class="form-select" name="from_price">
                                    <option value="">Any</option>
                                    @if(!is_null($from_price))
                                        @foreach($price as $row)
                                            <option value="{{$row}}" {{ $from_price == $row ? "selected" : "" }}>{{$row}}</option>
                                        @endforeach
                                    @else
                                        @foreach($price as $row)
                                            <option value="{{$row}}">{{$row}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="select-width-last">
                                <select class="form-select" name="to_price">
                                    <option value="">Any</option>
                                    @if(!is_null($to_price))
                                        @foreach($price as $row)
                                            <option value="{{$row}}" {{ $to_price == $row ? "selected" : "" }}>{{$row}}</option>
                                        @endforeach
                                    @else
                                        @foreach($price as $row)
                                            <option value="{{$row}}">{{$row}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="advance-search mb-2">
                            <a data-bs-toggle="modal" href="javascript:void(0)" data-bs-target=".advanced-seach-modal">
                                Advance Search
                                <i class="fas fa-angle-double-right"></i>    
                            </a>
                        </div>
                    </div>
                    <button type="submit" class="search-submit">Search <i class="fas fa-search"></i></button>
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
                    <a href="{{route('front.stock')}}{{'/?body_type=bus'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/s_bus.png')}}" alt="">
                            <p>Bus</p><span>({{$body_bus && $body_bus->body_count ? $body_bus->body_count : 0}})</span>
                        </a>
                        <a href="{{route('front.stock')}}{{'/?body_type=truck'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/s_truck.png')}}" alt="">
                            <p>Truck</p><span>({{$body_truck && $body_truck->body_count ? $body_truck->body_count : 0}})</span>
                        </a>
                        <a href="{{route('front.stock')}}{{'/?body_type=van'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/s_van.png')}}" alt="">
                            <p>Van</p><span>({{$body_van && $body_van->body_count ? $body_van->body_count : 0}})</span>
                        </a>
                        <a href="{{route('front.stock')}}{{'/?body_type=sub'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/s_suv.png')}}" alt="">
                            <p>Sub</p><span>({{$body_sub && $body_sub->body_count ? $body_sub->body_count : 0}})</span>
                        </a>
                        <a href="{{route('front.stock')}}{{'/?body_type=sedan'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/s_sedan.png')}}" alt="">
                            <p>Sedan</p><span>({{$body_sedan && $body_sedan->body_count ? $body_sedan->body_count : 0}})</span>
                        </a>
                        <a href="{{route('front.stock')}}{{'/?body_type=pick up'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/s_pickup.png')}}" alt="">
                            <p>Pick up</p><span>({{$body_pick_up && $body_pick_up->body_count ? $body_pick_up->body_count : 0}})</span>
                        </a>
                        <a href="{{route('front.stock')}}{{'/?body_type=Machinery'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/s_machinery.png')}}" alt="">
                            <p>Machinery </p><span>({{$body_machinery && $body_machinery->body_count ? $body_machinery->body_count : 0}})</span>
                        </a>
                        <a href="{{route('front.stock')}}{{'/?body_type=Tractor'}}">
                            <img src="{{URL::asset ('/assets/frontend/images/s_stractor.png')}}" alt="">
                            <p>Tractor</p><span>({{$body_tractor && $body_tractor->body_count ? $body_tractor->body_count : 0}})</span>
                        </a>
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
                        <a href="{{route('front.stock')}}{{'/?make_type=Toyota'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_toyota.png')}}" alt="">
                            <p>Toyota</p><span>({{$make_toyoda && $make_toyoda->make_count ? $make_toyoda->make_count : 0}})</span>
                        </a>
                        <a href="{{route('front.stock')}}{{'/?make_type=nissan'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_nissan.png')}}" alt="">
                            <p>Nissan</p><span>({{$make_nissan && $make_nissan->make_count ? $make_nissan->make_count : 0}})</span>
                        </a>
                        <a href="{{route('front.stock')}}{{'/?make_type=mitsubishi'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_mitsubishi.png')}}" alt="">
                            <p>Mitsubishi</p><span>({{$make_mitsubishi && $make_mitsubishi->make_count ? $make_mitsubishi->make_count : 0}})</span>
                        </a>
                        <a href="{{route('front.stock')}}{{'/?make_type=honda'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_honda.png')}}" alt="">
                            <p>Honda</p><span>({{$make_honda && $make_honda->make_count ? $make_honda->make_count : 0}})</span>
                        </a>
                        <a href="{{route('front.stock')}}{{'/?make_type=mazda'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_mazda.png')}}" alt="">
                            <p>Mazda</p><span>({{$make_mazda && $make_mazda->make_count ? $make_mazda->make_count : 0}})</span>
                        </a>
                        <a href="{{route('front.stock')}}{{'/?make_type=subaru'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_subaru.png')}}" alt="">
                            <p>Subaru</p><span>({{$make_subaru && $make_subaru->make_count ? $make_subaru->make_count : 0}})</span>
                        </a>
                        <a href="{{route('front.stock')}}{{'/?make_type=suzuki'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_suzuki.png')}}" alt="">
                            <p>Suzuki</p><span>({{$make_suzuki && $make_suzuki->make_count ? $make_suzuki->make_count : 0}})</span>
                        </a>
                        <a href="{{route('front.stock')}}{{'/?make_type=isuzu'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_isuzu.png')}}" alt="">
                            <p>Isuzu</p><span>({{$make_isuzu && $make_isuzu->make_count ? $make_isuzu->make_count : 0}})</span>
                        </a>
                        <a href="{{route('front.stock')}}{{'/?make_type=daihatsu'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_daihatsu.png')}}" alt="">
                            <p>Daihatsu</p><span>({{$make_daihatsu && $make_daihatsu->make_count ? $make_daihatsu->make_count : 0}})</span>
                        </a>
                        <a href="{{route('front.stock')}}{{'/?make_type=hino'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_hino.png')}}" alt="">
                            <p>Hino</p><span>({{$make_hino && $make_hino->make_count ? $make_hino->make_count : 0}})</span>
                        </a>
                        <a href="{{route('front.stock')}}{{'/?make_type=ud trucks'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_udtrucks.png')}}" alt="">
                            <p>Ud Trucks</p><span>({{$make_udTrucks && $make_udTrucks->make_count ? $make_udTrucks->make_count : 0}})</span>
                        </a>
                        <a href="{{route('front.stock')}}{{'/?make_type=Mercedes benz'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_mercedes.png')}}" alt="">
                            <p>Mercedes benz</p><span>({{$make_mercedesBenz && $make_mercedesBenz->make_count ? $make_mercedesBenz->make_count : 0}})</span>
                        </a>
                        <a href="{{route('front.stock')}}{{'/?make_type=Bmw'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_bmw.png')}}" alt="">
                            <p>Bmw</p><span>({{$make_bmw && $make_bmw->make_count ? $make_bmw->make_count : 0}})</span>
                        </a>
                        <a href="{{route('front.stock')}}{{'/?make_type=Audi'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_audi.png')}}" alt="">
                            <p>Audi</p><span>({{$make_audi && $make_audi->make_count ? $make_audi->make_count : 0}})</span>
                        </a>
                        <a href="{{route('front.stock')}}{{'/?make_type=Chrysler'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_chrysler.png')}}" alt="">
                            <p>Chrysler</p><span>({{$make_chrysler && $make_chrysler->make_count ? $make_chrysler->make_count : 0}})</span>
                        </a>
                        <a href="{{route('front.stock')}}{{'/?make_type=Volkswagen'}}">
                            <img src="{{URL::asset ('/assets/frontend/images/m_volkswagen.png')}}" alt="">
                            <p>Volkswagen</p><span>({{$make_volkswagen && $make_volkswagen->make_count ? $make_volkswagen->make_count : 0}})</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /search maker -->
        </div>
        <!-- /end left sidebar -->

        <!-- mobile calc section -->
        <form action="">
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
                                @foreach($country as $row)
                                    <option value="{{$row}}">{{$row}}</option>
                                @endforeach
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
                    <div class="calc-submit">
                        <button type="submit" class="btn ins-submit"><i class="bx bx-calendar"></i> Calculate</button>
                    </div>
                </div>
            </div>
        </form> <!-- mobile calc section -->
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
                            <option value="">Select</option>
                            <option value="">New Arriavals</option>
                        </select>
                    </div>
                </div>
                <div class="title-border"></div>
                <div id="stock-contents">
                    {{ csrf_field() }}
                    <div id="stock-list"></div>
                </div>
            </div>
            <!-- /end new arrivals -->

        </div>
        <!-- /end main contents -->
    </div>
</div>
@endsection
<!-- modal section -->
@include('front.layouts.searchModal')

@section('script')
    <script>
        var models = @json($models);
        var sock_page = "{{route('front.stock')}}";
        var search_keyword = "{{$search_keyword}}";
        var maker = "{{$maker}}";
        var model_name = "{{$model_name}}";
        var from_year = "{{$from_year}}";
        var to_year = "{{$to_year}}";
        var from_price = "{{$from_price}}";
        var to_price = "{{$to_price}}";
    </script>
    <script src="{{ URL::asset('/assets/frontend/pages/stock/index.js')}}"></script>
@endsection