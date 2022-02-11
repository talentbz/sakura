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
    @include('front.layouts.header')
    @include('front.layouts.topMenu')
    @yield('content')
    @include('front.layouts.footer')

</body>
</html>