@yield('css')

<!-- Bootstrap Css -->
<link href="{{ URL::asset('/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ URL::asset('/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ URL::asset('/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/toastr/toastr.min.css') }}">
<style>
    /* spiner loading */
    .spinner-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 9999;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, .2);
    }
    .spinner-border {
        position: absolute;
        top: 40%;
        left: 50%;
    }
</style>
<script src="{{ URL::asset('assets/libs/jquery/jquery.min.js')}}"></script>

