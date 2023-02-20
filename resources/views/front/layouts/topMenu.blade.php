<!-- top menu setion -->
<div class="top-menu">
    <div class="top-menu-wrapper">
        <div class="top-left">
            <div class="topnav" id="myTopnav">
                <a href="{{route('front.home')}}" class="{{request()->routeIs('front.home') ? 'active' : ''}}">Home</a>
                <a href="{{route('front.stock')}}" class="{{request()->routeIs('front.stock') ? 'active' : ''}}">Stock</a>
                <a href="{{route('front.payment')}}" class="{{request()->routeIs('front.payment') ? 'active' : ''}}">Payment</a>
                <a href="{{route('front.blog')}}" class="{{request()->routeIs('front.blog') ? 'active' : ''}}">News</a>
                <a href="{{route('front.agents')}}" class="{{request()->routeIs('front.agents') ? 'active' : ''}}">Agents</a>
                <a href="{{route('front.gallery')}}" class="{{request()->routeIs('front.gallery') ? 'active' : ''}}">Image Gallery</a>
                <a href="{{route('front.video.gallery')}}" class="{{request()->routeIs('front.video.gallery') ? 'active' : ''}}">Video Gallery</a>
                <a href="{{route('front.contact')}}" class="{{request()->routeIs('front.contact') ? 'active' : ''}}">Contact us</a>
            </div>
            <a href="javascript:void(0);" class="mobile-icon" onclick="mobileMenu()">
                <i class="fa fa-bars"></i>
            </a>
            <div class="contact-info call-us">
                <a href="tel:81298683668">
                    <i class="bx bxs-phone-call"></i>    
                </a>
                <span>Call Us:</span>
                <a class="mobile-no" href="tel:81298683668">+81-29-868-3668</a>
            </div>
            <div class="contact-info whats-app">
                <a href="https://wa.me/819093450908">
                    <i class="mdi mdi-whatsapp"></i>
                </a>
                <span>Whatsapp:</span>
                <a class="whatsapp-no" href="https://wa.me/819093450908">+81-90-9345-0908</a>
            </div>
        </div>
        <div class="top-right">
            <div class="social">
                <a href="https://www.facebook.com/SakuraMotorsCo.Ltd" >
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://www.youtube.com/channel/UC2rMo2rX0_bljt2Dwgg_RHg">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="https://www.instagram.com/sakuramotorsjapan/" >
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
                            <a class="dropdown-item" href="{{route('front.user.chatroom')}}"><i class="bx bx-chat font-size-16 align-middle me-1"></i> <span>Chat Room</span></a>
                            <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target=".change-password"><i class="bx bx-lock-open font-size-16 align-middle me-1"></i> <span>Change password</span></a>
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

<!--  Change-Password example -->
@if(Auth::user())
<div class="modal fade change-password" tabindex="-1" role="dialog"
aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="change-password">
                    @csrf
                    <input type="hidden" value="{{ Auth::user()->id }}" id="data_id">
                    <div class="mb-3">
                        <label for="current_password">Current Password</label>
                        <input id="current-password" type="password"
                            class="form-control @error('current_password') is-invalid @enderror"
                            name="current_password" autocomplete="current_password"
                            placeholder="Enter Current Password" value="{{ old('current_password') }}">
                        <div class="text-danger" id="current_passwordError" data-ajax-feedback="current_password"></div>
                    </div>

                    <div class="mb-3">
                        <label for="newpassword">New Password</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            autocomplete="new_password" placeholder="Enter New Password">
                        <div class="text-danger" id="passwordError" data-ajax-feedback="password"></div>
                    </div>

                    <div class="mb-3">
                        <label for="userpassword">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            autocomplete="new_password" placeholder="Enter New Confirm password">
                        <div class="text-danger" id="password_confirmError" data-ajax-feedback="password-confirm"></div>
                    </div>

                    <div class="mt-3 d-grid">
                        <button class="btn btn-primary waves-effect waves-light UpdatePassword" data-id="{{ Auth::user()->id }}"
                            type="submit">Update Password</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endif