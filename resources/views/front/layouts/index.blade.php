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
    @include('front.layouts.topMenu')
    @yield('content')
    @include('front.layouts.footer')
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
        })
    </script>
</body>
</html>