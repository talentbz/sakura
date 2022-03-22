<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') | SakuraMotors</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('front.layouts.header')
</head>
<body>
    <div class="spinner-wrapper">
        <div class="spinner-border text-danger m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="whatsapp">
        <div class="wrap">
            <img src="{{URL::asset ('/assets/frontend/images/whatsapp.png')}}" alt="">
        </div>
    </div>
    <div id="sideWhatsappAdd" class="side_whatsapp_add">
        <ul>
            <li>
                <a href="https://wa.me/819093450908">
                    <span>Nalaka :</span>
                    <span>+81-90-9345-0908</span>
                </a>
            </li>
            <li>
                <a href="https://wa.me/8180688235539">
                    <span>Rajika :</span>
                    <span>+81-80-6882-35539</span>
                </a>
            </li>
        </ul>
    </div>
    @include('front.layouts.topMenu')
    @yield('content')
    @include('front.layouts.footer')
    <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
    <script>
        $(document).ready(function(){
            //ajax loading spinner
            var loading = $('.spinner-wrapper').hide();
            $(document)
                .ajaxStart(function () {
                    loading.show();
                })
                .ajaxStop(function () {
                    setTimeout(function(){
                        loading.hide();
                    }, 500)
                });
            $('.whatsapp').on('click', function(){
                $('#sideWhatsappAdd').animate({width:'toggle'},350);
            })
        })
    </script>
</body>
</html>