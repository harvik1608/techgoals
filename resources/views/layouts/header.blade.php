<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta csrf="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{ get_setting_val('app_name') }}</title>

        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/backend-plugin.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/backend.css') }}?v=1.0.0">  
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@300&display=swap" rel="stylesheet">
        <style>
            body, .jq-toast-single, h4 {
                font-family: 'Readex Pro', sans-serif !important;
            }
            .error, .error-text {
                color: #FF0000 !important;
            }
        </style>
        <script src="{{ asset('assets/js/backend-bundle.min.js') }}"></script>
    </head>
    <body>
        <div id="loading">
            <div id="loading-center">
            </div>
        </div>
        <div class="wrapper">
            <div class="iq-sidebar  sidebar-default  ">
                <div class="iq-sidebar-logo d-flex align-items-end justify-content-between">
                    <a href="../backend/index.html" class="header-logo">
                        <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid rounded-normal light-logo" alt="logo">
                        <img src="{{ asset('assets/images/logo-dark.png') }}" class="img-fluid rounded-normal d-none sidebar-light-img" alt="logo">
                        <span>{{ get_setting_val('app_name') }}</span>            
                    </a>
                    <div class="side-menu-bt-sidebar-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-light wrapper-menu" width="30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                </div>
                <div class="data-scrollbar" data-scroll="1">
                    <nav class="iq-sidebar-menu">
                        <ul id="iq-sidebar-toggle" class="side-menu">
                            <li class="sidebar-layout">
                                <a href="{{ route('home') }}" class="svg-icon">
                                    <i class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                    </i>
                                    <span class="ml-2">Dashboard</span>
                                    <!-- <p class="mb-0 w-10 badge badge-pill badge-primary">6</p> -->
                                </a>
                            </li>
                            <li class="px-3 pt-3 pb-2">
                                <span class="text-uppercase small font-weight-bold">Pages</span>
                            </li>
                            @if(auth()->user()->role == 1)
                                <li class="sidebar-layout">
                                    <a href="{{ url('users') }}" class="svg-icon">
                                        <i class="">
                                            <svg class="svg-icon" id="iq-user-1-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </i>
                                        <span class="ml-2">Users</span>
                                        <!-- <p class="mb-0 w-10 badge badge-pill badge-primary">6</p> -->
                                    </a>
                                </li>
                                <li class="sidebar-layout">
                                    <a href="{{ url('lenders') }}" class="svg-icon">
                                        <i class="">
                                            <svg class="svg-icon" id="iq-user-1-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </i>
                                        <span class="ml-2">Lenders</span>
                                        <!-- <p class="mb-0 w-10 badge badge-pill badge-primary">6</p> -->
                                    </a>
                                </li>
                                <li class="sidebar-layout">
                                    <a href="{{ url('pipeline_types') }}" class="svg-icon">
                                        <i class="">
                                            <svg class="svg-icon" id="iq-user-1-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </i>
                                        <span class="ml-2">Pipeline Types</span>
                                        <!-- <p class="mb-0 w-10 badge badge-pill badge-primary">6</p> -->
                                    </a>
                                </li>
                                <li class="sidebar-layout">
                                    <a href="{{ url('crm') }}" class="svg-icon">
                                        <i class="">
                                            <svg class="svg-icon" id="iq-user-1-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </i>
                                        <span class="ml-2">CRM</span>
                                        <!-- <p class="mb-0 w-10 badge badge-pill badge-primary">6</p> -->
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                    <div class="pt-5 pb-5"></div>
                </div>
            </div>
            <div class="iq-top-navbar">
                <div class="iq-navbar-custom">
                    <nav class="navbar navbar-expand-lg navbar-light p-0">
                        <div class="side-menu-bt-sidebar">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary wrapper-menu" width="30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </div>
                        <div class="d-flex align-items-center">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary" width="30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                                </svg>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto navbar-list align-items-center">
                                    <li class="nav-item nav-icon dropdown"> 
                                        <a href="#" class="search-toggle dropdown-toggle" id="notification-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="h-6 w-6 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                            </svg>
                                            <span class="bg-primary"></span>
                                        </a>
                                        <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="notification-dropdown">
                                            <div class="card shadow-none m-0 border-0">
                                                <div class="p-3 card-header-border">
                                                    <h6 class="text-center">
                                                        Notifications
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item nav-icon search-content">
                                        <a href="#" class="search-toggle rounded" id="dropdownSearch" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg class="svg-icon text-secondary" id="h-suns" height="25" width="25" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </a>
                                        <div class="iq-search-bar iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownSearch">
                                            <form action="#" class="searchbox p-2">
                                                <div class="form-group mb-0 position-relative">
                                                    <input type="text" class="text search-input font-size-12" placeholder="type here to search...">
                                                    <a href="#" class="search-link">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                        </svg>
                                                    </a> 
                                                </div>
                                            </form>
                                        </div>
                                    </li>
                                    <li class="nav-item nav-icon dropdown">
                                        <a href="#" class="nav-item nav-icon dropdown-toggle pr-0 search-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                            <img src="{{ asset('assets/images/user/1.jpg') }}" class="img-fluid avatar-rounded" alt="user">
                                            <span class="mb-0 ml-2 user-name">{{ auth()->user()->name }}</span>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                            <li class="dropdown-item d-flex svg-icon">
                                                <svg class="svg-icon mr-0 text-secondary" id="h-02-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                <a href="{{ route('edit-profile') }}">Edit Profile</a>
                                            </li>
                                            <li class="dropdown-item d-flex svg-icon">
                                                <svg class="svg-icon mr-0 text-secondary" id="h-02-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                <a href="{{ route('change-password') }}">Change Password</a>
                                            </li>
                                            @if(auth()->user()->role == 1)
                                                <li class="dropdown-item d-flex svg-icon">
                                                    <svg class="svg-icon mr-0 text-secondary" id="h-04-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                                    </svg>
                                                    <a href="{{ route('edit-settings') }}">General Settings</a>
                                                </li>
                                            @endif
                                            <li class="dropdown-item  d-flex svg-icon border-top">
                                                <svg class="svg-icon mr-0 text-secondary" id="h-05-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                                </svg>
                                                <form method="post" action="{{ url('logout') }}" id="logoutform">
                                                    @csrf
                                                    <a onclick="logout()">&nbsp;&nbsp;Logout</a>
                                                    <button type="submit" style="display: none;"></button>
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            @yield('content')
        </div>
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
        <script type="text/javascript">
            $(document).ready(function(){
                $("#iq-sidebar-toggle li.sidebar-layout").each(function(){
                    if($.trim($(this).find("span").text()) == page_title) {
                        $(this).addClass("active");
                    }
                })
            });
            function logout()
            {
                $("#logoutform").trigger("submit");
            }
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
        </script>
    </body>
</html>