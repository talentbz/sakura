@extends('front.layouts.index')
@section('title') Payment @endsection
@section('css')
    <link href="{{ URL::asset('/assets/frontend/css/hero.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/frontend/pages/payment/style.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="hero">
    <div class="hero-wrapper">
        @include('front.layouts.menu')
    </div>
</div>
<div class="contents">
    <div class="payment-details">
        <div class="page-title">
            <ul>
                <li><a href="{{route('front.home')}}">Home <i class="fas fa-angle-right"></i></a></li>
                <li><a class="current-page">Payment</a></li>
            </ul>
        </div>
        <div class="main-payment">
        <div class="table-responsive">
            <table class="table table-striped mb-0">
                <tbody>
                    <tr>
                        <td class="label">Account Name:</td>
                        <td>SAKURA MOTORS CO.,LTD.</td>
                    </tr>
                    <tr>
                        <td class="label">Account Number:	</td>
                        <td>244-0488651</td>
                    </tr>
                    <tr>
                        <td class="label">Bank Name:</td>
                        <td>SUMITOMO MITSUI BANKING CORPORATION</td>
                    </tr>
                    <tr>
                        <td class="label">Swift Code:</td>
                        <td>SMBCJPJT</td>
                    </tr>
                    <tr>
                        <td class="label">Branch Name:</td>
                        <td>TSUKUBA BRANCH</td>
                    </tr>
                    <tr>
                        <td class="label">Branch Address:</td>
                        <td>5-19, KENKYUGAKUEN, TSUKUBA-SHI, IBARAKI ,305-0817, JAPAN</td>
                    </tr>
                </tbody>
            </table>
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
    <script>
    </script>
@endsection