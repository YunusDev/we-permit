@extends('layouts.base')


@section('title')

    We Permit - Home

@endsection

@section('header')

    <header class="header header-inverse h-fullscreen pb-80" style="background-image: url(assets/img/car.jpg);" data-overlay="5">
        <div class="container text-center">

            <div class="row h-full">
                <div class="col-12 col-lg-8 offset-lg-2 align-self-center">

                    <h1 class="display-4 hidden-sm-down">We Permit</h1>
                    <h1 class="hidden-md-up">Application for vehicle permits and driver's licence registration.</h1>
                    <br>
                    <p class="lead text-white fs-20 hidden-sm-down"><span class="fw-400">Permit </span>Application for vehicle permits and driver's licence registration</p>

                    <br><br><br>


                    @if(auth()->check())

                        <a class="btn btn-lg btn-round w-200 btn-primary mr-16" href="{{url('/profile')}}">Profile</a>

                    @else

                    <a class="btn btn-lg btn-round w-200 btn-primary mr-16" href="{{url('/login')}}">Login</a>
                    <a class="btn btn-lg btn-round w-200 btn-outline btn-white hidden-sm-down" href="{{url('register')}}">Register</a>

                    @endif

                </div>

{{--                <div class="col-12 align-self-end text-center">--}}
{{--                    <a class="scroll-down-1 scroll-down-inverse" href="#" data-scrollto="section-intro"><span></span></a>--}}
{{--                </div>--}}

            </div>

        </div>
    </header>

@endsection


@section('content')



@endsection
