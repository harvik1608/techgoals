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

        <!-- Toast -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/toast/jquery.toast.css') }}">
        
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@300&display=swap" rel="stylesheet">
        <style type="text/css">
            body, h1,.jq-toast-single  {
                font-family: 'Readex Pro', sans-serif !important;
            }
            .input-group-icon .form-control {
                font-weight: 400 !important;
            }
            select, input[type="date"] {
                font-size: 0.9rem !important;
            }
            #section-2, #section-3, #section-4, #section-5 {
                display: none;
            }
        </style>
    </head>   
    <body class="gradiant-bg">
        <div class="page-wraper">
            <div id="preloader">
                <div class="spinner"></div>
            </div>
            <div class="content-body">
                <div class="container vh-100">
                    <div class="welcome-area">
                        <div class="bg-image bg-image-overlay" style="background-image: url({{ asset('frontend/'.get_setting_val('banner')) }});"></div>
                        <div class="join-area">
                            <div class="started">
                                <h1 class="title">Sign Up - {{ get_setting_val('app_name') }}</h1>
                                <p>.</p>
                            </div>
                            <form method="POST" action="{{ route('register') }}" autocomplete="off">
                                @csrf
                                <div id="section-1">
                                    <div class="mb-3">
                                        <input type="text" id="name" class="form-control" name="name" placeholder="Your name" autofocus />
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 input-group input-group-icon">
                                        <input type="text" id="email" class="form-control" name="email" placeholder="Your email" />
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 input-group input-group-icon">
                                        <input type="password" id="password" class="form-control" name="password" placeholder="Your password" />
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-block mb-3">SUBMIT</button>
                            </form>
                            <div class="d-flex align-items-center justify-content-center">
                                <a href="javascript:void(0);" class="text-light text-center d-block">Already have an account?</a>
                                <a href="{{ route('login') }}" class="btn-link d-block ms-3 text-underline">Sign In Here</a>
                            </div>
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
        <script src='{{ asset("frontend/toast/jquery.toast.js") }}'></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("form").submit(function(){
                    var name = $.trim($("#name").val());
                    var email = $.trim($("#email").val());
                    var password = $.trim($("#password").val());
                    var valid_name = /^[A-Za-z\s]+$/;
                    var valid_email = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

                    if(name == "") {
                        toast_popup("Enter your name");
                        $("#name").focus();
                        return false;
                    } else if(!valid_name.test(name)) {
                        toast_popup("Enter valid name");
                        $("#name").focus();
                        return false;
                    }

                    if(email == "") {
                        toast_popup("Enter your email");
                        $("#email").focus();
                        return false;
                    } else if(!valid_email.test(email)) {
                        toast_popup("Enter valid email");
                        $("#email").focus();
                        return false;
                    }

                    if(password == "") {
                        toast_popup("Enter your password");
                        $("#password").focus();
                        return false;
                    } else if(password.length < 8) {
                        toast_popup("Password must be 8 characters long");
                        $("#password").focus();
                        return false;
                    }
                });
            });
            function toast_popup(message)
            {
                $.toast({
                    text: message,
                    position: 'bottom-center',
                    stack: false
                });
            }
        </script>
    </body>
</html>