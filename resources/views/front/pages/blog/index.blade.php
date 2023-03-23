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
            @foreach($news as $row)
            <div class="blog-list">
                <div class="row">
                    <div class="col-md-3 blog-image">
                        <a href="{{route('front.blog.detail', ['id' => $row->news_id])}}">
                            <img src="{{URL::asset('/uploads/news')}}{{'/'}}{{$row->news_id}}{{'/'}}{{$row->image}}" alt="">
                        </a>
                    </div>
                    <div class="col-md-9 blog-contents">
                        <a href="{{route('front.blog.detail', ['id' => $row->news_id])}}">
                            <h3 class="blog-title">{{$row->title}}</h3>
                        </a>
                        <div class="blog-desc">{!! Str::limit(strip_tags($row->description), 300,'.....') !!}</div>
                        <a href="{{route('front.blog.detail', ['id' => $row->news_id])}}" class="read-more">Read more</a>
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
            </div> 
            <div class="news-box mb-2">
                <a href="#">
                    <img src="{{URL::asset ('/assets/frontend/images/nes_arrivel.png')}}" alt="">
                </a>
            </div>
            <div class="news-box mb-2">
                <div class="fb-wrapper">
                    <a href='https://www.facebook.com/SakuraMotorsCo.Ltd'><h3>FaceBook</h3></a>
                    <div id="fb-root"></div>
                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0&appId=846808562582364&autoLogAppEvents=1" nonce="0rEHGYlH"></script>
                    <div class="fb-page" data-href="https://www.facebook.com/SakuraMotorsCo.Ltd" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/SakuraMotorsCo.Ltd" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/SakuraMotorsCo.Ltd">Sakura Motors Co.,Ltd</a></blockquote></div>
                </div>
            </div>-->
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection