<!-- top menu setion -->
<div class="top-menu">
    <div class="top-menu-wrapper">
        <div class="top-left">
            <div class="topnav" id="myTopnav">
                <a href="#" class="active">Home</a>
                <a href="#">Stock</a>
                <a href="#">Payment</a>
                <a href="#">News</a>
                <a href="#">Agents</a>
                <a href="#">Gallery</a>
                <a href="#">Contact us</a>
            </div>
            <a href="javascript:void(0);" class="mobile-icon" onclick="mobileMenu()">
                <i class="fa fa-bars"></i>
            </a>
            <div class="contact-info call-us">
                <a href="#">
                    <i class="bx bxs-phone-call"></i>    
                </a>
                <span>Call Us:</span>
                <a class="mobile-no" href="tel:+81-29-868-3668">+81-29-868-3668</a>
            </div>
            <div class="contact-info whats-app">
                <a href="#">
                    <i class="mdi mdi-whatsapp"></i>
                </a>
                <span>Whatsapp:</span>
                <a class="whatsapp-no" href="https://wa.me/819093450908">+81-90-9345-0908</a>
            </div>
        </div>
        <div class="top-right">
            <div class="social">
                <a href="#">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
            <div class="user-register">
                @guest('web')
                <div class="user-signup">
                    <a href="{{route('front.user.signup')}}">
                        <i class="fas fa-user-plus"></i>
                        <span>Signup</span>
                    </a>
                </div>
                <div class="user-login">
                    <a href="{{route('front.user.login')}}">
                        <i class="fas fa-user-circle"></i>
                        <span>Login</span>
                    </a>
                </div>
                @endguest
            </div>
            @auth('web')
                
                <ul class="registered-user">
                    <li class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="{{ isset(Auth::user()->avatar) ? asset('/uploads/avatar').'/'.(Auth::user()->id).'/'.(Auth::user()->avatar) : asset('/assets/images/users/user.png') }}"
                                alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ucfirst(Auth::user()->name)}}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            @if(Auth::user()->role == 2)
                            <a class="dropdown-item" href="{{route('front.user.mypage')}}"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span>My Page</span></a>
                            <a class="dropdown-item" href="#"><i class="bx bx-lock-open font-size-16 align-middle me-1"></i> <span>Change password</span></a>
                            <div class="dropdown-divider"></div>
                            @endif
                            <a class="dropdown-item text-danger" href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            @endauth
        </div>
    </div>
</div>
<!-- /top menu -->