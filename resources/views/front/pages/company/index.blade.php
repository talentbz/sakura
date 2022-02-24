@extends('front.layouts.index')
@section('title') Company @endsection
@section('css')
    <link href="{{ URL::asset('/assets/frontend/pages/contact/style.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="hero">
    <div class="hero-wrapper">
        @include('front.layouts.menu')
    </div>
</div>
@endsection
@section('script')
    <script>
    </script>
@endsection