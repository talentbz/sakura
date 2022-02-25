@extends('front.layouts.index')
@section('title') Company @endsection
@section('css')
    <link href="{{ URL::asset('/assets/frontend/pages/company/style.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="hero">
    <div class="hero-wrapper">
        @include('front.layouts.menu')
    </div>
</div>
<div class="contents">
    <div class="comapny-details">
        <div class="page-title">
            <ul>
                <li><a href="{{route('front.home')}}">Home <i class="fas fa-angle-right"></i></a></li>
                <li><a class="current-page">Company</a></li>
            </ul>
        </div>
        <div class="company-contents">
            <div class="row">
                <div class="col-md-6 col-sm-6 cl-xs-12">
                    <h1>WELCOME TO SAKURA MOTORS</h1>
                    <p>We believe in offering you the best customer service possible. We have been in the vehicle trading business for over 15 years in Japan. Our new company, established in 2011, is even better equipped to provide you with your dream vehicle. We offer you 24hour prompt and reliable service. We will also help you to find the best customised solution to meet your specific needs.</p>
                    <h4 class="company-mission">Our Mission</h4>
                    <p>To be a trustworthy, responsible and innovative value provider to all our partners and customers.</p>
                    <h4 class="company-vision">Our Vision</h4>
                    <p>To become a globally respected enterprise that provides outstanding service, excellent products and value for money.</p>
                </div>
                <div class="col-md-6 col-sm-6 cl-xs-12">
                    <img src="{{asset('/assets/frontend/images/Sakura-Motors-Company.jpg')}}" alt="">
                </div>
                <div class="col-md-12 company-info">
                    <h2>YOUR SATISFACTION IS OUR REWARD !!</h2>
                    <p><strong>Company Name</strong> :Sakura Motors</p>
                    <p><strong>Capital </strong> :10,000,000 Yen</p>
                    <p><strong>Head Office</strong> :Ibaraki Ken, Tsukuba Shi, Gakuen Minami, 3 – 48 – 48 , 〒 305 – 0818</p>
                    <p><strong>Stock Yard Ibaraki</strong> :1086 Matate, Bando, Ibaraki 306-0605</p>
                    <p><strong>Scrap Yard & Container Ibaraki</strong> :1086 Matate, Bando, Ibaraki 306-0605</p>
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