<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('mainTitle','Hajurko Property-Admin Pannel')</title>

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
    <div class="container-fluid bg-light">
    <div class="container bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand text-primary font-weight-bold"  href="{{ url('/') }}">
                    <img class="img-Logo" src="{{ asset('images/logoHKP.png') }}" alt="LogoOfHouse"> {{ config('APP.NAME', 'HajurKo Property') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapseDIv" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapseDIv">
                        <!-- Left Side Of Navbar -->
                        <div class="nav text-center collapse navbar-collapse font-weight-bold" id="collapseDIv">
                            <ul class="navbar-nav" id="menuS">
                            <li class="nav-item"><a href="{!! URL::to('dashboard') !!}"  class="nav-link icon home"> <p class="iconP">Home</p></a></li>
                            </ul>
                        </div>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                        <div class="dropdown">
                            <!-- Authentication Links -->
                            <div class="d-flex align-items-center">
   
                            @guest
                                <a class="nav-link dropdown-toggle text-dark font-weight-bold" href="#" id="navbarDropdown" data-target="#new" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                        <a class="dropdown-item" href="/listingsyour">{{ _('Your property') }}</a>
                                    </div>
                                </div>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
              </div>
            </div>
        <!-- Content -->
        <div class="content">
            @yield('uadContent')
        </div>
        {{-- <!-- content -->
        <!-- Footer --> --}}
    </div>
</body>
</html>