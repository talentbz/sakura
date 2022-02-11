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
            </div>
        </div>
    </div>
</div>
<!-- /top menu -->