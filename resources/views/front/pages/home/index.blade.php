@extends('front.layouts.index')
@section('title') Homepage @endsection
@section('css')
<link rel="stylesheet" href="{{ URL::asset('/assets/libs/lightgallery/lightgallery.min.css') }}">
@endsection
@section('content')
<!-- banner && menu section -->
<div class="hero">
    <div class="hero-wrapper">
        @include('front.layouts.menu')
        <div class="banner-desc">
            <h1>YOUR SATISFACTION IS OUR REWARD</h1>
        </div>
        <div class="banner-img">
            <img src="{{URL::asset ('/assets/frontend/images/banner_truck.png')}}" alt="">
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
                        <input type="text" class="form-control search-input" placeholder="Keywords" name="search_keyword"> 
                        <span> <button type="submit" class="btn search-submit-key"><i class="fas fa-search"></i></button></span>
                       
                        <p class="req">*Stock No.,Body Type, Chassis</p>
                    </div>
                    <div class="select-search">
                        <div class="input-group mb-2">
                            <span class="input-group-text">Make</span>
                            <select class="form-select select-category" name="maker">
                                <option value="">Any</option>
                                @foreach($models as $model)
                                    <option value="{{$model['category_name']}}">{{Str::upper($model['category_name'])}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text">Model</span>
                            <select class="form-select subcategory" name="model_name">
                                <option value="">Any</option>
                                <option></option>
                            </select>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text">Gear</span>
                            <select class="form-select" name="gear">
                                <option value="">Any</option>
                                @foreach($transmission as $row)
                                    <option value="{{$row}}">{{$row}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text">Year</span>
                            <div class="select-width">
                                <select class="form-select" name="from_year">
                                    <option value="">Any</option>
                                    @foreach($year as $row)
                                        <option value="{{$row}}">{{$row}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="select-width-last">
                                <select class="form-select" name="to_year">
                                    <option value="">Any</option>
                                    @foreach($year as $row)
                                        <option value="{{$row}}">{{$row}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!--<div class="input-group mb-2">
                            <span class="input-group-text">Price</span>
                            <div class="select-width">
                                <select class="form-select" name="from_price">
                                    <option value="">Any</option>
                                    @foreach($price as $row)
                                        <option value="{{$row}}" >${{number_format($row)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="select-width-last">
                                <select class="form-select" name="to_price">
                                    <option value="">Any</option>
                                    @foreach($price as $row)
                                        <option value="{{$row}}" >${{number_format($row)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="advance-search mb-2">
                            <a data-bs-toggle="modal" href="javascript:void(0)" data-bs-target=".advanced-seach-modal">
                                Advance Search
                                <i class="fas fa-angle-double-right"></i>    
                            </a>
                        </div> -->
                    </div>
                    <button type="submit" class="btn search-submit">Search<i class="fas fa-search"></i></button>
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
                        <a href="{{route('front.stock')}}{{'/?body_type=large bus'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/s_bus.png')}}" alt="">
                            <p>Large Bus</p><span>({{$body_large_bus && $body_large_bus->body_count ? $body_large_bus->body_count : 0}})</span>
                        </a>
                        <a href="{{route('front.stock')}}{{'/?body_type=mini bus'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/minibus.png')}}" alt="">
                            <p>Mini Bus</p><span>({{$body_mini_bus && $body_mini_bus->body_count ? $body_mini_bus->body_count : 0}})</span>
                        </a>
                        <a href="{{route('front.stock')}}{{'/?body_type=heavy truck'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/s_truck.png')}}" alt="">
                            <p>Heavy Truck</p><span>({{$body_heavy_truck && $body_heavy_truck->body_count ? $body_heavy_truck->body_count : 0}})</span>
                        </a>
                        <a href="{{route('front.stock')}}{{'/?body_type=light truck'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/light-truck.png')}}" alt="">
                            <p>Light Truck</p><span>({{$body_light_truck && $body_light_truck->body_count ? $body_light_truck->body_count : 0}})</span>
                        </a>
                        <a href="{{route('front.stock')}}{{'/?body_type=van'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/s_van.png')}}" alt="">
                            <p>Van</p><span>({{$body_van && $body_van->body_count ? $body_van->body_count : 0}})</span>
                        </a>
                        <a href="{{route('front.stock')}}{{'/?body_type=mini van'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/mini-van.png')}}" alt="">
                            <p>Mini Van</p><span>({{$body_mini_van && $body_mini_van->body_count ? $body_mini_van->body_count : 0}})</span>
                        </a>
                        <a href="{{route('front.stock')}}{{'/?body_type=suv'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/s_suv.png')}}" alt="">
                            <p>Suv</p><span>({{$body_sub && $body_sub->body_count ? $body_sub->body_count : 0}})</span>
                        </a>
                        <a href="{{route('front.stock')}}{{'/?body_type=sedan'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/s_sedan.png')}}" alt="">
                            <p>Sedan</p><span>({{$body_sedan && $body_sedan->body_count ? $body_sedan->body_count : 0}})</span>
                        </a>
                        <a href="{{route('front.stock')}}{{'/?body_type=wagon'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/wagon-r.png')}}" alt="">
                            <p>Wagon</p><span>({{$body_wagon && $body_wagon->body_count ? $body_wagon->body_count : 0}})</span>
                        </a>
                        <a href="{{route('front.stock')}}{{'/?body_type=Hatchback'}}" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/s_hatchback.png')}}" alt="">
                            <p>Hatchback</p><span>({{$body_hatchback && $body_hatchback->body_count ? $body_hatchback->body_count : 0}})</span>
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
            <!-- <div class="search-maker">
                <div class="search-title">
                    <h3>Search by Maker</h3>
                </div>
                <div class="search-maker-contents">
                    <div class="search-category">
                        <a href="{{route('front.stock')}}{{'/?make_type=toyota'}}" class="mb-1">
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
            </div> -->
            <!-- /search maker -->
        </div>
        <!-- /end left sidebar -->

        <!-- main contents -->
        <div class="main-contents">
            <!-- new arrivals -->
            <div class="main-contents-title">
                <h1>New Arrivals</h1>
                <a href="{{route('front.stock')}}" class="btn btn-light waves-effect">See all</a>
                <div class="title-border"></div>
            </div>
            <div class="contents-list">
                @foreach($vehicle_data as $row)
                <div class="car-list">
                    <div class="media-count">
                        @if(isset($row->image_length))
                        <div class="image-count" data-id="{{$row->vehicle_id}}">
                            <i class="fas fa-camera"></i>
                            <span>{{$row->image_length}}</span>
                        </div>
                        @endif
                        @if(isset($row->video_link))
                        <div class="video-count" data-id="{{$row->video_link}}">
                            <i class="fas fa-video"></i>
                            <span>1</span>
                        </div>
                        @endif
                    </div>
                    <a href="{{route('front.details', ['id' => $row->vehicle_id])}}" class="car-image">
                        <img src="{{URL::asset ('/uploads/vehicle')}}{{'/'}}{{$row->vehicle_id}}{{'/thumb/'}}{{$row->image}}" alt="">
                        @if($row->status == 'Invoice Issued')
                            <div class="reserved-mark">Reserved</div>
                        @endif
                    </a>
                    <div class="car-desc">
                        <a href="{{route('front.details', ['id' => $row->vehicle_id])}}">
                            <h3>{{$row->make_type}} {{$row->model_type}}</h3>
                        </a>
                        @if($row->sale_price==null)
                            <h3>FOB: ${{number_format(round($row->price/$rate))}}</h3>
                        @else
                            <h3>FOB: ${{number_format(round($row->sale_price/$rate))}}</h3>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            <!-- /end new arrivals -->

            <!-- Best Deals -->
            <div class="main-contents-title">
                <h1>Best Deals</h1>
                <a href="{{route('front.stock')}}" class="btn btn-light waves-effect">See all</a>
                <div class="title-border"></div>
            </div>
            <div class="contents-list">
                @foreach($best_vehicle_data as $row)
                <div class="car-list">
                    <a href="{{route('front.details', ['id' => $row->vehicle_id])}}" class="car-image">
                        <img src="{{URL::asset ('/uploads/vehicle')}}{{'/'}}{{$row->vehicle_id}}{{'/thumb/'}}{{$row->image}}" alt="">
                        <div class="media-count">
                            @if(isset($row->image_length))
                            <div class="image-count" data-id="{{$row->vehicle_id}}">
                                <i class="fas fa-camera"></i>
                                <span>{{$row->image_length}}</span>
                            </div>
                            @endif
                            @if(isset($row->video_link))
                            <div class="video-count" data-id="{{$row->video_link}}">
                                <i class="fas fa-video"></i>
                                <span>1</span>
                            </div>
                            @endif

                        </div>
                        @if($row->status == 'Invoice Issued')
                        <div class="reserved-mark">Reserved</div>
                        @endif
                    </a>
                    <div class="car-desc">
                        <a href="{{route('front.details', ['id' => $row->vehicle_id])}}">
                            <h3>{{$row->make_type}} {{$row->model_type}} </h3>
                        </a>
                        @if($row->sale_price==null)
                            <h3>FOB: ${{number_format(round($row->price/$rate))}}</h3>
                        @else
                            <h3>FOB: ${{number_format(round($row->sale_price/$rate))}}</h3>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            <!-- /end Best Deals -->
            
            <!-- customer voice -->
            <div class="main-contents-title">
                <h1>Customer's Voice</h1>
                <a href="{{route('front.customer_vocie')}}" class="btn btn-light waves-effect">List of customer's voice</a>
                <div class="title-border"></div>
            </div>
            <div class="customer-vocie">
                @foreach($customer as $row)
                <div class="customer-list">
                    <img src="{{URL::asset('/uploads/review')}}{{'/'}}{{$row->user_review_id}}{{'/'}}{{$row->image}}" alt="">
                    <div class="customer-text">
                        <h3>{{$row->title}}</h3>
                    </div>
                    <div class="overlay">
                        <div class="overlay-text">
                            <div class="customer-title" data-id="{{URL::asset('/uploads/review')}}{{'/'}}{{$row->user_review_id}}{{'/'}}{{$row->image}}"><h3>{{$row->title}}</h3></div>
                            <div class="overlay-border"></div>
                            <p>{{$row->description}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- /end customer voice -->`
        </div> 
        <!-- /end main contents -->

        <!-- right sidebar -->
       <div class="right-sidebar">
            <div class="news-box mb-2">
                <a href="#">
                    <img src="{{URL::asset ('/assets/frontend/images/nes_arrivel.png')}}" alt="">
                </a>
            </div>
            <!-- <div class="news-box mb-2">
                <a href="#">
                    <img src="{{URL::asset ('/assets/frontend/images/news_clearange.png')}}" alt="">
                </a>
            </div>
            <div class="news-box mb-2">
                <a href="#">
                    <img src="{{URL::asset ('/assets/frontend/images/news_shipping.png')}}" alt="">
                </a>
            </div> -->
            <div class="news-box mb-2">
                <div class="fb-wrapper">
                    <a href='https://www.facebook.com/SakuraMotorsCo.Ltd/'><h3>FaceBook</h3> </a>
                    <div id="fb-root"></div>
                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0&appId=846808562582364&autoLogAppEvents=1" nonce="0rEHGYlH"></script>
                    <div class="fb-page" data-href="https://www.facebook.com/SakuraMotorsCo.Ltd" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/SakuraMotorsCo.Ltd" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/SakuraMotorsCo.Ltd">Sakura Motors Co.,Ltd</a></blockquote></div>
                </div>
            </div> 
        </div>
        <!-- /end rightsidebar -->
    </div>
</div>

@endsection

@section('script')
<script>
    var models = @json($models);
    var light_url = "{{route('front.light_gallery')}}";
</script>
<script src="{{ URL::asset('/assets/libs/lightgallery/lightgallery.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/lightgallery/lg-video.js') }}"></script>
<script src="{{ URL::asset('/assets/frontend/pages/home/index.js')}}"></script>
@endsection