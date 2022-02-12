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
                <form action="" class="custom-search">
                    <div class="form-content">
                        <input type="text" class="form-control search-input" placeholder="Keywords"> 
                        <span class="bx bx-search-alt"></span>
                        <p class="req">*Ref No., Maker, Model, Model Code, Chassis, Grade</p>
                    </div>
                    <div class="select-search">
                        <div class="input-group mb-2">
                            <span class="input-group-text">Maker</span>
                            <select class="form-select">
                                <option>Any</option>
                                <option>Large select</option>
                                <option>Small select</option>
                            </select>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text">Model</span>
                            <select class="form-select">
                                <option>Any</option>
                                <option>Large select</option>
                                <option>Small select</option>
                            </select>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text">Year</span>
                            <div class="select-width">
                                <select class="form-select">
                                    <option>Any</option>
                                    <option>1991</option>
                                    <option>1992</option>
                                </select>
                            </div>
                            <div class="select-width-last">
                                <select class="form-select">
                                    <option>Any</option>
                                    <option>1991</option>
                                    <option>1992</option>
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

        <!-- main contents -->
        <div class="main-contents">
            <!-- new arrivals -->
            <div class="main-contents-title">
                <h1>New Arriavals</h1>
                <a href="#" class="btn btn-light waves-effect">See all</a>
                <div class="title-border"></div>
            </div>
            <div class="contents-list mb-5">
                <div class="car-list">
                    <a href="#" class="car-image">
                        <img src="{{URL::asset ('/assets/frontend/images/car_1.png')}}" alt="">
                        <div class="media-count">
                            <div class="image-count">
                                <i class="fas fa-camera"></i>
                                <span>13</span>
                            </div>
                            <div class="image-count">
                                <i class="fas fa-video"></i>
                                <span>1</span>
                            </div>
                        </div>
                        <div class="reserved-mark">Reserved</div>
                    </a>
                    <div class="car-desc">
                        <a href="#">
                            <h3>MITSUBISHI ROSA BUS</h3>
                        </a>
                        <h3>FOB: $8,036</h3>
                    </div>
                </div>
                <div class="car-list">
                    <a href="#">
                        <img src="{{URL::asset ('/assets/frontend/images/car_2.png')}}" alt="">
                    </a>
                    <div class="car-desc">
                        <a href="#">
                            <h3>MITSUBISHI ROSA BUS</h3>
                        </a>
                        <h3>FOB: $8,036</h3>
                    </div>
                </div>
                <div class="car-list">
                    <a href="#">
                        <img src="{{URL::asset ('/assets/frontend/images/car_3.png')}}" alt="">
                    </a>
                    <div class="car-desc">
                        <a href="#">
                            <h3>MITSUBISHI ROSA BUS</h3>
                        </a>
                        <h3>FOB: $8,036</h3>
                    </div>
                </div>
                <div class="car-list">
                    <a href="#">
                        <img src="{{URL::asset ('/assets/frontend/images/car_1.png')}}" alt="">
                    </a>
                    <div class="car-desc">
                        <a href="#">
                            <h3>MITSUBISHI ROSA BUS</h3>
                        </a>
                        <h3>FOB: $8,036</h3>
                    </div>
                </div>
                <div class="car-list">
                    <a href="#" class="car-image">
                        <img src="{{URL::asset ('/assets/frontend/images/car_1.png')}}" alt="">
                        <div class="media-count">
                            <div class="image-count">
                                <i class="fas fa-camera"></i>
                                <span>13</span>
                            </div>
                            <div class="image-count">
                                <i class="fas fa-video"></i>
                                <span>1</span>
                            </div>
                        </div>
                        <div class="reserved-mark">Reserved</div>
                    </a>
                    <div class="car-desc">
                        <a href="#">
                            <h3>MITSUBISHI ROSA BUS</h3>
                        </a>
                        <h3>FOB: $8,036</h3>
                    </div>
                </div>
                <div class="car-list">
                    <a href="#">
                        <img src="{{URL::asset ('/assets/frontend/images/car_2.png')}}" alt="">
                    </a>
                    <div class="car-desc">
                        <a href="#">
                            <h3>MITSUBISHI ROSA BUS</h3>
                        </a>
                        <h3>FOB: $8,036</h3>
                    </div>
                </div>
                <div class="car-list">
                    <a href="#">
                        <img src="{{URL::asset ('/assets/frontend/images/car_3.png')}}" alt="">
                    </a>
                    <div class="car-desc">
                        <a href="#">
                            <h3>MITSUBISHI ROSA BUS</h3>
                        </a>
                        <h3>FOB: $8,036</h3>
                    </div>
                </div>
                <div class="car-list">
                    <a href="#">
                        <img src="{{URL::asset ('/assets/frontend/images/car_1.png')}}" alt="">
                    </a>
                    <div class="car-desc">
                        <a href="#">
                            <h3>MITSUBISHI ROSA BUS</h3>
                        </a>
                        <h3>FOB: $8,036</h3>
                    </div>
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
    <script src="{{ URL::asset('/assets/frontend/pages/stock/index.js')}}"></script>
@endsection