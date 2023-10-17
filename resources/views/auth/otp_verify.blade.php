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
        <title>{{ setting('app_name') }}</title>
        
        <!-- Stylesheets -->
        <link rel="stylesheet" href="{{ asset('frontend/vendor/swiper/swiper-bundle.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}">

        <!-- Toast -->
        <link rel="stylesheet" type="text/css" href="{{ asset('toast/jquery.toast.css') }}">
        
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@300&display=swap" rel="stylesheet">
        <style type="text/css">
            body, h1,h4,.jq-toast-single  {
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
                        <div class="bg-image bg-image-overlay" style="background-image: url({{ asset('uploads/auth/'.setting('signin_avatar')) }});"></div>
                        <div class="join-area">
                            <div class="started">
                                <h4 class="title">OTP sent to {{ $email }}</h4>
                            </div>
                            @if(Session::has('error'))
                                <div id="toast" hidden>
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                            @if(Session::has('success'))
                                <div id="toast" hidden>
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <form action="{{ route('submit-otp-verify') }}" method="post">
                                @csrf
                                <div method="get" id="otp" class="digit-group" data-group-name="digits" data-autosubmit="false" autocomplete="off">
                                    <input class="form-control" type="text" id="digit-2" name="digit-2" placeholder="-" data-next="digit-3" data-previous="digit-1" />
                                    <input class="form-control" type="text" id="digit-3" name="digit-3" placeholder="-" data-next="digit-4" data-previous="digit-2" />
                                    <input class="form-control" type="text" id="digit-4" name="digit-4" placeholder="-" data-next="digit-5" data-previous="digit-3" />
                                    <input class="form-control" type="text" id="digit-5" name="digit-5" placeholder="-" data-next="digit-6" data-previous="digit-4" />
                                </div>
                                    <div class="seprate-box mb-3">
                                    <!-- <a href="register.html" class="back-btn">
                                        <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.40366 8L9.91646 2.58333L7.83313 0.499999L0.333132 8L7.83313 15.5L9.91644 13.4167L4.40366 8Z" fill="white"/>
                                        </svg>
                                    </a> -->
                                    <button type="submit" class="btn btn-primary btn-block">NEXT</button>
                                </div>                
                            </form>
                            <div class="d-flex align-items-center justify-content-center">
                                <a href="javascript:void(0);" class="text-light text-center d-block">Don’t you recevied any code?</a>
                                <a href="{{ route('resend-otp') }}" class="btn-link d-block ms-2 text-underline">Resend</a>
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
        <script src='{{ asset("toast/jquery.toast.js") }}'></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("form").submit(function(){
                    var digit2 = $.trim($("#digit-2").val());
                    var digit3 = $.trim($("#digit-3").val());
                    var digit4 = $.trim($("#digit-4").val());
                    var digit5 = $.trim($("#digit-5").val());

                    if(digit2 == "" || digit3 == "" || digit4 == "" || digit5 == "") {
                        toast_popup("Enter 4 digit OTP");
                        return false;
                    }
                });
                if($("#toast").length) {
                    toast_popup($("#toast").text());
                }
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