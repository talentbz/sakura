@extends('front.layouts.index')
@section('title') Blog @endsection
@section('css')
    <link href="{{ URL::asset('/assets/frontend/pages/blog/style.css') }}" rel="stylesheet" type="text/css" />
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
                <li><a class="current-page">Blog</a></li>
            </ul>
        </div>
        <div class="main-blog">
            @for($i=0; $i < 9; $i++)
            <div class="blog-list">
                <div class="row">
                    <div class="col-md-3 blog-image">
                        <a href="#">
                            <img src="{{asset('/uploads/vehicle/50/thumb/1-46.jpg')}}" alt="">
                        </a>
                    </div>
                    <div class="col-md-9 blog-contents">
                        <h3 class="blog-title">1ST TOYOTA PASSENGER CAR 1936 MODEL AANEW BLOG POST</h3>
                        <p class="blog-desc">This is the 1st Toyota Passenger car Model AA, year 1936, was Developed under leadership of Toyota Motor corporation’s founder,Kiichiro Toyota. it was modeled on the latest American vehicles.</p>
                        <a href="#" class="read-more">Read more</a>
                    </div>
                </div>
            </div>
            @endfor
        </div>
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
    </div>
</div>
@endsection
@section('script')
@endsection