@extends('front.layouts.index')
@section('title') Customer @endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/libs/magnific-popup/magnific-popup.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/frontend/pages/customer/style.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="hero">
    <div class="hero-wrapper">
        @include('front.layouts.menu')
    </div>
</div>
<div class="contents">
    <div class="contact-details">
        <div class="page-title">
            <ul>
                <li><a href="{{route('front.home')}}">Home <i class="fas fa-angle-right"></i></a></li>
                <li><a class="current-page">Customer Voice</a></li>
            </ul>
        </div>
        <div class="main-blog">
            @foreach($review as $row)
            <div class="customer-review">
                <div class="row">
                    <div class="col-md-3 review-image">
                            <a class="image-popup-no-margins" href="{{URL::asset('/uploads/review')}}{{'/'}}{{$row->user_review_id}}{{'/'}}{{$row->image}}">
                                <img class="img-fluid" src="{{URL::asset('/uploads/review')}}{{'/'}}{{$row->user_review_id}}{{'/'}}{{$row->image}}">
                            </a>
                    </div>
                    <div class="col-md-9 review-contents">
                            <h3>{{$row->title}}</h3>
                            <div class="rating text-warning">{{$row->rate}}</div>
                            <p>by {{$row->customer_name}} ({{$row->country}}) on {{$row->register_date}}</p>
                            <p>{{$row->description}}</p>
                    </div> 
                </div>
            </div>
           @endforeach
        </div>
        <div class="right-sidebar">
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
    </div>
</div>
@endsection
@section('script')
    <script src="https://use.fontawesome.com/5ac93d4ca8.js"></script>
    <script src="{{ URL::asset('/assets/admin/plugin/bootstrap4-rating-input/bootstrap4-rating-input.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/magnific-popup/magnific-popup.min.js') }}"></script>
    <!-- lightbox init js-->
    <script src="{{ URL::asset('/assets/js/pages/lightbox.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/frontend/pages/customer/index.js')}}"></script>
@endsection