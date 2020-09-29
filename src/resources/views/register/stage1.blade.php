@extends('layouts.auth')

@section('title')

    Stage One Registration

@endsection

@section('styles')

    <style>



    </style>

@endsection

@section('content')

    <div class="card card-shadowed p-50 w-400 mb-0" style="max-width: 100%">
        <h5 class="text-uppercase text-center" style="margin-bottom: 30px !important;">Registration</h5>

        <form method="POST" action="{{ route('register.stage.one') }}" enctype="multipart/form-data" class="  form-type-material">
            @csrf

            <div class="form-group">
                <input type="text" class="form-control" value="{{$user->email}}" disabled>
            </div>

            <div class="form-group ">
                <input type="text" value="{{$user->fname}}" class="form-control {{ $errors->has('fname') ? 'has-error' : '' }}"
                       name="fname" placeholder="First Name" required>
                @if ($errors->has('fname'))
                    <span  class="help-block" >
                      <strong style="color: #dd4b39; font-size: 12px"><i>{{ $errors->first('fname') }}</i></strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <input type="text" value="{{$user->lname}}" class="form-control {{ $errors->has('lname') ? 'has-error' : '' }}"
                       name="lname" placeholder="Last Name" required>
                @if ($errors->has('lname'))
                    <span  class="help-block" >
                      <strong style="color: #dd4b39; font-size: 12px"><i>{{ $errors->first('lname') }}</i></strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <select name="sex"  class="form-control" id="" required>
                    <option value="">Sex</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                @if ($errors->has('sex'))
                    <span  class="help-block" >
                      <strong style="color: #dd4b39; font-size: 12px"><i>{{ $errors->first('sex') }}</i></strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <select name="state_of_origin" class="form-control" id="" required>
                    <option value="">Stage of Origin</option>
                    <option value="Lagos">Lagos</option>
                    <option value="Oyo">Oyo</option>
                </select>
                @if ($errors->has('state_of_origin'))
                    <span  class="help-block" >
                      <strong style="color: #dd4b39; font-size: 12px"><i>{{ $errors->first('state_of_origin') }}</i></strong>
                </span>
                @endif
            </div>

            <div class="form-group ">
                <input type="text" value="" class="form-control {{ $errors->has('occupation') ? 'has-error' : '' }}"
                       name="occupation" placeholder="Occupation" required>
                @if ($errors->has('occupation'))
                    <span  class="help-block" >
                      <strong style="color: #dd4b39; font-size: 12px"><i>{{ $errors->first('occupation') }}</i></strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                <input type="date" class="form-control" placeholder="Date of Birth" id="dob" name="dob"
                       value="{{old('dob')}}"
                       min="1970-01-01" max="2020-12-30" required>
                @if ($errors->has('dob'))
                    <span  class="help-block" >
                      <strong style="color: #dd4b39; font-size: 12px"><i>{{ $errors->first('dob') }}</i></strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                <label>Profile Picture</label>
                <input type="file" id="picture" name="picture" class="form-control" required>
                @if ($errors->has('picture'))
                    <span  class="help-block" >
                      <strong style="color: #dd4b39; font-size: 12px"><i>{{ $errors->first('picture') }}</i></strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                <label>Ms Word Document</label>
                <input type="file" id="word_doc" name="word_doc" class="form-control" required>
                @if ($errors->has('word_doc'))
                    <span  class="help-block" >
                      <strong style="color: #dd4b39; font-size: 12px"><i>{{ $errors->first('word_doc') }}</i></strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                <label>PDF Document</label>
                <input type="file" id="pdf_doc" name="pdf_doc" class="form-control" required>
                @if ($errors->has('pdf_doc'))
                    <span  class="help-block" >
                      <strong style="color: #dd4b39; font-size: 12px"><i>{{ $errors->first('pdf_doc') }}</i></strong>
                </span>
                @endif
            </div>

            <br>
            <button class="btn btn-bold btn-block btn-primary" type="submit">Register</button>
        </form>

    </div>


@endsection
