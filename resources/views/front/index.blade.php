<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Bootstrap Css -->
    <link href="{{ URL::asset('/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ URL::asset('/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="http://fonts.cdnfonts.com/css/electrolux-sans" rel="stylesheet">

    <link href="{{ URL::asset('/assets/frontend/css/style.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    <!-- top menu setion -->
    <div class="top-menu">
        <div class="top-menu-wrapper">
            <div class="top-left">
                <div class="contact-info call-us">
                    <i class="mdi mdi-whatsapp"></i>
                    <span>Call Us:</span>
                    <a href="#">+81-29-868-3668</a>
                </div>
                <div class="contact-info whats-app">
                    <i class="mdi mdi-whatsapp"></i>
                    <span>Call Us:</span>
                    <a href="#">+81-90-9345-0908</a>
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
                        <a href="#">
                            <i class="fas fa-user-plus"></i>
                            <span>Signup</span>
                        </a>
                    </div>
                    <div class="user-login">
                        <a href="#">
                            <i class="fas fa-user-circle"></i>
                            <span>Login</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /top menu -->

    <!-- banner && menu section -->
    <div class="hero">
        <div class="hero-wrapper">
            <div class="header">
                <div class="logo">
                    <a href="#"><img src="{{URL::asset ('/assets/frontend/images/logo.png')}}" alt=""></a>
                </div>
                <div class="menu">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Stock</a></li>
                        <li><a href="#">Company</a></li>
                        <li><a href="#">Payment</a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="#">Agents</a></li>
                        <li><a href="#">Gallery</a></li>
                        <li><a href="#" class="last-menu">Contact us</a></li>
                    </ul>
                </div>
            </div>
            <div class="banner-desc">
                <h1>YOUR SATISFACTION IS OUR REWARD?</h1>
            </div>
            <div class="banner-img">
                <img src="{{URL::asset ('/assets/frontend/images/banner_truck.png')}}" alt="">
            </div>
        </div>
    </div>
    <!-- /end banner && menu -->

    <!-- contents -->
    <div class="contents">
        <div class="contents-wrapper">
            <!-- left sidebar -->
            <div class="left-sidebar">
                <!-- search car -->
                <div class="search-car">
                    <div class="search-title search-car-title">
                        <h3>Search Japanese Car</h3>
                    </div>
                    <form action="" class="custom-search">
                        <div class="form-content">
                            <input type="text" class="form-control search-input" placeholder="Search keywords"> 
                            <span class="bx bx-search-alt"></span>
                            <p class="req">*Ref No., Maker, Model, Model Code, Chassis, Grade</p>
                        </div>
                        <div class="select-search">
                            <div class="input-group mb-2">
                                <span class="input-group-text">Maker</span>
                                <select class="form-select">
                                    <option>Any</option>
                                    <option>Large select</option>
                                    <option>Small select</option>
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text">Model</span>
                                <select class="form-select">
                                    <option>Any</option>
                                    <option>Large select</option>
                                    <option>Small select</option>
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text">Year</span>
                                <div class="select-width">
                                    <select class="form-select">
                                        <option>Any</option>
                                        <option>Large select</option>
                                        <option>Small select</option>
                                    </select>
                                </div>
                                <div class="select-width-last">
                                    <select class="form-select">
                                        <option>Any</option>
                                        <option>Large select</option>
                                        <option>Small select</option>
                                    </select>
                                </div>
                            </div>

                            <div class="input-group mb-2">
                                <span class="input-group-text">Price</span>
                                <div class="select-width">
                                    <select class="form-select">
                                        <option>Any</option>
                                        <option>Large select</option>
                                        <option>Small select</option>
                                    </select>
                                </div>
                                <div class="select-width-last">
                                    <select class="form-select">
                                        <option>Any</option>
                                        <option>Large select</option>
                                        <option>Small select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="advance-search mb-2">
                                <a data-bs-toggle="modal" href="javascript:void(0)" data-bs-target=".advanced-seach-modal">
                                    Advance Search
                                    <i class="fas fa-angle-double-right"></i>    
                                </a>
                            </div>
                        </div>
                        <button type="submit" class="search-submit">Search <i class="fas fa-search"></i></button>
                    </form>
                </div>
                <!-- /end search car -->

                <!-- search type -->
                <div class="search-type">
                    <div class="search-title">
                        <h3>Search by Type</h3>
                    </div>
                    <div class="search-type-contents">
                        <div class="search-category">
                            <a href="#" class="mb-3">
                                <img src="{{URL::asset ('/assets/frontend/images/s_bus.png')}}" alt="">
                                <p>Bus (10seats +)</p><span>(549)</span>
                            </a>
                            <a href="#" class="mb-3">
                                <img src="{{URL::asset ('/assets/frontend/images/s_truck.png')}}" alt="">
                                <p>Truck</p><span>(2,016)</span>
                            </a>
                            <a href="#" class="mb-3">
                                <img src="{{URL::asset ('/assets/frontend/images/s_van.png')}}" alt="">
                                <p>Van</p><span>(1,002)</span>
                            </a>
                            <a href="#" class="mb-3">
                                <img src="{{URL::asset ('/assets/frontend/images/s_suv.png')}}" alt="">
                                <p>Sub</p><span>(102)</span>
                            </a>
                            <a href="#" class="mb-3">
                                <img src="{{URL::asset ('/assets/frontend/images/s_sedan.png')}}" alt="">
                                <p>Sedan</p><span>(4,386)</span>
                            </a>
                            <a href="#" class="mb-3">
                                <img src="{{URL::asset ('/assets/frontend/images/s_pickup.png')}}" alt="">
                                <p>Pick up</p><span>(549)</span>
                            </a>
                            <a href="#" class="mb-3">
                                <img src="{{URL::asset ('/assets/frontend/images/s_machinery.png')}}" alt="">
                                <p>Machinery </p><span>(12)</span>
                            </a>
                            <a href="#">
                                <img src="{{URL::asset ('/assets/frontend/images/s_stractor.png')}}" alt="">
                                <p>Tractor</p><span>(50)</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /end search type -->

                <!-- search Maker -->
                <div class="search-maker">
                    <div class="search-title">
                        <h3>Search by Maker</h3>
                    </div>
                    <div class="search-maker-contents">
                        <div class="search-category">
                            <a href="#" class="mb-3">
                                <img src="{{URL::asset ('/assets/frontend/images/m_toyota.png')}}" alt="">
                                <p>Toyoda</p><span>(549)</span>
                            </a>
                            <a href="#" class="mb-3">
                                <img src="{{URL::asset ('/assets/frontend/images/m_nissan.png')}}" alt="">
                                <p>Nissan</p><span>(2,016)</span>
                            </a>
                            <a href="#" class="mb-3">
                                <img src="{{URL::asset ('/assets/frontend/images/m_mitsubishi.png')}}" alt="">
                                <p>Mitsubishi</p><span>(1,002)</span>
                            </a>
                            <a href="#" class="mb-3">
                                <img src="{{URL::asset ('/assets/frontend/images/m_honda.png')}}" alt="">
                                <p>Honda</p><span>(102)</span>
                            </a>
                            <a href="#" class="mb-3">
                                <img src="{{URL::asset ('/assets/frontend/images/m_mazda.png')}}" alt="">
                                <p>Mazda</p><span>(4,386)</span>
                            </a>
                            <a href="#" class="mb-3">
                                <img src="{{URL::asset ('/assets/frontend/images/m_subaru.png')}}" alt="">
                                <p>Subaru</p><span>(549)</span>
                            </a>
                            <a href="#" class="mb-3">
                                <img src="{{URL::asset ('/assets/frontend/images/m_suzuki.png')}}" alt="">
                                <p>Suzuki</p><span>(12)</span>
                            </a>
                            <a href="#" class="mb-3">
                                <img src="{{URL::asset ('/assets/frontend/images/m_isuzu.png')}}" alt="">
                                <p>Isuzu</p><span>(50)</span>
                            </a>
                            <a href="#" class="mb-3">
                                <img src="{{URL::asset ('/assets/frontend/images/m_daihatsu.png')}}" alt="">
                                <p>Daihatsu</p><span>(50)</span>
                            </a>
                            <a href="#" class="mb-3">
                                <img src="{{URL::asset ('/assets/frontend/images/m_hino.png')}}" alt="">
                                <p>Hino</p><span>(50)</span>
                            </a>
                            <a href="#" class="mb-3">
                                <img src="{{URL::asset ('/assets/frontend/images/m_udtrucks.png')}}" alt="">
                                <p>Ud Trucks</p><span>(50)</span>
                            </a>
                            <a href="#" class="mb-3">
                                <img src="{{URL::asset ('/assets/frontend/images/m_mercedes.png')}}" alt="">
                                <p>Mercedes benz</p><span>(50)</span>
                            </a>
                            <a href="#" class="mb-3">
                                <img src="{{URL::asset ('/assets/frontend/images/m_bmw.png')}}" alt="">
                                <p>Bmw</p><span>(50)</span>
                            </a>
                            <a href="#" class="mb-3">
                                <img src="{{URL::asset ('/assets/frontend/images/m_audi.png')}}" alt="">
                                <p>Audi</p><span>(50)</span>
                            </a>
                            <a href="#" class="mb-3">
                                <img src="{{URL::asset ('/assets/frontend/images/m_chrysler.png')}}" alt="">
                                <p>Chrysler</p><span>(50)</span>
                            </a>
                            <a href="#">
                                <img src="{{URL::asset ('/assets/frontend/images/m_volkswagen.png')}}" alt="">
                                <p>Volkswagen</p><span>(50)</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /search maker -->
            </div>
            <!-- /end left sidebar -->

            <!-- main contents -->
            <div class="main-contents">
                <div class="main-contents-title">
                    <h1>New Arriavals</h1>
                    <a href="#" class="btn btn-light waves-effect">See all</a>
                    <div class="title-border"></div>
                </div>
                <div class="contents-list mb-5">
                    <div class="car-list">
                        <a href="#" class="car-image">
                            <img src="{{URL::asset ('/assets/frontend/images/car_1.png')}}" alt="">
                            <div class="media-count">
                                <div class="image-count">
                                    <i class="fas fa-camera"></i>
                                    <span>13</span>
                                </div>
                                <div class="image-count">
                                    <i class="fas fa-video"></i>
                                    <span>1</span>
                                </div>
                            </div>
                            <div class="reserved-mark">Reserved</div>
                        </a>
                        <div class="car-desc">
                            <a href="#">
                                <h3>MITSUBISHI ROSA BUS</h3>
                            </a>
                            <p>176000 km Manual BE436F-30128</p>
                            <h3>FOB: $8,036</h3>
                        </div>
                    </div>
                    <div class="car-list">
                        <a href="#">
                            <img src="{{URL::asset ('/assets/frontend/images/car_2.png')}}" alt="">
                        </a>
                        <div class="car-desc">
                            <a href="#">
                                <h3>MITSUBISHI ROSA BUS</h3>
                            </a>
                            <p>176000 km Manual BE436F-30128</p>
                            <h3>FOB: $8,036</h3>
                        </div>
                    </div>
                    <div class="car-list">
                        <a href="#">
                            <img src="{{URL::asset ('/assets/frontend/images/car_3.png')}}" alt="">
                        </a>
                        <div class="car-desc">
                            <a href="#">
                                <h3>MITSUBISHI ROSA BUS</h3>
                            </a>
                            <p>176000 km Manual BE436F-30128</p>
                            <h3>FOB: $8,036</h3>
                        </div>
                    </div>
                    <div class="car-list">
                        <a href="#">
                            <img src="{{URL::asset ('/assets/frontend/images/car_1.png')}}" alt="">
                        </a>
                        <div class="car-desc">
                            <a href="#">
                                <h3>MITSUBISHI ROSA BUS</h3>
                            </a>
                            <p>176000 km Manual BE436F-30128</p>
                            <h3>FOB: $8,036</h3>
                        </div>
                    </div>
                    <div class="car-list">
                        <a href="#" class="car-image">
                            <img src="{{URL::asset ('/assets/frontend/images/car_1.png')}}" alt="">
                            <div class="media-count">
                                <div class="image-count">
                                    <i class="fas fa-camera"></i>
                                    <span>13</span>
                                </div>
                                <div class="image-count">
                                    <i class="fas fa-video"></i>
                                    <span>1</span>
                                </div>
                            </div>
                            <div class="reserved-mark">Reserved</div>
                        </a>
                        <div class="car-desc">
                            <a href="#">
                                <h3>MITSUBISHI ROSA BUS</h3>
                            </a>
                            <p>176000 km Manual BE436F-30128</p>
                            <h3>FOB: $8,036</h3>
                        </div>
                    </div>
                    <div class="car-list">
                        <a href="#">
                            <img src="{{URL::asset ('/assets/frontend/images/car_2.png')}}" alt="">
                        </a>
                        <div class="car-desc">
                            <a href="#">
                                <h3>MITSUBISHI ROSA BUS</h3>
                            </a>
                            <p>176000 km Manual BE436F-30128</p>
                            <h3>FOB: $8,036</h3>
                        </div>
                    </div>
                    <div class="car-list">
                        <a href="#">
                            <img src="{{URL::asset ('/assets/frontend/images/car_3.png')}}" alt="">
                        </a>
                        <div class="car-desc">
                            <a href="#">
                                <h3>MITSUBISHI ROSA BUS</h3>
                            </a>
                            <p>176000 km Manual BE436F-30128</p>
                            <h3>FOB: $8,036</h3>
                        </div>
                    </div>
                    <div class="car-list">
                        <a href="#">
                            <img src="{{URL::asset ('/assets/frontend/images/car_1.png')}}" alt="">
                        </a>
                        <div class="car-desc">
                            <a href="#">
                                <h3>MITSUBISHI ROSA BUS</h3>
                            </a>
                            <p>176000 km Manual BE436F-30128</p>
                            <h3>FOB: $8,036</h3>
                        </div>
                    </div>
                </div>
                <div class="main-contents-title">
                    <h1>Best Deals</h1>
                    <a href="#" class="btn btn-light waves-effect">See all</a>
                    <div class="title-border"></div>
                </div>
                <div class="contents-list">
                    <div class="car-list">
                        <a href="#" class="car-image">
                            <img src="{{URL::asset ('/assets/frontend/images/car_1.png')}}" alt="">
                            <div class="media-count">
                                <div class="image-count">
                                    <i class="fas fa-camera"></i>
                                    <span>13</span>
                                </div>
                                <div class="image-count">
                                    <i class="fas fa-video"></i>
                                    <span>1</span>
                                </div>
                            </div>
                            <div class="reserved-mark">Reserved</div>
                        </a>
                        <div class="car-desc">
                            <a href="#">
                                <h3>MITSUBISHI ROSA BUS</h3>
                            </a>
                            <p>176000 km Manual BE436F-30128</p>
                            <h3>FOB: $8,036</h3>
                        </div>
                    </div>
                    <div class="car-list">
                        <a href="#">
                            <img src="{{URL::asset ('/assets/frontend/images/car_2.png')}}" alt="">
                        </a>
                        <div class="car-desc">
                            <a href="#">
                                <h3>MITSUBISHI ROSA BUS</h3>
                            </a>
                            <p>176000 km Manual BE436F-30128</p>
                            <h3>FOB: $8,036</h3>
                        </div>
                    </div>
                    <div class="car-list">
                        <a href="#">
                            <img src="{{URL::asset ('/assets/frontend/images/car_3.png')}}" alt="">
                        </a>
                        <div class="car-desc">
                            <a href="#">
                                <h3>MITSUBISHI ROSA BUS</h3>
                            </a>
                            <p>176000 km Manual BE436F-30128</p>
                            <h3>FOB: $8,036</h3>
                        </div>
                    </div>
                    <div class="car-list">
                        <a href="#">
                            <img src="{{URL::asset ('/assets/frontend/images/car_1.png')}}" alt="">
                        </a>
                        <div class="car-desc">
                            <a href="#">
                                <h3>MITSUBISHI ROSA BUS</h3>
                            </a>
                            <p>176000 km Manual BE436F-30128</p>
                            <h3>FOB: $8,036</h3>
                        </div>
                    </div>
                    <div class="car-list">
                        <a href="#" class="car-image">
                            <img src="{{URL::asset ('/assets/frontend/images/car_1.png')}}" alt="">
                            <div class="media-count">
                                <div class="image-count">
                                    <i class="fas fa-camera"></i>
                                    <span>13</span>
                                </div>
                                <div class="image-count">
                                    <i class="fas fa-video"></i>
                                    <span>1</span>
                                </div>
                            </div>
                            <div class="reserved-mark">Reserved</div>
                        </a>
                        <div class="car-desc">
                            <a href="#">
                                <h3>MITSUBISHI ROSA BUS</h3>
                            </a>
                            <p>176000 km Manual BE436F-30128</p>
                            <h3>FOB: $8,036</h3>
                        </div>
                    </div>
                    <div class="car-list">
                        <a href="#">
                            <img src="{{URL::asset ('/assets/frontend/images/car_2.png')}}" alt="">
                        </a>
                        <div class="car-desc">
                            <a href="#">
                                <h3>MITSUBISHI ROSA BUS</h3>
                            </a>
                            <p>176000 km Manual BE436F-30128</p>
                            <h3>FOB: $8,036</h3>
                        </div>
                    </div>
                    <div class="car-list">
                        <a href="#">
                            <img src="{{URL::asset ('/assets/frontend/images/car_3.png')}}" alt="">
                        </a>
                        <div class="car-desc">
                            <a href="#">
                                <h3>MITSUBISHI ROSA BUS</h3>
                            </a>
                            <p>176000 km Manual BE436F-30128</p>
                            <h3>FOB: $8,036</h3>
                        </div>
                    </div>
                    <div class="car-list">
                        <a href="#">
                            <img src="{{URL::asset ('/assets/frontend/images/car_1.png')}}" alt="">
                        </a>
                        <div class="car-desc">
                            <a href="#">
                                <h3>MITSUBISHI ROSA BUS</h3>
                            </a>
                            <p>176000 km Manual BE436F-30128</p>
                            <h3>FOB: $8,036</h3>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /end main contents -->
        </div>
    </div>
<!-- modal section -->
<!--  advanced search modal -->
<div class="modal fade advanced-seach-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Large modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Cras mattis consectetur purus sit amet fermentum.
                    Cras justo odio, dapibus ac facilisis in,
                    egestas eget quam. Morbi leo risus, porta ac
                    consectetur ac, vestibulum at eros.</p>
                <p>Praesent commodo cursus magna, vel scelerisque
                    nisl consectetur et. Vivamus sagittis lacus vel
                    augue laoreet rutrum faucibus dolor auctor.</p>
                <p class="mb-0">Aenean lacinia bibendum nulla sed consectetur.
                    Praesent commodo cursus magna, vel scelerisque
                    nisl consectetur et. Donec sed odio dui. Donec
                    ullamcorper nulla non metus auctor
                    fringilla.</p>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- JAVASCRIPT -->
<script src="{{ URL::asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap/bootstrap.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.car-list').eq(3).css("margin-right", 0);
        $('.car-list').eq(7).css("margin-right", 0);
        $('.car-list').eq(11).css("margin-right", 0);
        $('.car-list').eq(15).css("margin-right", 0);
    });
</script>
</body>
</html>