<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{ get_setting_val('app_name') }}</title>

        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/backend-plugin.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/backend.css') }}?v=1.0.0">  
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@300&display=swap" rel="stylesheet">
        <style>
            body, .jq-toast-single {
                font-family: 'Readex Pro', sans-serif !important;
            }
            .error {
                color: #FF0000;
            }
        </style>
    </head>
    <body>
        <div id="loading">
            <div id="loading-center">
            </div>
        </div>
        <div class="wrapper">
            <section class="login-content">
                <div class="container h-100">
                    <div class="row align-items-center justify-content-center h-100">
                       <div class="col-md-5">
                          <div class="card p-3">
                             <div class="card-body">
                                <div class="auth-logo">
                                   <img src="{{ asset('uploads/'.get_setting_val('app_logo')) }}" class="img-fluid  rounded-normal  darkmode-logo" alt="logo">
                                   <img src="{{ asset('uploads/'.get_setting_val('app_logo')) }}" class="img-fluid rounded-normal light-logo" alt="logo">
                                </div>
                                <h3 class="mb-3 font-weight-bold text-center">Sign In</h3>
                                <p class="text-center text-secondary mb-4">Log in to your account to continue</p>
                                <form action="{{ route('login') }}" method="post">
                                    @csrf
                                   <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="text-secondary">Email</label>
                                                <input class="form-control" type="email" placeholder="Enter Email" name="email" />
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-2">
                                            <div class="form-group">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label class="text-secondary">Password</label>
                                                    <label><a href="auth-recover-pwd.html">Forgot Password?</a></label>
                                                </div>
                                                <input class="form-control" type="password" placeholder="Enter Password" name="password" />
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                   <button type="submit" class="btn btn-primary btn-block mt-2">SUBMIT</button>
                                   <div class="col-lg-12 mt-3">
                                        <p class="mb-0 text-center">Powered by Creditline India</p>
                                   </div>
                                </form>
                             </div>
                          </div>
                       </div>
                    </div>
                </div>
            </section>
        </div>
        <script src="{{ asset('assets/js/backend-bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/customizer.js') }}"></script>
        <script src="{{ asset('assets/js/sidebar.js') }}"></script>
        <script src="{{ asset('assets/js/flex-tree.min.js') }}"></script>
        <script src="{{ asset('assets/js/tree.js') }}"></script>
        <script src="{{ asset('assets/js/table-treeview.js') }}"></script>
        <script src="{{ asset('assets/js/sweetalert.js') }}"></script>
        <script src="{{ asset('assets/js/vector-map-custom.js') }}"></script>
        <script src="{{ asset('assets/js/chart-custom.js') }}"></script>
        <script src="{{ asset('assets/js/charts/01.js') }}"></script>
        <script src="{{ asset('assets/js/charts/02.js') }}"></script>
        <script src="{{ asset('assets/js/slider.js') }}"></script>
        <script src="{{ asset('assets/vendor/emoji-picker-element/index.js') }}" type="module"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.validate.js') }}"></script>
        <script src="{{ asset('assets/js/additional_methods.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("form").validate({
                    rules:{
                        email: {
                            required: true
                        },
                        password:{
                            required: true
                        }
                    },
                    messages:{
                        email: {
                            required: "<small class='error'>Email is required</small>"
                        },
                        password:{
                            required: "<small class='error'>Password is required</small>"
                        }
                    }
                })
            });
        </script>
    </body>
</html>