@extends('front.layouts.index')
@section('title') Mypage @endsection
@section('css')
    <link href="{{ URL::asset('/assets/frontend/pages/agent/style.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="hero">
    <div class="hero-wrapper">
        @include('front.layouts.menu')
    </div>
</div>
<div class="contents">
    <div class="agent-details">
        <div class="page-title">
            <ul>
                <li><a href="{{route('front.home')}}">Home <i class="fas fa-angle-right"></i></a></li>
                <li><a class="current-page">Gallery</a></li>
            </ul>
        </div>
        <div class="agent-contents">
            <div class="agent-list">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <img src="{{asset('/assets/frontend/images/chrisopherS.jpg')}}" alt="">
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12 agent-info">
                        <p><strong>Country :</strong> Zambia</p>
                        <p><strong>Name :</strong> Christopher Simpamba</p>
                        <p><strong>Address : </strong> Plot 3854, Congo road , Industrial area , Chililabombwe, Zambia</p>
                        <p><strong>Telephone Number :</strong> 260 955 294560</p>
                        <p><strong>Email Address :</strong> simpambach@yahoo.com</p>
                    </div>
                </div>
            </div>
            <div class="agent-list">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <img src="{{asset('/assets/frontend/images/Ezekia-Ndone--250x300.jpg')}}" alt="">
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12 agent-info">
                        <p><strong>Country :</strong> Tanzania</p>
                        <p><strong>Name :</strong> Ezekia Ndone</p>
                        <p><strong>Address : </strong> Ezekia Ndone, Box 3797, Mbeya, Tanzania</p>
                        <p><strong>Telephone Number :</strong> 255 764 600272</p>
                        <p><strong>Email Address :</strong> ezekiahndone@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
    </script>
@endsection