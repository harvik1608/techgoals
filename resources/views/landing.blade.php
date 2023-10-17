<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
		<title>My Shop</title>
		<style>
			.cover {
				background-color: #4e73df !important;
			}
			.btn-primary, .btn-success {
				background-color: #4e73df !important;
				border-color: #4e73df !important;
			}
			.error {
				color: #FF0000;
			}
		</style>
	</head>
	<body>
		<section class="material-half-bg">
			<div class="cover"></div>
		</section>
		<section class="login-content">
			<div class="logo">
				<h1>My Shop</h1>
			</div>
			<div class="login-box">
				<form class="login-form" action="{{ route('login') }}" method="post">
					@csrf
					<h3 class="login-head"><i class="bi bi-person me-2"></i>SIGN IN</h3>
					<div class="mb-3">
						<label class="form-label">Email</label>
						<input class="form-control" type="text" placeholder="Email" name="email" value="{{ old('email') }}" autofocus />
						@error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="mb-3">
						<label class="form-label">Password</label>
						<input class="form-control" type="password" placeholder="Password" name="password" />
						@error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="mb-3 btn-container d-grid">
						<button class="btn btn-primary btn-block">
							<i class="bi bi-box-arrow-in-right me-2 fs-5"></i> SIGN IN
						</button>
					</div>
				</form>
			</div>
		</section>
		<script src="{{ asset('assets/js/jquery-3.7.0.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets/js/main.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.validate.js') }}"></script>
		<script src="{{ asset('assets/js/additional_methods.js') }}"></script>
		<script>
			$(document).ready(function(){
				$(".login-form").validate({
					rules:{
						email:{
							required: true
						},
						password:{
							required: true
						}
					},
					messages:{
						email:{
							required: "<small class='error'>Email is required</small>"
						},
						password:{
							required: "<small class='error'>Password is required</small>"
						}
					}
				});
			});
		</script>
	</body>
</html>