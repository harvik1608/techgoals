<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ get_setting_val('app_name') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">

        <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/animate.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/bootstrap-submenu.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/bootstrap-select.min.css') }}">
        <link rel="stylesheet" href="{{ asset('auth/css/leaflet.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('auth/css/map.css') }}" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{ asset('auth/fonts/font-awesome/css/font-awesome.min.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('auth/fonts/bootstrap-icons/bootstrap-icons.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('auth/fonts/flaticon/font/flaticon.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('auth/fonts/linearicons/style.css') }}">
        <link rel="stylesheet" type="text/css"  href="{{ asset('auth/css/jquery.mCustomScrollbar.css') }}">
        <link rel="stylesheet" type="text/css"  href="{{ asset('auth/css/dropzone.css') }}">
        <link rel="stylesheet" type="text/css"  href="{{ asset('auth/css/slick.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/initial.css') }}">
        <link rel="stylesheet" type="text/css" id="style_sheet" href="{{ asset('auth/css/skins/default.css') }}">
        <link rel="shortcut icon" href="{{ asset('images/s-favican.png') }}" type="image/x-icon" >
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPlayfair+Display:400,700%7CRoboto:100,300,400,400i,500,700">
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@100;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/ie10-viewport-bug-workaround.css') }}">
        <script src="{{ asset('auth/js/ie-emulation-modes-warning.js') }}"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/toast/jquery.toast.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@300&display=swap" rel="stylesheet">
        <style type="text/css">
            body, .jq-toast-single, canvas {
                font-family: 'Readex Pro', sans-serif !important;
            }
            button[type=submit] {
                background-color: #000;
            }
            input[name=username] {
                opacity: 0.5 !important;
            }
            .btn-theme {
                background-color: #000;
            }
            .login-section .bg-img:before {
                background: unset !important;
            }
            .bg-img {
                background: url('https://waytohealthcare.com/manage/backend/auth/banner.jpg') !important;
            }
            .form-section {
                background-color: #fff !important;
            }
            input {
                border: 1px solid #efefef !important;
            }
            select,textarea {
                border: 1px solid #f1f1f1 !important;
            }
            div.scroll {
                width: 600px;
                height: 550px;
                overflow-x: hidden;
                overflow-y: auto;
                text-align: center;
                padding: 20px;
            }
            div.scroll::-webkit-scrollbar {
                 background: #f1f1f1;
            }
            div.scroll::-webkit-scrollbar-thumb {
                background-color: #f1f1f1;    /* color of the scroll thumb */
                border-radius: 20px;       /* roundness of the scroll thumb */
                border: 3px solid #fff;  /* creates padding around scroll thumb */
            }
            .error {
                color: #FF0000;
                font-weight: bold;
                float: left;
            }
            .no-show {
                display: none;
            }
        </style>
    </head>
    <body>
        <div class="page_loader"></div>
        <div class="login-section">
            <div class="container-fluid">
                <div class="row login-box">
                    <div class="col-lg-6 pad-0 none-992 bg-img">
                        <div class="info clearfix">
                            <!-- <h1>< ?php echo $title_name; ?></h1>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type unknown printer took a galley of type and scrambled </p> -->
                        </div>
                    </div>
                    <div class="col-lg-6 align-self-center pad-0 form-section">
                        <div class="form-inner scroll">
                            <a href="" class="">
                                <img src="{{ asset('uploads/'.get_setting_val('app_logo')) }}" alt="logo">
                            </a><br><br><br><br><br><br>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12" id="step1">
                                        <label>Phone No.*</label>
                                        <div class="form-group clearfix">
                                            <input name="phone" id="phone" type="number" class="form-control" placeholder="Your phone no." />
                                        </div>
                                    </div>
                                    <div class="col-lg-12 no-show" id="step2">
                                        <label>OTP *</label>
                                        <div class="form-group clearfix">
                                            <input name="otp" id="otp" type="number" class="form-control" placeholder="Your OTP" required />
                                            <small id="otp-error" class="error"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <button type="button" class="btn-md btn-theme w-100" id="step-btn" data-step="1/3">Next</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('auth/js/jquery.min.js') }}"></script>
        <script src="{{ asset('auth/js/popper.min.js') }}"></script>
        <script src="{{ asset('auth/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('auth/js/bootstrap-submenu.js') }}"></script>
        <script src="{{ asset('auth/js/rangeslider.js') }}"></script>
        <script src="{{ asset('auth/js/jquery.mb.YTPlayer.js') }}"></script>
        <script src="{{ asset('auth/js/wow.min.js') }}"></script>
        <script src="{{ asset('auth/js/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('auth/js/jquery.easing.1.3.js') }}"></script>
        <script src="{{ asset('auth/js/jquery.scrollUp.js') }}"></script>
        <script src="{{ asset('auth/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <script src="{{ asset('auth/js/leaflet.js') }}"></script>
        <script src="{{ asset('auth/js/leaflet-providers.js') }}"></script>
        <script src="{{ asset('auth/js/leaflet.markercluster.js') }}"></script>
        <script src="{{ asset('auth/js/dropzone.js') }}"></script>
        <script src="{{ asset('auth/js/slick.min.js') }}"></script>
        <script src="{{ asset('auth/js/jquery.filterizr.js') }}"></script>
        <script src="{{ asset('auth/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('auth/js/jquery.countdown.js') }}"></script>
        <script src="{{ asset('auth/js/maps.js') }}"></script>
        <script src="{{ asset('auth/js/sidebar.js') }}"></script>
        <script src="{{ asset('auth/js/app.js') }}"></script>
        <script src="{{ asset('auth/js/ie10-viewport-bug-workaround.js') }}"></script>
        <script src='{{ asset("assets/toast/jquery.toast.js") }}'></script>
        <script>
            $(document).ready(function(){
                $(document).on("click","#step-btn",function(){
                    if($("#step1").is(":visible")){
                        if($.trim($("#phone").val()) == '') {
                            toast("Please enter your phone no.");
                        } else if($.trim($("#phone").val()).length != 10) {
                            toast("Only 10 digits allow in phone no.");
                        } else {
                            $.ajax({
                                url: "{{ route('send-otp') }}",
                                type: "post",
                                data:{
                                    phone: $("#phone").val()
                                },
                                beforeSend:function(){
                                    $("#step-btn").html("SENDING").attr("disabled",true);
                                },
                                success:function(response){
                                    alert(response);
                                }
                            });
                            // $("#step1").hide(500);
                            // $("#step2").show(500);
                        }
                    } 
                });
            })
            function toast(message)
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
