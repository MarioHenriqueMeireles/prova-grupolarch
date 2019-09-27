<!DOCTYPE html>
<html lang="en" ng-app="app">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf_token" content="{{ csrf_token() }}">
        <title>Carta Ouro</title>

        <!-- Fonts -->
        <!-- Styles -->
        <link href="{{ asset('build/css/vendor/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{ asset('build/css/vendor/bootstrap-theme.min.css')}}" rel="stylesheet">
        <link href="{{ asset('build/css/vendor/font-awesome.min.css')}}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

        <style>
            body {
                font-family: 'Lato';
            }

            .fa-btn {
                margin-right: 6px;
            }
        </style>
        @yield('styles')
    </head>
    <body id="app-layout">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Carta Ouro
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    @include('layouts.items-menu')
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                
                <?php $cls = auth()->check() ? ['2','10'] : ['display:none;','12']; ?>
                <div class="col col-lg-{{$cls[0]}}" style="{{$cls[0]}}">
                    @include('layouts.sidebar-menu')
                </div>
                <div class="col col-lg-{{$cls[1]}}">
                    @yield('content')
                </div>
            </div>
            <!-- JavaScripts -->
        </div>
        @if(Config::get('app.debug')) 
        

        @yield('scripts')
        @else

        <script src='js/all.js'></script>
        @endif
    </body>
</html>
