<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="description" content="">
		<title>My Shop</title>
		<meta charset="utf-8">
		<meta csrf="csrf-token" content="{{ csrf_token() }}">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
		<!-- Toast -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/toast/jquery.toast.css') }}">

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@300&display=swap" rel="stylesheet">
		<style type="text/css">
			body, .jq-toast-single, canvas {
				font-family: 'Readex Pro', sans-serif !important;
			}
			.error-text {
				color: #FF0000;
			}
			a {
				text-decoration: none !important;
			}
			.app-header, .widget-small.primary.coloured-icon .icon, .app-header__logo {
				background-color: #4e73df !important;
			}
			.app-menu__item.active, .app-menu__item:hover {
				border-left-color: #4e73df;
			}
			.btn-primary, .btn-success {
				background-color: #4e73df !important;
				border-color: #4e73df !important;
			}
			.form-control:focus {
				border-color: #4e73df;
			}
			.bi {
		        margin-right: 0px !important;
		    }
		    .error {
		    	color: #FF0000;
		    }
		</style>
		<script src="{{ asset('assets/js/jquery-3.7.0.min.js') }}"></script>
	</head>
	<body class="app sidebar-mini">
		<header class="app-header">
			<!-- <p>Welcome {{ auth()->user()->name}}</p> -->
			<a class="app-header__logo" href="{{ url('home') }}">My Shop</a>
			<a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
			<ul class="app-nav">
				<li class="dropdown"><a class="app-nav__item" href="#" data-bs-toggle="dropdown" aria-label="Show notifications"><i class="bi bi-bell fs-5"></i></a></li>
				<li class="dropdown"><a class="app-nav__item" href="#" data-bs-toggle="dropdown" aria-label="Open Profile Menu"><i class="bi bi-person fs-4"></i></a>
					<ul class="dropdown-menu settings-menu dropdown-menu-right">
						<li>
							<form method="post" action="{{ url('logout') }}">
								@csrf
								<button class="dropdown-item">
									<i class="bi bi-box-arrow-right me-2 fs-5"></i> Logout
								</button>
							</form>
						</li>
					</ul>
				</li>
			</ul>
		</header>
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar">
			<div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://randomuser.me/api/portraits/men/1.jpg" alt="User Image">
				<div>
					<p class="app-sidebar__user-name">{{ auth()->user()->name }}</p>
					<p class="app-sidebar__user-designation">{{ auth()->user()->email }}</p>
				</div>
			</div>
			<ul class="app-menu">
				<li>
					<a class="app-menu__item" href="{{ url('home') }}">
						<i class="app-menu__icon bi bi-bank"></i>
						<span class="app-menu__label">Dashboard</span>
					</a>
				</li>
				<li>
					<a class="app-menu__item" href="{{ url('customers') }}">
						<i class="app-menu__icon bi bi-people"></i>
						<span class="app-menu__label">Customers</span>
					</a>
				</li>
				<li>
					<a class="app-menu__item" href="{{ url('areas') }}">
						<i class="app-menu__icon bi bi-bank"></i>
						<span class="app-menu__label">Areas</span>
					</a>
				</li>
			</ul>
		</aside>
		<main class="app-content">
			@yield('content')
		</main>
		<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets/js/main.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/plugins/chart.js') }}"></script>
		<script src='{{ asset("assets/toast/jquery.toast.js") }}'></script>
		<script type="text/javascript">
			$(document).ready(function(){
				if($("#toast").length) {
		    		toast_popup($("#toast").text());
		    	}
		    	setTimeout(function(){
		    		$("canvas").css("fontFamily","Readex Pro")
		    	},1500);
				$("ul.app-menu li").each(function(){
					if($(this).hasClass("treeview")){
						var obj = $(this);
						$(obj.find("ul li")).each(function(){
							if($.trim($(this).text()) == page_title){
								obj.addClass("is-expanded");
								$(this).find("a").addClass("active");
							}
						});	
					} else {
						if($.trim($(this).text()) == page_title){
							$(this).find("a").addClass("active");
						}
					}
				});
			});
			function remove_row(url)
			{
				if(confirm("Are you sure to remove this row?")){
					$.ajax({
						url: url,
						type: "post",
						data:{
							"_token": $("meta[csrf=csrf-token]").attr("content"),
							"_method": "DELETE"
						},
						dataType: "json",
						success:function(response){
							if(response.status == 1)
								window.location.reload();
						}
					});
				}
			}
			function edit_emp(id)
			{
				$.ajax({
					url: "<?php echo url('employees'); ?>/"+id,
					type: "get",
					dataType: "json",
					success:function(response){
						$("#empform").attr("action","<?php echo url('employees'); ?>/"+id)
						$("#fname").val(response.data.fname);
						$("#lname").val(response.data.lname);
						$("#email").val(response.data.email);
						$("#phone").val(response.data.phone);
						$("#company_id option[value="+response.data.company_id+"]").attr("selected",true);
						$("#modal").modal('show');
					}
				});
			}
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