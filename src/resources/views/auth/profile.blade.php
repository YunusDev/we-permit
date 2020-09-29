@extends('layouts.base')


@section('styles')

    <style>

        .title_col{

            width: 80% !important;
        }

        .detail_col {

            font-weight: 100;
            font-size: 14px;

        }

        tr{
            height: 45px !important;
        }
    </style>

@endsection

@section('title')

    We Permit - Profile

@endsection

@section('header')

    <header class="header header-inverse" style="background-color: #455046">
        <div class="container text-center">

            <div class="row">
                <div class="col-12 col-lg-8 offset-lg-2">

                    <h1>{{$user->fname}}, Profile</h1>

                    @if($user->processor_approves)

                        <h2 class="">Your application have been accepted!</h2><br>

                    @else
                        <h2 class="">Your application is currently been reviewed!!!</h2><br>


                    @endif


{{--                    <a href="" class="btn btn-lg btn-primary mr-16 btn-round">Return To Index Page</a>--}}
                </div>
            </div>

        </div>
    </header>


@endsection


@section('content')

    <section class="section bg-gray">

        <div class="row">

            <div class="col-md-6 m-auto">

                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title fw-600">Profile</h5>

                        <table>

                            <tr>
                                <td class="title_col" style="">First Name: </td>
                                <td class="detail_col"> {{$user->fname}}</td>
                            </tr>

                            <tr>
                                <td class="title_col" style="">Last Name: </td>
                                <td class="detail_col"> {{$user->lname}}</td>
                            </tr>

                            <tr>
                                <td class="title_col" style="">Picture: </td>
                                <td class="detail_col">
                                    <img src="{{$user->picture_url}}" height="50" width="50" alt="">
                                </td>
                            </tr>

                            <tr>
                                <td class="title_col" style="">Email: </td>
                                <td class="detail_col"> {{$user->email}}</td>
                            </tr>

                            <tr>
                                <td class="title_col" style="">Date of Birth: </td>
                                <td class="detail_col"> {{$user->dob}}</td>
                            </tr>

                            <tr>
                                <td class="title_col" style="">Sex: </td>
                                <td class="detail_col"> {{$user->sex}}</td>
                            </tr>

                            <tr>
                                <td class="title_col" style="">State of Origin: </td>
                                <td class="detail_col"> {{$user->state_of_origin}}</td>
                            </tr>

                            <tr>
                                <td class="title_col" style="">Occupation: </td>
                                <td class="detail_col"> {{$user->occupation}}</td>
                            </tr>

                            <tr>
                                <td class="title_col" style="">Word Document: </td>
                                <td class="detail_col">
                                    <a target="_blank" href="{{$user->word_doc_url}}"> Click to view</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="title_col" style="">PDf Doc Url: </td>
                                <td class="detail_col"><a target="_blank" href="{{$user->pdf_doc_url}}">Click to view</a></td>
                            </tr>

                            <tr>
                                <td class="title_col" style="">Residential Address: </td>
                                <td class="detail_col"> {{$user->licenseReg->address}}</td>
                            </tr>

                            <tr>
                                <td class="title_col" style="">Application Type: </td>
                                <td class="detail_col"> {{$user->licenseReg->application_type}}</td>
                            </tr>

                            <tr>
                                <td class="title_col" style="">State of registration: </td>
                                <td class="detail_col"> {{$user->licenseReg->state}}</td>
                            </tr>

                            <tr>
                                <td class="title_col" style="">Test Score: </td>
                                <td class="detail_col"> {{$user->licenseReg->test_score}}</td>
                            </tr>

                            <tr>
                                <td class="title_col" style="">First Time Of Application: </td>
                                <td class="detail_col"> {{$user->licenseReg->is_first_time ? 'Yes' : 'No'}}</td>
                            </tr>

                        </table>

                    </div>
                </div>


            </div>

        </div>


    </section>


@endsection
