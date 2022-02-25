@extends('front.layouts.index')
@section('title') Gallery @endsection
@section('css')
    <link href="{{ URL::asset('/assets/libs/magnific-popup/magnific-popup.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/frontend/pages/gallery/style.css') }}" rel="stylesheet" type="text/css" />
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
                <li><a class="current-page">Gallery</a></li>
            </ul>
        </div>
        <div class="gallery-contents">
            <div class="gallery-list">
                <h3><strong>Stock Y</strong><span>ard</span></h3>
                <div class="gallery zoom-gallery">
                    <a href="{{asset('/assets/frontend/images/A-1.jpg')}}" ><img src="{{asset('/assets/frontend/images/A-1.jpg')}}" alt="" title="Beautiful Image" /></a>
                    <a href="{{asset('/assets/frontend/images/stk2.jpg')}}" ><img src="{{asset('/assets/frontend/images/stk2.jpg')}}" alt="" title="Beautiful Image" /></a>
                    <a href="{{asset('/assets/frontend/images/stk3.jpg')}}" ><img src="{{asset('/assets/frontend/images/stk3.jpg')}}" alt="" title="Beautiful Image" /></a>
                    <a href="{{asset('/assets/frontend/images/C-1.jpg')}}" ><img src="{{asset('/assets/frontend/images/C-1.jpg')}}" alt="" title="Beautiful Image" /></a>
                    <a href="{{asset('/assets/frontend/images/D-1.jpg')}}" ><img src="{{asset('/assets/frontend/images/D-1.jpg')}}" alt="" title="Beautiful Image" /></a>
                    <a href="{{asset('/assets/frontend/images/E-1.jpg')}}" ><img src="{{asset('/assets/frontend/images/E-1.jpg')}}" alt="" title="Beautiful Image" /></a>
                    <a href="{{asset('/assets/frontend/images/F-1.jpg')}}" ><img src="{{asset('/assets/frontend/images/F-1.jpg')}}" alt="" title="Beautiful Image" /></a>
                    <a href="{{asset('/assets/frontend/images/H-1.jpg')}}" ><img src="{{asset('/assets/frontend/images/H-1.jpg')}}" alt="" title="Beautiful Image" /></a>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="gallery-contents">
            <div class="gallery-list">
                <h3><strong>Used P</strong><span>arts</span></h3>
                <div class="gallery popup-gallery">
                    <a href="{{asset('/assets/frontend/images/part-1.jpg')}}" ><img src="{{asset('/assets/frontend/images/part-1.jpg')}}" alt="" title="Beautiful Image" /></a>
                    <a href="{{asset('/assets/frontend/images/part-2-1.jpg')}}" ><img src="{{asset('/assets/frontend/images/part-2-1.jpg')}}" alt="" title="Beautiful Image" /></a>
                    <a href="{{asset('/assets/frontend/images/part-3.jpg')}}" ><img src="{{asset('/assets/frontend/images/part-3.jpg')}}" alt="" title="Beautiful Image" /></a>
                    <a href="{{asset('/assets/frontend/images/part-4.jpg')}}" ><img src="{{asset('/assets/frontend/images/part-4.jpg')}}" alt="" title="Beautiful Image" /></a>
                    <a href="{{asset('/assets/frontend/images/part5.jpg')}}" ><img src="{{asset('/assets/frontend/images/part5.jpg')}}" alt="" title="Beautiful Image" /></a>
                    <a href="{{asset('/assets/frontend/images/part6.jpg')}}" ><img src="{{asset('/assets/frontend/images/part6.jpg')}}" alt="" title="Beautiful Image" /></a>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="gallery-contents">
            <div class="gallery-list">
                <h3><strong>Container L</strong><span>oading</span></h3>
                <div class="gallery zoom-gallery">
                    <a href="{{asset('/assets/frontend/images/con1.jpg')}}" ><img src="{{asset('/assets/frontend/images/con1.jpg')}}" alt="" title="Beautiful Image" /></a>
                    <a href="{{asset('/assets/frontend/images/con2.jpg')}}" ><img src="{{asset('/assets/frontend/images/part-2-1.jpg')}}" alt="" title="Beautiful Image" /></a>
                    <a href="{{asset('/assets/frontend/images/con3.jpg')}}" ><img src="{{asset('/assets/frontend/images/con3.jpg')}}" alt="" title="Beautiful Image" /></a>
                    <a href="{{asset('/assets/frontend/images/con4.jpg')}}" ><img src="{{asset('/assets/frontend/images/con4.jpg')}}" alt="" title="Beautiful Image" /></a>
                    <a href="{{asset('/assets/frontend/images/con6.jpg')}}" ><img src="{{asset('/assets/frontend/images/con6.jpg')}}" alt="" title="Beautiful Image" /></a>
                    <a href="{{asset('/assets/frontend/images/cl6.jpg')}}" ><img src="{{asset('/assets/frontend/images/cl6.jpg')}}" alt="" title="Beautiful Image" /></a>
                    <a href="{{asset('/assets/frontend/images/cl7.jpg')}}" ><img src="{{asset('/assets/frontend/images/cl7.jpg')}}" alt="" title="Beautiful Image" /></a>
                    <a href="{{asset('/assets/frontend/images/cl8.jpg')}}" ><img src="{{asset('/assets/frontend/images/cl8.jpg')}}" alt="" title="Beautiful Image" /></a>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
     <!-- Magnific Popup-->
     <script src="{{ URL::asset('/assets/libs/magnific-popup/magnific-popup.min.js') }}"></script>
    <!-- lightbox init js-->
    <script src="{{ URL::asset('/assets/js/pages/lightbox.init.js') }}"></script>
@endsection