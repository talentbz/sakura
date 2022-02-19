<div class="header">
    <div class="logo">
        <a href="{{route('front.home')}}"><img src="{{URL::asset ('/assets/frontend/images/logo.png')}}" alt=""></a>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{route('front.home')}}" class="{{  request()->routeIs('front.home') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{route('front.stock')}}" class="{{  request()->routeIs('front.stock') ? 'active' : '' }}">Stock</a></li>
            <li><a href="#">Company</a></li>
            <li><a href="#">Payment</a></li>
            <li><a href="#">News</a></li>
            <li><a href="#">Agents</a></li>
            <li><a href="#">Gallery</a></li>
            <li><a href="#" class="last-menu">Contact us</a></li>
        </ul>
    </div>
</div>