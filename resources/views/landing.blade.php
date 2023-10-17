<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">
        <meta name="theme-color" content="#2196f3">
        <meta name="author" content="" /> 
        <meta name="keywords" content="" /> 
        <meta name="robots" content="" /> 
        <meta name="description" content=""/>
        <meta property="og:title" content="" />
        <meta property="og:description" content="" />
        <meta property="og:image" content="error.html"/>
        <meta name="format-detection" content="telephone=no">

        <!-- Favicons Icon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/images/favicon.png') }}" />
        
        <!-- Title -->
        <title>{{ get_setting_val('app_name') }}</title>
        
        <!-- Stylesheets -->
        <link rel="stylesheet" href="{{ asset('frontend/vendor/swiper/swiper-bundle.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}">
        
         <!-- Animte -->
        <link rel="stylesheet" href="{{ asset('frontend/vendor/wow/css/libs/animate.css') }}">
        
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@300&display=swap" rel="stylesheet">
        <style type="text/css">
            body, h1 {
                font-family: 'Readex Pro', sans-serif !important;
            }
        </style>
    </head>   
    <body class="gradiant-bg">
        <div class="page-wraper">
            <div class="loader-screen" id="splashscreen">
                <div class="main-screen">
                    <div class="circle-2"></div>
                    <div class="circle-3"></div>
                    <div class="circle-4"></div>
                    <div class="circle-5"></div>
                    <div class="circle-6"></div>
                    <div class="brand-logo">
                        <div class="logo">
                            <img src="{{ asset('frontend/images/vector.svg') }}" alt="spoon-1" class="wow bounceInDown">
                        </div>
                    </div>
                </div>                                        
            </div>        
            <div class="content-body">
                <div class="container vh-100">
                    <div class="welcome-area">
                        <div class="bg-image bg-image-overlay" style="background-image: url({{ asset('frontend/'.get_setting_val('banner')) }});"></div>
                        <div class="join-area">
                            <div class="swiper-container get-started">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="started">
                                            <h1 class="title">Welcome to {{ get_setting_val('app_name') }}</h1>
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="started">
                                            <h1 class="title">Welcome to {{ get_setting_val('app_name') }}</h1>
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="started">
                                            <h1 class="title">Welcome to {{ get_setting_val('app_name') }}</h1>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-btn">
                                <div class="swiper-pagination style-1 flex-1"></div>
                            </div>
                            <a href="{{ url('register') }}" class="btn btn-primary btn-block mb-3">CREATE ACCOUNT</a>
                            <a href="{{ url('login') }}" class="btn btn-light btn-block mb-3">SIGN IN</a>
                            <a href="forgot-password.html" class="text-light text-center d-block">Forgot your account?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src='{{ asset("frontend/js/jquery.js") }}'></script>
        <script src='{{ asset("frontend/vendor/bootstrap/js/bootstrap.bundle.min.js") }}'></script>
        <script src='{{ asset("frontend/vendor/wow/dist/wow.min.js") }}'></script>
        <script src='{{ asset("frontend/vendor/swiper/swiper-bundle.min.js") }}'></script>
        <script src='{{ asset("frontend/js/dz.carousel.js") }}'></script>
        <script src='{{ asset("frontend/js/settings.js") }}'></script>
        <script src='{{ asset("frontend/js/custom.js") }}'></script>
        <script>
            new WOW().init();
            
            var wow = new WOW(
            {
              boxClass:     'wow',      // animated element css class (default is wow)
              animateClass: 'animated', // animation css class (default is animated)
              offset:       50,          // distance to the element when triggering the animation (default is 0)
              mobile:       false       // trigger animations on mobile devices (true is default)
            });
            wow.init(); 
        </script>
    </body>
</html>