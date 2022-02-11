<!-- footer section -->
<div class="footer">
    <div class="footer-warpper">
        <div class="footer-logo">
            <a href="#">Sakura Motors</a>
            <p>We believe in offering you the best customer service possible. We have been in the vehicle trading business for over 15 years in Japan. Our new company, established in 2011, is even better equipped to provide you with your dream vehicle. We offer you 24hour prompt and reliable service. We will also help you to find the best customised solution to meet your specific needs.</p>
            <div class="footer-social">
                <a href="#" class="footer-facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="footer-twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" class="footer-instagram"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="footer-contact">
            <h3>Contact Us</h3>
            <div class="footer-contact-list">
                <div class="address-contact">
                    <div class="contact-list">
                            <div class="contact-left">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>  
                            <div class="contact-right">
                                <h3>Address:</h3>
                                <p>Ibaraki Ken, Tsukuba Shi, Gakuen Minami, 3 – 48 – 48,〒 305 – 0818</p>
                            </div>
                    </div>
                    <div class="contact-list">
                            <div class="contact-left">
                                <i class="bx bx-envelope"></i>
                            </div>  
                            <div class="contact-right">
                                <h3>Email:</h3>
                                <p>info@sakuramotors.com</p>
                            </div>
                    </div>
                    <div class="contact-list">
                            <div class="contact-left">
                                <i class="fas fa-fax"></i>
                            </div>  
                            <div class="contact-right">
                                <h3>Fax: </h3>
                                <p>+81-29-868-3669</p>
                            </div>
                    </div>
                </div>  
                <div class="phone-contact">
                    <div class="contact-list">
                            <div class="contact-left">
                                <i class="fas fa-phone-alt"></i>
                            </div>  
                            <div class="contact-right">
                                <h3>Mobile</h3>
                                <p>+81-90-9345-0908</p>
                            </div>
                    </div>
                    <div class="contact-list">
                            <div class="contact-left">
                                <i class="fas fa-home"></i>
                            </div>  
                            <div class="contact-right">
                                <h3>Office</h3>
                                <p>+81-29-868-3668</p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="copywirter">
    <p>© 2019 -2022 All rights reserved</p>
</div>
<!-- footer section -->
<!-- JAVASCRIPT -->
<script src="{{ URL::asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap/bootstrap.min.js')}}"></script>
<!-- toastr plugin -->
<script src="{{ URL::asset('/assets/libs/toastr/toastr.min.js') }}"></script>
<!-- toastr init -->
<script src="{{ URL::asset('/assets/js/pages/toastr.init.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.car-list').eq(3).css("margin-right", 0);
        $('.car-list').eq(7).css("margin-right", 0);
        $('.car-list').eq(11).css("margin-right", 0);
        $('.car-list').eq(15).css("margin-right", 0);
        $('.customer-list').eq(2).css("margin-right", 0);
        $('.customer-list').eq(5).css("margin-right", 0);
        if($( window ).width() <= 425){
            $('.car-list').eq(3).css("display", "none");
            $('.car-list').eq(4).css("display", "none");
            $('.car-list').eq(5).css("display", "none");
            $('.car-list').eq(6).css("display", "none");
            $('.car-list').eq(7).css("display", "none");
            $('.car-list').eq(11).css("display", "none");
            $('.car-list').eq(12).css("display", "none");
            $('.car-list').eq(13).css("display", "none");
            $('.car-list').eq(14).css("display", "none");
            $('.car-list').eq(15).css("display", "none");
            $('.customer-list').eq(2).css("display", "none");
            $('.customer-list').eq(3).css("display", "none");
            $('.customer-list').eq(4).css("display", "none");
            $('.customer-list').eq(5).css("display", "none");
        }
 
    });
    function mobileMenu() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>
@yield('script')