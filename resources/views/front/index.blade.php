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
    <link href="https://fonts.cdnfonts.com/css/electrolux-sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Electrolize&display=swap" rel="stylesheet">
    <link href="{{ URL::asset('/assets/frontend/css/style.css?v1.2') }}" rel="stylesheet" type="text/css" />
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
                    <span>Whatsapp:</span>
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
                                <p>Bus</p><span>(549)</span>
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
                <!-- new arrivals -->
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
                <!-- /end new arrivals -->

                <!-- Best Deals -->
                <div class="main-contents-title">
                    <h1>Best Deals</h1>
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
                <!-- /end Best Deals -->
                
                <!-- customer voice -->
                <div class="main-contents-title">
                    <h1>Customer's Voice</h1>
                    <a href="#" class="btn btn-light waves-effect">List of customer's voice</a>
                    <div class="title-border"></div>
                </div>
                <div class="customer-vocie">
                    <div class="customer-list">
                        <img src="{{URL::asset ('/assets/frontend/images/v_1.png')}}" alt="">
                        <div class="customer-text">
                            <h3>TOYOTA RACTIS</h3>
                        </div>
                        <div class="overlay">
                            <div class="overlay-text">
                                <a href="#"><h3>TOYOTA RACTIS</h3></a>
                                <div class="overlay-border"></div>
                                <p>We have been in the vehicle trading business for over 15 years in Japan.</p>
                            </div>
                        </div>
                    </div>
                    <div class="customer-list">
                        <img src="{{URL::asset ('/assets/frontend/images/v_1.png')}}" alt="">
                        <div class="customer-text">
                            <h3>TOYOTA RACTIS</h3>
                        </div>
                        <div class="overlay">
                            <div class="overlay-text">
                                <a href="#"><h3>TOYOTA RACTIS</h3></a>
                                <div class="overlay-border"></div>
                                <p>We have been in the vehicle trading business for over 15 years in Japan.</p>
                            </div>
                        </div>
                    </div>
                    <div class="customer-list">
                        <img src="{{URL::asset ('/assets/frontend/images/v_1.png')}}" alt="">
                        <div class="customer-text">
                            <h3>TOYOTA RACTIS</h3>
                        </div>
                        <div class="overlay">
                            <div class="overlay-text">
                                <a href="#"><h3>TOYOTA RACTIS</h3></a>
                                <div class="overlay-border"></div>
                                <p>We have been in the vehicle trading business for over 15 years in Japan.</p>
                            </div>
                        </div>
                    </div>
                    <div class="customer-list">
                        <img src="{{URL::asset ('/assets/frontend/images/v_1.png')}}" alt="">
                        <div class="customer-text">
                            <h3>TOYOTA RACTIS</h3>
                        </div>
                        <div class="overlay">
                            <div class="overlay-text">
                                <a href="#"><h3>TOYOTA RACTIS</h3></a>
                                <div class="overlay-border"></div>
                                <p>We have been in the vehicle trading business for over 15 years in Japan.</p>
                            </div>
                        </div>
                    </div>
                    <div class="customer-list">
                        <img src="{{URL::asset ('/assets/frontend/images/v_1.png')}}" alt="">
                        <div class="customer-text">
                            <h3>TOYOTA RACTIS</h3>
                        </div>
                        <div class="overlay">
                            <div class="overlay-text">
                                <a href="#"><h3>TOYOTA RACTIS</h3></a>
                                <div class="overlay-border"></div>
                                <p>We have been in the vehicle trading business for over 15 years in Japan.</p>
                            </div>
                        </div>
                    </div>
                    <div class="customer-list">
                        <img src="{{URL::asset ('/assets/frontend/images/v_1.png')}}" alt="">
                        <div class="customer-text">
                            <h3>TOYOTA RACTIS</h3>
                        </div>
                        <div class="overlay">
                            <div class="overlay-text">
                                <a href="#"><h3>TOYOTA RACTIS</h3></a>
                                <div class="overlay-border"></div>
                                <p>We have been in the vehicle trading business for over 15 years in Japan.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /end customer voice -->`
            </div>
            <!-- /end main contents -->

            <!-- right sidebar -->
            <div class="right-sidebar">
                <div class="news-box mb-2">
                    <a href="#">
                        <img src="{{URL::asset ('/assets/frontend/images/news_clearange.png')}}" alt="">
                    </a>
                </div>
                <div class="news-box mb-2">
                    <a href="#">
                        <img src="{{URL::asset ('/assets/frontend/images/news_shipping.png')}}" alt="">
                    </a>
                </div>
                <div class="news-box mb-2">
                    <a href="#">
                        <img src="{{URL::asset ('/assets/frontend/images/nes_arrivel.png')}}" alt="">
                    </a>
                </div>
            </div>
            <!-- /end rightsidebar -->
        </div>
    </div>
    <!-- footer section -->
    <div class="footer">
        <div class="footer-warpper">
            <div class="footer-logo">
                <a href="#"><img src="{{URL::asset ('/assets/frontend/images/logo.png')}}" alt="" width="174"></a>
                <p>We believe in offering you the best customer service possible. We have been in the vehicle trading business for over 15 years in Japan. Our new company, established in 2011, is even better equipped to provide you with your dream vehicle. We offer you 24hour prompt and reliable service. We will also help you to find the best customised solution to meet your specific needs.</p>
                <div class="footer-social">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="footer-menu">
                <h3>Quick Link</h3>
                <div class="footer-menu-list">
                    <div class="left-menu">
                        <a href="#">Home</a>
                        <a href="#">Stock</a>
                        <a href="#">Company</a>
                        <a href="#">Payment</a>
                    </div>
                    <div class="right-menu">
                        <a href="#">News</a>
                        <a href="#">Agents</a>
                        <a href="#">Gallery</a>
                        <a href="#">Contact Us</a>
                    </div>
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
                                  <p>nfo@sakuramotors.com</p>
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
<!-- modal section -->
<!--  advanced search modal -->
<div class="modal fade advanced-seach-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content advanced-content"> 
            <div class="modal-header advanced-header">
                <h5 class="modal-title" id="myLargeModalLabel">Advanced Search</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body advanced-body">
                <form action="">
                    <div class="form-wrapper row">
                        <div class="col-md-6">
                            <div class="search-wrapper mb-4">
                                <h3>Search by Free Keywords</h3>
                                <input type="text" class="form-control">
                                <p class="mt-2">*Ref No., Maker, Model, Model Code, Chassis, Grade</p>
                            </div>
                            <div class="search-wrapper">
                                <div class="custom-from-check">
                                    <label class="form-check-label" for="noInfo">
                                        Without Add Info
                                    </label>
                                    <input class="form-check-input" type="checkbox" id="noInfo">
                                </div>
                                <div class="custom-from-check">
                                    <label class="form-check-label" for="newArr">
                                        New Arrivals
                                    </label>
                                    <input class="form-check-input" type="checkbox" id="newArr">
                                </div>
                            </div>
                            <h3 class="spec-title">SpeCifications</h3>
                            <div class=specification-list>
                                <div class="spec-left mb-1">
                                    <label for="">Mileage</label>
                                </div>
                                <div class="spec-right mb-1">
                                    <div class="spec-select">
                                        <select class="form-select">
                                            <option selected>Any</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="spec-select">
                                        <select class="form-select">
                                            <option selected>Any</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="spec-left mb-1">
                                    <label for="">Fuel</label>
                                </div>
                                <div class="spec-right mb-1">
                                    <div class="spec-select spec-fuel">
                                        <select class="form-select">
                                            <option selected>Any</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="spec-left mb-1">
                                    <label for="">Trans</label>
                                </div>
                                <div class="spec-right mb-1">
                                    <div class="custom-from-check">
                                        <input class="form-check-input" type="checkbox" id="at">
                                        <label class="form-check-label" for="at">AT</label>
                                    </div>
                                    <div class="custom-from-check">
                                        <input class="form-check-input" type="checkbox" id="mt">
                                        <label class="form-check-label" for="mt">MT</label>
                                    </div>
                                    <div class="custom-from-check">
                                        <input class="form-check-input" type="checkbox" id="at-semi">
                                        <label class="form-check-label" for="at-semi">AT(semi)</label>
                                    </div>
                                    <div class="custom-from-check">
                                        <input class="form-check-input" type="checkbox" id="others">
                                        <label class="form-check-label" for="others">Others</label>
                                    </div>
                                </div>
                                <div class="spec-left mb-1">
                                    <label for="">Doors</label>
                                </div>
                                <div class="spec-right mb-1">
                                    <div class="custom-from-check">
                                        <input class="form-check-input" type="checkbox" id="d-two">
                                        <label class="form-check-label" for="d-two">2</label>
                                    </div>
                                    <div class="custom-from-check">
                                        <input class="form-check-input" type="checkbox" id="d-three">
                                        <label class="form-check-label" for="d-three">3</label>
                                    </div>
                                    <div class="custom-from-check">
                                        <input class="form-check-input" type="checkbox" id="d-four">
                                        <label class="form-check-label" for="d-four">4</label>
                                    </div>
                                    <div class="custom-from-check">
                                        <input class="form-check-input" type="checkbox" id="d-five">
                                        <label class="form-check-label" for="d-five">5</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="search-wrapper mb-4">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="custom-lavel lavel-s">
                                            <lavel>Maker:</lavel>
                                        </div>
                                        <div class="custom-select select-s mb-2">
                                            <select class="form-select">
                                                <option selected>Any</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <div class="custom-lavel lavel-s">
                                            <lavel>Model:</lavel>
                                        </div>
                                        <div class="custom-select select-s mb-2">
                                            <select class="form-select">
                                                <option selected>Any</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <div class="custom-lavel lavel-s">
                                            <lavel>Type:</lavel>
                                        </div>
                                        <div class="custom-select select-s mb-2">
                                            <select class="form-select">
                                                <option selected>Any</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="custom-lavel lavel-m">
                                            <lavel>Year:</lavel>
                                        </div>
                                        <div class="custom-select select-m mb-2">
                                            <div class="left-select-m">
                                                <select class="form-select ">
                                                    <option selected>Any</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                            <div class="right-select-m">
                                                <select class="form-select ">
                                                    <option selected>Any</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="custom-lavel lavel-m">
                                            <lavel>Price:</lavel>
                                        </div>
                                        <div class="custom-select select-m mb-2">
                                            <div class="left-select-m">
                                                <select class="form-select ">
                                                    <option selected>Any</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                            <div class="right-select-m">
                                                <select class="form-select ">
                                                    <option selected>Any</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=specification-list>
                                <div class="spec-left mb-1">
                                    <label for="">Engine Code</label>
                                </div>
                                <div class="spec-right mb-1">
                                    <input type="text" class="form-control form-control-sm">
                                </div>
                                <div class="spec-left mb-1">
                                    <label for="">Engine Size</label>
                                </div>
                                <div class="spec-right mb-1">
                                    <div class="spec-select">
                                        <select class="form-select">
                                            <option selected>Any</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="spec-select">
                                        <select class="form-select">
                                            <option selected>Any</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="spec-left mb-1">
                                    <label for="">Drive Type</label>
                                </div>
                                <div class="spec-right mb-1">
                                    <div class="custom-from-check">
                                        <input class="form-check-input" type="checkbox" id="2wd">
                                        <label class="form-check-label" for="2wd">2WD</label>
                                    </div>
                                    <div class="custom-from-check">
                                        <input class="form-check-input" type="checkbox" id="4wd">
                                        <label class="form-check-label" for="4wd">4WD</label>
                                    </div>
                                    <div class="custom-from-check">
                                        <input class="form-check-input" type="checkbox" id="w-others">
                                        <label class="form-check-label" for="w-others">Others</label>
                                    </div>
                                </div>
                                <div class="spec-left mb-1">
                                    <label for="">Seats</label>
                                </div>
                                <div class="spec-right mb-1">
                                    <div class="spec-select">
                                        <select class="form-select">
                                            <option selected>Any</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="spec-select">
                                        <select class="form-select">
                                            <option selected>Any</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="spec-left mb-1">
                                    <label for="">Steering</label>
                                </div>
                                <div class="spec-right mb-1">
                                    <div class="custom-from-check">
                                        <input class="form-check-input" type="checkbox" id="right">
                                        <label class="form-check-label" for="right">Right</label>
                                    </div>
                                    <div class="custom-from-check">
                                        <input class="form-check-input" type="checkbox" id="left">
                                        <label class="form-check-label" for="left">Left</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-submit">
                            <button type="submit" class="btn btn-danger btn-rounded waves-effect waves-light">
                                <span>Search </span>
                                <i class="dripicons-arrow-thin-right"></i>
                            </button>
                        </div>
                    </div>
                </form>
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
        $('.customer-list').eq(2).css("margin-right", 0);
        $('.customer-list').eq(5).css("margin-right", 0);
    });
</script>
</body>
</html>