@extends('layouts.master')

@section('styles')
  {{ Html::style('css/auth.css')}}
@endsection

@section('content')
  <div id="auth-wrapper" class="container-fluid no-padding-container">
    <div class="row justify-content-center animated zoomIn" style="height:100%">
      <div class="col-4 align-self-center w3-card-4 w3-black-opacity">
        <div class="w3-center w3-margin">
          <span class="w3-xxlarge"><a href="{{ URL::route('index') }}">Crisp</a></span>
            <br>
          <span class="w3-large">Beautiful HD Malawi</span>
          <br />
          <i class="fa fa-lock fa-3x w3-margin"></i>
        </div>

        <div class="w3-center w3-margin">
          {!! Form::open(['route' => 'login', 'method' => 'POST']) !!}
                    {{ csrf_field() }}

            <div class="form-group w3-margin {{ $errors->has('email') ? ' has-danger' : '' }}">
              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                <div class="input-group-addon "><i class="fa fa-envelope"></i></div>
                <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' form-control-danger' : '' }}" id="email" placeholder="Email" required>
              </div>
              @if ($errors->has('email'))
                  <div class="clear-fix">

                  </div>
                  <div class="form-control-feedback">{{ $errors->first('email') }}</div>
              @endif
            </div>

            <div class="form-group w3-margin {{ $errors->has('password') ? ' has-danger' : '' }}">
              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                <div class="input-group-addon "><i class="fa fa-key"></i></div>
                <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' form-control-danger' : '' }}" id="password" placeholder="Password" required>
              </div>
              @if ($errors->has('password'))
                  <div class="clear-fix">

                  </div>
                  <div class="form-control-feedback">{{ $errors->first('password') }}</div>
              @endif
            </div>

            <div class="form-group w3-margin">
              <button class="btn"><i class="fa fa-send" type="submit"></i> Login</button>
              <br />
              <br />
               <a href="{{ URL::route('password.request')}}" class="w3-margin">Forgot password?</a> <a href="{{ URL::route('register')}}">Create and account</a>
            </div>

          {!! Form::close() !!}
        </div>

        <div class="w3-center w3-margin" >
            <h3>
                Or
            </h3>

            <div class="row justify-content-center">
              <div class="btn-group" role="group">
                <a href="{{ URL::route('social.login','facebook') }}" class="btn btn-facebook">
                    <i class="fa fa-facebook-square"></i> Facebook
                </a>
                <a href="{{ URL::route('social.login','google') }}" class="btn btn-google">
                    <i class="fa fa-google"></i> Google
                </a>
                <a href="{{ URL::route('social.login','twitter') }}" class="btn btn-primary">
                    <i class="fa fa-twitter"></i> Twitter
                </a>
              </div>
            </div>
        </div>

        <div class="w3-center w3-margin text-muted">
            <i class="fa fa-copyright"></i> Crisp 2017
        </div>
      </div>
    </div>
  </div>
@endsection
