@extends('layouts.auth')

@section('title')

    Register

@endsection

@section('content')

    <div class="card card-shadowed p-50 w-400 mb-0" style="max-width: 100%">
        <h5 class="text-uppercase text-center">Register</h5>

        <a class="btn btn-bold btn-block btn-danger-outline" href="{{route('login.google')}}" type="submit">Google Auth</a>

    </div>


@endsection
