@extends('front.layouts.index')
@section('title') Blog @endsection
@section('css')
    <link href="{{ URL::asset('/assets/frontend/pages/blog/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/frontend/pages/blog/detail.css') }}" rel="stylesheet" type="text/css" />
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
                <li><a class="current-page">Blog details</a></li>
            </ul>
        </div>
        <div class="main-blog">
            <div class="blog-detail">
                <h2>{{$news->title}}</h2>
                <div class="detail-image">
                    <img src="{{URL::asset('/uploads/news')}}{{'/'}}{{$news->news_id}}{{'/'}}{{$news->image}}" alt="">
                    <!-- <p class="blog-date">{{date('j F, Y', strtotime($news->date))}}</p> -->
                </div>
                <div class="blog-contents">
                    {!! $news->description !!}
                </div>
            </div>
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
@endsection