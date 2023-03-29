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

                        {{-- <div class="input-group mb-2">
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
                        </div> --}}
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