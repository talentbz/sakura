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
                        <option value="">Select</option>
                        @foreach($country as $row)
                            <option value="{{$row}}">{{$row}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="calculator-select">
                    <label for="">Select port</label>
                    <select class="form-select" name="">
                        <option value="">Select</option>
                    </select>
                </div>
                <div class="calculator-select">
                    <label for="">Do you need inspection?</label>
                    <select class="form-select" name="">
                        <option value="">Select</option>
                    </select>
                </div>
                <div class="calculator-select">
                    <label for="">Do you need insurance?</label>
                    <select class="form-select" name="">
                        <option value="">Select</option>
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
                <form action="" class="custom-search">
                    <div class="form-content">
                        <input type="text" class="form-control search-input" placeholder="Keywords"> 
                        <span class="bx bx-search-alt"></span>
                        <p class="req">*Ref No., Maker, Model, Model Code, Chassis, Grade</p>
                    </div>
                    <div class="select-search">
                        <div class="input-group mb-2">
                            <span class="input-group-text">Maker</span>
                            <select class="form-select select-category">
                                <option>Any</option>
                                @foreach($models as $model)
                                    <option value="{{$model['category_name']}}">{{$model['category_name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text">Model</span>
                            <select class="form-select subcategory">
                                <option>Any</option>
                                <option></option>
                            </select>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text">Year</span>
                            <div class="select-width">
                                <select class="form-select">
                                    <option>Any</option>
                                    @foreach($year as $row)
                                        <option value="{{$row}}">{{$row}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="select-width-last">
                                <select class="form-select">
                                    <option>Any</option>
                                    @foreach($year as $row)
                                        <option value="{{$row}}">{{$row}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="input-group mb-2">
                            <span class="input-group-text">Price</span>
                            <div class="select-width">
                                <select class="form-select">
                                    <option>Any</option>
                                    <option>$1,000</option>
                                    <option>$10,000</option>
                                </select>
                            </div>
                            <div class="select-width-last">
                                <select class="form-select">
                                    <option>Any</option>
                                    <option>$10,000</option>
                                    <option>$20,000</option>
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
                        <a href="#" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/s_bus.png')}}" alt="">
                            <p>Bus</p><span>(549)</span>
                        </a>
                        <a href="#" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/s_truck.png')}}" alt="">
                            <p>Truck</p><span>(2,016)</span>
                        </a>
                        <a href="#" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/s_van.png')}}" alt="">
                            <p>Van</p><span>(1,002)</span>
                        </a>
                        <a href="#" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/s_suv.png')}}" alt="">
                            <p>Sub</p><span>(102)</span>
                        </a>
                        <a href="#" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/s_sedan.png')}}" alt="">
                            <p>Sedan</p><span>(4,386)</span>
                        </a>
                        <a href="#" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/s_pickup.png')}}" alt="">
                            <p>Pick up</p><span>(549)</span>
                        </a>
                        <a href="#" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/s_machinery.png')}}" alt="">
                            <p>Machinery </p><span>(12)</span>
                        </a>
                        <a href="#">
                            <img src="{{URL::asset ('/assets/frontend/images/s_stractor.png')}}" alt="">
                            <p>Tractor</p><span>(50)</span>
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
                        <a href="#" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_toyota.png')}}" alt="">
                            <p>Toyoda</p><span>(549)</span>
                        </a>
                        <a href="#" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_nissan.png')}}" alt="">
                            <p>Nissan</p><span>(2,016)</span>
                        </a>
                        <a href="#" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_mitsubishi.png')}}" alt="">
                            <p>Mitsubishi</p><span>(1,002)</span>
                        </a>
                        <a href="#" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_honda.png')}}" alt="">
                            <p>Honda</p><span>(102)</span>
                        </a>
                        <a href="#" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_mazda.png')}}" alt="">
                            <p>Mazda</p><span>(4,386)</span>
                        </a>
                        <a href="#" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_subaru.png')}}" alt="">
                            <p>Subaru</p><span>(549)</span>
                        </a>
                        <a href="#" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_suzuki.png')}}" alt="">
                            <p>Suzuki</p><span>(12)</span>
                        </a>
                        <a href="#" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_isuzu.png')}}" alt="">
                            <p>Isuzu</p><span>(50)</span>
                        </a>
                        <a href="#" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_daihatsu.png')}}" alt="">
                            <p>Daihatsu</p><span>(50)</span>
                        </a>
                        <a href="#" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_hino.png')}}" alt="">
                            <p>Hino</p><span>(50)</span>
                        </a>
                        <a href="#" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_udtrucks.png')}}" alt="">
                            <p>Ud Trucks</p><span>(50)</span>
                        </a>
                        <a href="#" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_mercedes.png')}}" alt="">
                            <p>Mercedes benz</p><span>(50)</span>
                        </a>
                        <a href="#" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_bmw.png')}}" alt="">
                            <p>Bmw</p><span>(50)</span>
                        </a>
                        <a href="#" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_audi.png')}}" alt="">
                            <p>Audi</p><span>(50)</span>
                        </a>
                        <a href="#" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_chrysler.png')}}" alt="">
                            <p>Chrysler</p><span>(50)</span>
                        </a>
                        <a href="#">
                            <img src="{{URL::asset ('/assets/frontend/images/m_volkswagen.png')}}" alt="">
                            <p>Volkswagen</p><span>(50)</span>
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
                @foreach($vehicle_data as $row)
                <div class="contents-list">
                    <div class="stock-mobile-title">
                        <h5>{{$row->make_type}} {{$row->model_type}} {{$row->body_type}}</h5>
                    </div>
                    <div class="stock-image">
                        <img src="{{URL::asset ('/uploads/vehicle')}}{{'/'}}{{$row->vehicle_id}}{{'/thumb/'}}{{$row->image}}" alt="">
                    </div>
                    <div class="stock-contents">
                        <h5>{{$row->make_type}} {{$row->model_type}} {{$row->body_type}}</h5>
                        <table class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="table-light" scope="row">STOCK NO</td>
                                    <td>SM{{$row->stock_no}}</td>
                                    <td class="table-light">Year</td>
                                    <td>{{$row->registration}}</td>
                                    <td class="table-light">Model</td>
                                    <td>TD42</td>
                                </tr>       
                                <tr>
                                    <td class="table-light" scope="row">Transmission</td>
                                    <td>{{$row->transmission}}</td>
                                    <td class="table-light">ENGINE MODEL</td>
                                    <td>{{$row->engine_model}}</td>
                                    <td class="table-light">Body Type</td>
                                    <td>{{$row->body_type}}</td>
                                </tr>       
                                <tr>
                                    <td class="table-light">Engine CC</td>
                                    <td>{{$row->engine_size}}</td>
                                    <td class="table-light">Seating</td>
                                    <td>{{$row->seats}}</td>
                                    <td class="table-light">Chassis</td>
                                    <td>{{$row->chassis}}</td>
                                </tr>  
                                <tr>
                                    <td class="table-light">OPTIONS</td>
                                    <td colspan="5">
                                        {{$row->ac==1 ? 'A/C, ':''}}
                                        {{$row->power_steering==1 ? 'Power Steering, ':''}}
                                        {{$row->auto_door==1 ? 'Auto Door, ':''}}
                                        {{$row->remote_key==1 ? 'Remote Key, ':''}}
                                        {{$row->navigation==1 ? 'Navigation, ':''}}
                                        {{$row->power_locks==1 ? 'Power Locks, ':''}}
                                        {{$row->cd_player==1 ? 'CD player, ':''}}
                                        {{$row->dvd==1 ? 'DVD, ':''}}
                                        {{$row->mp3_interface==1 ? 'MP3 interface, ':''}}
                                    </td>
                                </tr>        
                            </tbody>
                        </table>
                    </div>
                    <div class="stock-mobile-contents">
                        <p class="stock-label">Stock No</p>
                        <p class="stock-value">SM{{$row->stock_no}}</p>
                        <p class="stock-label">Year</p>
                        <p class="stock-value">{{$row->registration}}</p>
                        <p class="stock-label">Model</p>
                        <p class="stock-value">TD42</p>
                        <p class="stock-label">Trans</p>
                        <p class="stock-value">{{$row->transmission}}</p>
                        <p class="stock-label">Trans</p>
                        <p class="stock-value">Manual</p>
                    </div>
                    <div class="stock-price-list">
                        <div class="fob-price">
                            <span class="fob-label">Price (FOB)</span>
                            @if($row->sale_price==null)
                                <span class="fob-value">${{number_format(round($row->price/$rate))}}</span>
                            @else
                                <span class="fob-value">${{number_format(round($row->sale_price/$rate))}}</span>
                            @endif
                        </div>
                        <div class="price-border-bottom"></div>
                        <div class="total-price">
                            <span class="total-label">Total Price</span>
                            <span class="totla-value">$10,500</span>
                        </div>
                        <div class="price-border-bottom"></div>
                        <div class="country-port">
                            <p class="cif">(CIF Inspect)</p>
                            <p class="port">Durban</p>
                        </div>
                        <div class="detail-inquire">
                            <a href="{{route('front.details', ['id' => $row->vehicle_id])}}" class="btn-detail">Details</a>
                            <a href="{{route('front.details', ['id' => $row->vehicle_id])}}" class="btn-inquire">Inquire</a>
                        </div>
                    </div>
                    <div class="contents-border-right"></div>
                </div>
                @endforeach
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
    </script>
    <script src="{{ URL::asset('/assets/frontend/pages/stock/index.js')}}"></script>
@endsection