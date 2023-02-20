@extends('front.layouts.index')
@section('title') Gallery @endsection
@section('css')
    <link href="{{ URL::asset('/assets/libs/magnific-popup/magnific-popup.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/frontend/pages/gallery/video.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="hero">
    <div class="hero-wrapper">
        @include('front.layouts.menu')
    </div>
</div>
<div class="contents">
    <div class="gallery-details">
        <div class="page-title">
            <ul>
                <li><a href="{{route('front.home')}}">Home <i class="fas fa-angle-right"></i></a></li>
                <li><a class="current-page">Video Gallery</a></li>
            </ul>
        </div>
        <div class="page-content">
            @include('front.pages.gallery.pagination')
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ URL::asset('/assets/frontend/pages/gallery/video.js')}}"></script>
@endsection