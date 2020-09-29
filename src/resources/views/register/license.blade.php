@extends('layouts.auth')

@section('title')

    License Registration

@endsection

@section('styles')

    <style>

    .input_no_border{

        border-color: #FFFFFF !important;
    }

    </style>

@endsection

@section('content')

    <div class="card card-shadowed p-50 w-400 mb-0" style="max-width: 100%">

        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible" style="margin-bottom: 30px !important;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                {{session('success')}}
            </div>
        @endif

        <div style="margin-bottom: 10px !important;">
            <h5 class="text-uppercase text-center" style="">Vehicle License Registration</h5>
            <p>License registration for user <b>{{$user->fname}} {{$user->lname}}</b></p>
        </div>

        <form method="POST" action="{{ route('register.stage.two') }}" enctype="multipart/form-data" class="  form-type-material">
            @csrf

            <div class="form-group">
                <label for="">Application Type</label>
                <select name="application_type" class="form-control" id="" required>
                    <option value="">Application Type</option>
                    <option value="Articulated Vehicle">Articulated Vehicle</option>
                    <option value="Commercial">Commercial</option>
                    <option value="Private">Private</option>
                    <option value="Motorcycle">Motorcycle</option>
                </select>
                @if ($errors->has('application_type'))
                    <span  class="help-block" >
                      <strong style="color: #dd4b39; font-size: 12px"><i>{{ $errors->first('application_type') }}</i></strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="">Test Scores</label>
                <input type="range" id="test_score" class="form-control" name="test_score" min="0" max="100" onchange="" required>
                <input class="input_no_border" type="text" id="text_for_show_range">
                @if ($errors->has('test_score'))
                    <span  class="help-block" >
                      <strong style="color: #dd4b39; font-size: 12px"><i>{{ $errors->first('test_score') }}</i></strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label>State (Where Application is made from)</label>
                <select name="state" class="form-control" id="" required>
                    <option value="">Stage</option>
                    <option value="Lagos">Lagos</option>
                    <option value="Oyo">Oyo</option>
                </select>
                @if ($errors->has('state'))
                    <span  class="help-block" >
                      <strong style="color: #dd4b39; font-size: 12px"><i>{{ $errors->first('state') }}</i></strong>
                </span>
                @endif
            </div>

            <div class="form-group ">
                <label for="">Residential Address</label>
                <input type="text" value="" class="form-control" name= "address" placeholder="Residential Address" required>
                @if ($errors->has('address'))
                    <span  class="help-block" >
                      <strong style="color: #dd4b39; font-size: 12px"><i>{{ $errors->first('address') }}</i></strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label class="custom-control custom-checkbox">
                    <input type="checkbox" name="is_first_time" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">First time of Registration</span>
                </label>
            </div>


            <br>
            <button class="btn btn-bold btn-block btn-primary" type="submit">Complete Registration</button>
        </form>

    </div>


@endsection

@section('scripts')

    <script>

        $('#test_score').change(function(){
            document.getElementById('text_for_show_range').value=$(this).val();
        });
    </script>

@endsection
