<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('mainTitle','Hajurko Property')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- bootstrap -->
    <link href="{!! asset('Links/css/bootstrap.css') !!}" rel="stylesheet" />
    <link href="{!! asset('Links/css/bootstrap.min.css') !!}" rel="stylesheet" />

    <!-- ftawesome -->
    <link href="{!! asset('Links/fontawesome/css/all.min.css') !!}" rel="stylesheet" />

    <!-- Custom -->
    <link rel="stylesheet" href="cus/css/style.css">

    <!-- animate -->
    <link rel="stylesheet" href="cus/vendors/animate-css/animate.css">
    
    <!-- extraresponsive -->
    <link rel="stylesheet" href="cus/css/responsive.css">

    {{-- admin and usr styles --}}
    <link rel="stylesheet" href="{{ asset('usrAdminStyle/assets/off/normalize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('usrAdminStyle/assets/off/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('usrAdminStyle/assets/off/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{!! asset('Links/fontawesome/css/all.min.css') !!}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('usrAdminStyle/assets/off/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('usrAdminStyle/assets/off/pe-icon-7-stroke.min.css') }}">
    <link rel="stylesheet" href="{{ asset('usrAdminStyle/assets/off/flag-icon.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('usrAdminStyle/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('usrAdminStyle/assets/css/style.css') }}">

    <script type="text/javascript" src=" {{ asset('usrAdminStyle/assets/off/html5shiv.min.js') }}"></script>
    <link href="{{ asset('usrAdminStyle/assets/off/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('usrAdminStyle/assets/off/jqvmap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('usrAdminStyle/assets/off/weather-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('usrAdminStyle/assets/off/fullcalendar.min.css') }}" rel="stylesheet" />

    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="{!! asset('Links/imgLinks/jquery.ajaxy.js') !!}"></script>
    <style>
        nav ul a .iconP{
            margin: 0 4px 0 0px;
        }

        .container-fluid-nav {
            display: flex;
            justify-content: space-around;
        }
        .img-Logo{
            width: 50px;
        }
    </style>
</head>
<body class="bg-white">
        <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
            <nav class="navbar navbar-expand-sm navbar-default">
                <div id="main-menu" class="main-menu collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="">
                            <a href="{{ url('/listingsyour') }}"><i class="menu-icon fa fa-columns"></i>Dashboard </a>
                        </li>
                        <li class="menu-title">Property</li>
                        <li class="menu-item">
                            <a href="{{ url('addProp') }}" class="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-plus"></i>Add Property Listing</a>
                            <a href="{{ url('listingsyour') }}" class="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-edit"></i>Edit Property Listing</a>
                        </li>
    
                        <li class="menu-title">Listings</li>
                        <li class="menu-item">
                            <a href="{{ url('listingsyour') }}" class="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-eye"></i>Your Property Listing</a>
                            <a href="{{ url('bookedListing') }}" class="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Booked Property Listing</a>
                            <a href="{{ url('otherBooked') }}" class="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-list"></i>Booked by other</a>                   
                        </li>
    
                        <li class="menu-title">User Pages</li>
                        <li class="menu-item">
                            <a href="#" class="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-home"></i>Home page</a>
                        </li>
    
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
        </aside>
    <div id="right-panel" class="right-panel">
            <!-- Header-->
            <header id="header" class="header">
                <div class="top-left">
                    <div class="navbar-header">
                        <a class="navbar-brand text-primary font-weight-bold" style="" href="{{ url('/') }}">
                        {{ config('APP.NAME', 'HajurKo Property') }}
                        </a>
                        <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                    </div>
                </div>
                <div class="top-right">
                    <div class="header-menu">
                        <div class="header-left">
                            
                        </div>
                        
                        <div class="dropdown">
                            <div class="user-area dropdown float-right">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->fullname }} <i class="fas fa-caret-down ml-2"></i>
                                </a>
    
                                <div class="user-menu dropdown-menu" id="new">
                                    <a class="nav-link" href="#"><i class="fa fa-user mr-2"></i>My Profile</a>
    
                                    <a class="nav-link" href="#"><i class="fa fa-user mr-2"></i>Notifications </a> {{--<span class="count">13</span>--}}

                                    <a class="nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                       <i class="fa fa-power-off mr-2"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        
        {{-- header --}}
        <!-- Content -->
        <div class="content bg-white">
            @yield('uadContent')
        </div>
          <!-- /.content -->
        <!-- Footer -->
        <footer class="page-footer bg-light" style="margin-top: 70px;">
            <div class="footer-copyright text-center text-black-50 py-3" style="background-color: #E8EAED;">
                Copyright &copy; <a class="text-info" href="">hajurkoProperty.com</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </div>
    <!-- Scripts -->
    <script src="{{ asset('usrAdminStyle/assets/js/off/jquery.min.js') }}"></script>
    <script src="{{ asset('usrAdminStyle/assets/js/off/popper.min.js') }}"></script>
    <script src="{{ asset('usrAdminStyle/assets/js/off/bootstrap.min.js') }}"></script>
    <script src="{{ asset('usrAdminStyle/assets/js/off/jquery.matchHeight.min.js') }}"></script>
    <script src="{{ asset('usrAdminStyle/assets/js/main.js') }}"></script>
</body>
</html>