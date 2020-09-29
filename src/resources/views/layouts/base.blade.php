<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="/assets/css/core.min.css" rel="stylesheet">
    <link href="/assets/css/thesaas.min.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/assets/img/car_small.jpg">
    <link rel="icon" href="/assets/img/car_small.jpg">

    @yield('styles')

</head>
<body>
<div id="app">

    <!-- Topbar -->
    <nav class="topbar topbar-inverse topbar-expand-md topbar-sticky">
        <div class="container">

            <div class="topbar-left">
                <button class="topbar-toggler">&#9776;</button>
                <a class="topbar-brand" href="{{url('/')}}">
                    <h3  style="color: white; text-transform: capitalize">We Permit</h3>
                </a>
            </div>

            <div class="topbar-right">
                <ul class="topbar-nav nav">

                    @if(auth()->check())

                        @if(!$user->stage_1)
                            <li style = "color: red" class="nav-item "><a title="profile" class="nav-link"
                                                                          href="{{route('register.stage.one')}}">Complete Registration</a></li>

                        @elseif(!$user->complete_reg)
                            <li style = "color: red" class="nav-item ">
                                <a title="profile" class=" nav-link" href="{{route('register.stage.two')}}">Complete License Registration</a>
                            </li>

                        @else

                            <li style = "color: red" class="nav-item ">
                                <a title="profile" class=" nav-link" href="{{route('profile')}}">{{auth()->user()->fname}}, Profile</a>
                            </li>

                        @endif

                        <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{url('/login')}}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{url('/register')}}">Register</a></li>
                    @endif

                </ul>
            </div>

        </div>
    </nav>
    <!-- END Topbar -->

    @yield('header')

    <main class="main-content">
        @yield('content')
    </main>


<!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="row gap-y align-items-center">
                <div class="col-12 col-lg-3">
                    <p class="text-center text-lg-left">
                    {{--<a href="index.html"><img src="/assets/img/logo.png" alt="logo"></a>--}}
                    <a href="{{route('welcome')}}">
                        <h3  style="color: white; text-transform: capitalize">We Permit</h3>
                    </a>
                    </p>
                </div>

                <div class="col-12 col-lg-6">
                    <ul class="nav nav-primary nav-hero">
                        <li class="nav-item">
                            <a class="nav-link" href={{route('welcome')}}>Home</a>
                        </li>

                        @if(auth()->check())
                            <li style = "color: red" class="nav-item "><a title="profile" class=" nav-link" href="{{route('register.stage.one')}}">{{auth()->user()->name}}</a></li>
                            <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
                        @else
                            <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#loginModal" href="javascript:;">Login</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{url('/register')}}">Register</a></li>

                        @endif
                    </ul>
                </div>

                <div class="col-12 col-lg-3">
                    <div class="social text-center text-lg-right">
                        <a class="social-facebook" href="#"><i class="fa fa-facebook"></i></a>
                        <a class="social-twitter" href="#"><i class="fa fa-twitter"></i></a>
                        <a class="social-instagram" href="#"><i class="fa fa-instagram"></i></a>
                        <a class="social-dribbble" href="#"><i class="fa fa-dribbble"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- END Footer -->



    <!-- Scripts -->



</div>
<script src="/assets/js/core.min.js"></script>
<script src="/assets/js/thesaas.min.js"></script>
<script src="/assets/js/script.js"></script>
<script src="/js/app.js"></script>
</body>
</html>
