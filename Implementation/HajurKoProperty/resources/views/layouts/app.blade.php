<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('mainTitle','Hajurko Property')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

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

    <!-- js -->
    <script src="{!! asset('Links/js/jquery-3.3.1.min.js') !!}"></script>

    <!-- Custom -->
    <link rel="stylesheet" href="cus/css/style.css">

    <link rel="stylesheet" href="{!! asset('cus/css/nice-select.css') !!}">

    <!-- animate -->
    <link rel="stylesheet" href="cus/vendors/animate-css/animate.css">
    
    <!-- extraresponsive -->
    <link rel="stylesheet" href="cus/css/responsive.css">

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
    <div id="app">
    <nav id="a" class="navbar navbar-expand-md navbar-light bg-light navbar-laravel navbar-fixed-top" style="min-height: 80px;">
            <div class="container">
                <a class="navbar-brand text-primary font-weight-bold"  href="{{ url('/') }}">
                    <img class="img-Logo" src="{{ asset('images/logoHKP.png') }}" alt="LogoOfHouse"> {{ config('APP.NAME', 'HajurKo Property') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapseDIv" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="collapseDIv">
                    <!-- Left Side Of Navbar -->
                    <div class="container-fluid-nav text-center collapse navbar-collapse font-weight-bold" id="collapseDIv">
                        <ul class="navbar-nav" id="menuS">
                            <li class="nav-item"><a href="/"  class="nav-link icon home"> <p class="iconP">Home</p></a></li>
                            <li class="nav-item"><a href="{{ ('/listings') }}"  class="nav-link icon forum"><p class="iconP">Listings</p></a></li>
                            <li class="nav-item"><a href="{{ ('/about') }}" class="nav-link icon sports"><p class="iconP">About</p></a></li>
                        </ul>
                    </div>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    <div class="dropdown">
                        <!-- Authentication Links -->
                        <div class="d-flex align-items-center">
                            <!-- Button trigger modal -->
                            <a class="nav-link text-dark" href="#" data-toggle="modal" data-target="#exampleModal" role="button" style="">
                                <i class="fas fa-search"></i>                      
                            </a>
                            <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Quick Search</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/search_Result" class="search-form">
                                                @csrf
                                                <div class="form-row ">
                                                    <input class="form-control" type="text" placeholder="Search Location only" name="searchData" aria-label="Search">
                                                    <button class="btn btn-primary btn-block mt-2" type="submit"><i class="fa fa-search p-1"></i>Search</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {{-- modal end --}}
                        @guest
                            <a class="nav-link dropdown-toggle  text-dark  font-weight-bold" href="#" id="navbarDropdown" data-target="#new" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-user"></i>                   
                            </a>
                        </div>
                        @if (Route::has('register'))
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="new">
                            <a class=" dropdown-item nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        <div class="dropdown-divider"></div>
                            <a class="dropdown-item nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </div>
                            @endif
                        @else
                            <div class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->fullname }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                    <a class="dropdown-item" href="{{ url('profile',Auth::user()->id) }}">{{ _('Edit Profile') }}</a> 
                                    <div class="dropdown-divider"></div>  
                                    @if(Auth::user()->uType == 0)                                 
                                        <a class="dropdown-item" href="/listingsyour">{{ _('Your property') }}</a>
                                    @endif
                                    @if(Auth::user()->uType == 1)
                                        <a class="dropdown-item" href="{{ url('dashboard')}}">{{ _('Admin Pannel') }}</a> 
                                    @endif
                                </div>
                            </div>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
    
        @if(session()->has('fail'))
        <div class="alert alert-danger">
            {{ session()->get('fail') }}
        </div>
        @endif

        <main class="">
            @yield('content')
        </main>
    </div>
     <!-- Footer -->
    <footer class="page-footer bg-light" style="margin-top: 70px;">
        <div style="background-color: #E8EAED;">
            <div class="container">

                <!-- Grid row-->
                <div class="row py-4 d-flex align-items-center">

                    <!-- Grid column -->
                    <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                        <h6 class="mb-0">Get connected with us on</h6>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-6 col-lg-7 text-center text-md-right">
                        <!-- Facebook -->
                        <a class="fb-ic">
                            <i class="fab fa-facebook-f white-text mr-4"> </i>
                        </a>
                        <!-- Twitter -->
                        <a class="tw-ic">
                            <i class="fab fa-twitter white-text mr-4"> </i>
                        </a>
                        <!-- Google +-->
                        <a class="gplus-ic">
                            <i class="fab fa-google-plus-g white-text mr-4"> </i>
                        </a>
                        <!--Linkedin -->
                        <a class="li-ic">
                            <i class="fab fa-linkedin-in white-text mr-4"> </i>
                        </a>
                        <!--Instagram-->
                        <a class="ins-ic">
                            <i class="fab fa-instagram white-text"> </i>
                        </a>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row-->
            </div>
        </div>

        <!-- Footer Links -->
        <div class="container text-center text-md-left mt-5">

            <!-- Grid row -->
            <div class="row mt-3 dark-grey-text">

                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-4 mb-4">

                    <!-- Content -->
                    <h6 class="text-uppercase font-weight-bold">HajurKo Property</h6>
                    <hr class="bg-info accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p> List your property on  <span class="text-info">hajurKoProperty.com</span> 
                        Get amazing deals on single room, houses or a flat with simple to use User-Interface.
                    </p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold">Useful links</h6>
                    <hr class="bg-info accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <i class="fas fa-home white-text"> </i>
                        <a class="dark-grey-text" href="#!">Home</a>
                    </p>
                    <p>
                        <a class="dark-grey-text" href="#!">Flats</a>
                    </p>
                    <p>
                        <a class="dark-grey-text" href="#!">Houses</a>
                    </p>
                    <p>
                        <a class="dark-grey-text" href="#!">Rooms</a>
                    </p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold">Contact</h6>
                    <hr class="bg-info accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <i class="fas fa-home mr-3"></i> Kathmandu, KMNP 44600, NEPAL
                    </p>
                    <p>
                        <i class="fas fa-envelope mr-3"></i> hkp@gmail.com
                    </p>
                    <p>
                        <i class="fas fa-phone mr-3"></i> + 977 234 567 88
                    </p>
                    <p>
                        <i class="fas fa-print mr-3"></i> + 01 234 567 89
                    </p>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center text-black-50 py-3" style="background-color: #E8EAED;"> 
            Copyright &copy;
            <script>
                document.write(new Date().getFullYear());
            </script> 
            All rights reserved |
            <i class="fa fa-heart-o" aria-hidden="true"></i> by 
            <a href="" target="_blank">hajurkoProperty.com</a>
        </div>

    </footer>
    <!-- Footer -->
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 4000);
    </script>
</body>
</html>
