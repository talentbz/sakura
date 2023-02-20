<div class="header">
    <div class="logo">
        <a href="{{route('front.home')}}"><img src="{{URL::asset ('/assets/frontend/images/logo.png')}}" alt=""></a>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{route('front.home')}}" class="{{  request()->routeIs('front.home') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{route('front.stock')}}" class="{{  request()->routeIs('front.stock') ? 'active' : '' }}">Stock</a></li>
            <li><a href="{{route('front.company')}}" class="{{  request()->routeIs('front.company') ? 'active' : '' }}">Company</a></li>
            <li><a href="{{route('front.payment')}}" class="{{  request()->routeIs('front.payment') ? 'active' : '' }}">Payment</a></li>
            <li><a href="{{route('front.blog')}}" class="{{  request()->routeIs('front.blog') ? 'active' : '' }}">News</a></li>
            <li><a href="{{route('front.agents')}}" class="{{  request()->routeIs('front.agents') ? 'active' : '' }}">Agents</a></li>
            <!-- <li><a href="{{route('front.gallery')}}" class="{{  request()->routeIs('front.gallery') ? 'active' : '' }}">Gallery</a></li> -->
            <li class="dropdown">
                <a href="javascript:void(0);" class="dropbtn {{  request()->routeIs('front.blog') ? 'active' : '' }}">Gallery</a>
                <div class="dropdown-content">
                    <a href="{{route('front.gallery')}}" class="{{  request()->routeIs('front.gallery') ? 'active' : '' }}">Image Gallery</a>
                    <a href="{{route('front.video.gallery')}}">Video Gallery</a>
                </div>
            </li>
            <li><a href="{{route('front.contact')}}" class="{{  request()->routeIs('front.contact') ? 'active' : '' }} last-menu">Contact us</a></li>
        </ul>
    </div>
</div>