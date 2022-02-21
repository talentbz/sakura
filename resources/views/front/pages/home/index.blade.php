@extends('front.layouts.index')
@section('title') Homepage @endsection
@section('css')
@endsection
@section('content')
<!-- banner && menu section -->
<div class="hero">
    <div class="hero-wrapper">
        @include('front.layouts.menu')
        <div class="banner-desc">
            <h1>YOUR SATISFACTION IS OUR REWARD?</h1>
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
                        
                        <form action="{{route('front.stock')}}" method="post">
                            @csrf
                            <a href="javascript:void(0)" class="mb-1">
                                <img src="{{URL::asset ('/assets/frontend/images/s_bus.png')}}" alt="">
                                <p>Bus</p><span>({{$body_bus && $body_bus->body_count ? $body_bus->body_count : 0}})</span>
                                <input type="hidden" name="body_type" value="bus">
                                <button type="submit">asd</button>
                            </a>
                        </form>
                        <a href="javascript:void(0)" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/s_truck.png')}}" alt="">
                            <p>Truck</p><span>({{$body_truck && $body_truck->body_count ? $body_truck->body_count : 0}})</span>
                        </a>
                        <a href="javascript:void(0)" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/s_van.png')}}" alt="">
                            <p>Van</p><span>({{$body_van && $body_van->body_count ? $body_van->body_count : 0}})</span>
                        </a>
                        <a href="javascript:void(0)" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/s_suv.png')}}" alt="">
                            <p>Sub</p><span>({{$body_sub && $body_sub->body_count ? $body_sub->body_count : 0}})</span>
                        </a>
                        <a href="javascript:void(0)" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/s_sedan.png')}}" alt="">
                            <p>Sedan</p><span>({{$body_sedan && $body_sedan->body_count ? $body_sedan->body_count : 0}})</span>
                        </a>
                        <a href="javascript:void(0)" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/s_pickup.png')}}" alt="">
                            <p>Pick up</p><span>({{$body_pick_up && $body_pick_up->body_count ? $body_pick_up->body_count : 0}})</span>
                        </a>
                        <a href="javascript:void(0)" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/s_machinery.png')}}" alt="">
                            <p>Machinery </p><span>({{$body_machinery && $body_machinery->body_count ? $body_machinery->body_count : 0}})</span>
                        </a>
                        <a href="javascript:void(0)">
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
                        <a href="javascript:void(0)" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_toyota.png')}}" alt="">
                            <p>Toyoda</p><span>(549)</span>
                        </a>
                        <a href="javascript:void(0)" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_nissan.png')}}" alt="">
                            <p>Nissan</p><span>(2,016)</span>
                        </a>
                        <a href="javascript:void(0)" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_mitsubishi.png')}}" alt="">
                            <p>Mitsubishi</p><span>(1,002)</span>
                        </a>
                        <a href="javascript:void(0)" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_honda.png')}}" alt="">
                            <p>Honda</p><span>(102)</span>
                        </a>
                        <a href="javascript:void(0)" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_mazda.png')}}" alt="">
                            <p>Mazda</p><span>(4,386)</span>
                        </a>
                        <a href="javascript:void(0)" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_subaru.png')}}" alt="">
                            <p>Subaru</p><span>(549)</span>
                        </a>
                        <a href="javascript:void(0)" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_suzuki.png')}}" alt="">
                            <p>Suzuki</p><span>(12)</span>
                        </a>
                        <a href="javascript:void(0)" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_isuzu.png')}}" alt="">
                            <p>Isuzu</p><span>(50)</span>
                        </a>
                        <a href="javascript:void(0)" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_daihatsu.png')}}" alt="">
                            <p>Daihatsu</p><span>(50)</span>
                        </a>
                        <a href="javascript:void(0)" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_hino.png')}}" alt="">
                            <p>Hino</p><span>(50)</span>
                        </a>
                        <a href="javascript:void(0)" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_udtrucks.png')}}" alt="">
                            <p>Ud Trucks</p><span>(50)</span>
                        </a>
                        <a href="javascript:void(0)" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_mercedes.png')}}" alt="">
                            <p>Mercedes benz</p><span>(50)</span>
                        </a>
                        <a href="javascript:void(0)" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_bmw.png')}}" alt="">
                            <p>Bmw</p><span>(50)</span>
                        </a>
                        <a href="javascript:void(0)" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_audi.png')}}" alt="">
                            <p>Audi</p><span>(50)</span>
                        </a>
                        <a href="javascript:void(0)" class="mb-1">
                            <img src="{{URL::asset ('/assets/frontend/images/m_chrysler.png')}}" alt="">
                            <p>Chrysler</p><span>(50)</span>
                        </a>
                        <a href="javascript:void(0)">
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
                <a href="{{route('front.stock')}}" class="btn btn-light waves-effect">See all</a>
                <div class="title-border"></div>
            </div>
            <div class="contents-list mb-5">
                @foreach($vehicle_data as $row)
                <div class="car-list">
                    <a href="{{route('front.details', ['id' => $row->vehicle_id])}}" class="car-image">
                        <img src="{{URL::asset ('/uploads/vehicle')}}{{'/'}}{{$row->vehicle_id}}{{'/thumb/'}}{{$row->image}}" alt="">
                        <div class="media-count">
                            @if(isset($row->image_length))
                            <div class="image-count">
                                <i class="fas fa-camera"></i>
                                <span>{{$row->image_length}}</span>
                            </div>
                            @endif
                            @if(isset($row->video_link))
                            <div class="image-count">
                                <i class="fas fa-video"></i>
                                <span>1</span>
                            </div>
                            @endif

                        </div>
                        <div class="reserved-mark">Reserved</div>
                    </a>
                    <div class="car-desc">
                        <a href="javascript:void(0)">
                            <h3>{{$row->make_type}} {{$row->model_type}} {{$row->body_type}}</h3>
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
                @foreach($vehicle_data as $row)
                <div class="car-list">
                    <a href="{{route('front.details', ['id' => $row->vehicle_id])}}" class="car-image">
                        <img src="{{URL::asset ('/uploads/vehicle')}}{{'/'}}{{$row->vehicle_id}}{{'/thumb/'}}{{$row->image}}" alt="">
                        <div class="media-count">
                            @if(isset($row->image_length))
                            <div class="image-count">
                                <i class="fas fa-camera"></i>
                                <span>{{$row->image_length}}</span>
                            </div>
                            @endif
                            @if(isset($row->video_link))
                            <div class="image-count">
                                <i class="fas fa-video"></i>
                                <span>1</span>
                            </div>
                            @endif

                        </div>
                        <div class="reserved-mark">Reserved</div>
                    </a>
                    <div class="car-desc">
                        <a href="javascript:void(0)">
                            <h3>{{$row->make_type}} {{$row->model_type}} {{$row->body_type}}</h3>
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
                <a href="javascript:void(0)" class="btn btn-light waves-effect">List of customer's voice</a>
                <div class="title-border"></div>
            </div>
            <div class="customer-vocie">
                <div class="customer-list">
                    <img src="{{URL::asset ('/assets/frontend/images/v_1.png')}}" alt="">
                    <div class="customer-text">
                        <h3>TOYOTA RACTIS</h3>
                    </div>
                    <div class="overlay">
                        <div class="overlay-text">
                            <a href="#"><h3>TOYOTA RACTIS</h3></a>
                            <div class="overlay-border"></div>
                            <p>We have been in the vehicle trading business for over 15 years in Japan.</p>
                        </div>
                    </div>
                </div>
                <div class="customer-list">
                    <img src="{{URL::asset ('/assets/frontend/images/v_1.png')}}" alt="">
                    <div class="customer-text">
                        <h3>TOYOTA RACTIS</h3>
                    </div>
                    <div class="overlay">
                        <div class="overlay-text">
                            <a href="#"><h3>TOYOTA RACTIS</h3></a>
                            <div class="overlay-border"></div>
                            <p>We have been in the vehicle trading business for over 15 years in Japan.</p>
                        </div>
                    </div>
                </div>
                <div class="customer-list">
                    <img src="{{URL::asset ('/assets/frontend/images/v_1.png')}}" alt="">
                    <div class="customer-text">
                        <h3>TOYOTA RACTIS</h3>
                    </div>
                    <div class="overlay">
                        <div class="overlay-text">
                            <a href="#"><h3>TOYOTA RACTIS</h3></a>
                            <div class="overlay-border"></div>
                            <p>We have been in the vehicle trading business for over 15 years in Japan.</p>
                        </div>
                    </div>
                </div>
                <div class="customer-list">
                    <img src="{{URL::asset ('/assets/frontend/images/v_1.png')}}" alt="">
                    <div class="customer-text">
                        <h3>TOYOTA RACTIS</h3>
                    </div>
                    <div class="overlay">
                        <div class="overlay-text">
                            <a href="#"><h3>TOYOTA RACTIS</h3></a>
                            <div class="overlay-border"></div>
                            <p>We have been in the vehicle trading business for over 15 years in Japan.</p>
                        </div>
                    </div>
                </div>
                <div class="customer-list">
                    <img src="{{URL::asset ('/assets/frontend/images/v_1.png')}}" alt="">
                    <div class="customer-text">
                        <h3>TOYOTA RACTIS</h3>
                    </div>
                    <div class="overlay">
                        <div class="overlay-text">
                            <a href="#"><h3>TOYOTA RACTIS</h3></a>
                            <div class="overlay-border"></div>
                            <p>We have been in the vehicle trading business for over 15 years in Japan.</p>
                        </div>
                    </div>
                </div>
                <div class="customer-list">
                    <img src="{{URL::asset ('/assets/frontend/images/v_1.png')}}" alt="">
                    <div class="customer-text">
                        <h3>TOYOTA RACTIS</h3>
                    </div>
                    <div class="overlay">
                        <div class="overlay-text">
                            <a href="#"><h3>TOYOTA RACTIS</h3></a>
                            <div class="overlay-border"></div>
                            <p>We have been in the vehicle trading business for over 15 years in Japan.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /end customer voice -->`
        </div>
        <!-- /end main contents -->

        <!-- right sidebar -->
        <div class="right-sidebar">
            <div class="news-box mb-2">
                <a href="#">
                    <img src="{{URL::asset ('/assets/frontend/images/news_clearange.png')}}" alt="">
                </a>
            </div>
            <div class="news-box mb-2">
                <a href="#">
                    <img src="{{URL::asset ('/assets/frontend/images/news_shipping.png')}}" alt="">
                </a>
            </div>
            <div class="news-box mb-2">
                <a href="#">
                    <img src="{{URL::asset ('/assets/frontend/images/nes_arrivel.png')}}" alt="">
                </a>
            </div>
            <div class="news-box mb-2">
                <div class="fb-wrapper">
                    <h3>FaceBook</h3>
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
<!-- modal section -->
@include('front.layouts.searchModal')

@section('script')

@endsection