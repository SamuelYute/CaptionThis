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
          <i class="fa fa-plus fa-3x w3-margin"></i>
        </div>

        <div class="w3-center w3-margin">
          {!! Form::open([ 'route' => 'register' , 'method' => 'POST' ]) !!}

          {{ csrf_field() }}

          <div class="form-group w3-margin {{ $errors->has('firstname') ? ' has-danger' : '' }}">
            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
              <div class="input-group-addon ">F</div>
              <input type="text" name="firstname" class="form-control {{ $errors->has('firstname') ? ' form-control-danger' : '' }}" id="firstname" placeholder="Firstname" value="{{ old('firstname') }}" required>
            </div>
            @if ($errors->has('firstname'))
                <div class="clear-fix">
                </div>
                <div class="form-control-feedback">{{ $errors->first('firstname') }}</div>
            @endif
          </div>

          <div class="form-group w3-margin {{ $errors->has('lastname') ? ' has-danger' : '' }}">
            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
              <div class="input-group-addon ">L</div>
              <input type="text" name="lastname" class="form-control {{ $errors->has('lastname') ? ' form-control-danger' : '' }}" id="lastname" placeholder="Lastname" value="{{ old('lastname') }}" required>
            </div>
            @if ($errors->has('lastname'))
                <div class="clear-fix">
                </div>
                <div class="form-control-feedback">{{ $errors->first('lastname') }}</div>
            @endif
          </div>

          <div class="form-group w3-margin {{ $errors->has('username') ? ' has-danger' : '' }}">
            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
              <div class="input-group-addon ">@</div>
              <input type="text" name="username" class="form-control {{ $errors->has('firstname') ? ' form-control-danger' : '' }}" id="username" placeholder="Username" value="{{ old('username') }}" required>
            </div>
            @if ($errors->has('username'))
                <div class="clear-fix">
                </div>
                <div class="form-control-feedback">{{ $errors->first('username') }}</div>
            @endif
          </div>

          <div class="form-group w3-margin {{ $errors->has('email') ? ' has-danger' : '' }}">
            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
              <div class="input-group-addon "><i class="fa fa-envelope"></i></div>
              <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' form-control-danger' : '' }}" id="email" placeholder="Email" value="{{ old('email') }}" required>
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
            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
              <div class="input-group-addon "><i class="fa fa-check"></i></div>
              <input type="password" name="password_confirmation" class="form-control" id="password-confirm" placeholder="Confirm Password" required>
            </div>
          </div>

          <div class="form-group w3-margin">
            <button class="btn btn-primary"><i class="fa fa-send"></i> Register</button>
          </div>

          {!! Form::close() !!}
        </div>

        <div class="w3-center w3-margin">
            <a href="{{ URL::route('login')}}">Already have an account?</a>
              <br />
            <span class="text-muted"><i class="fa fa-copyright"></i> Crisp 2017</span>
        </div>
      </div>
    </div>
  </div>
@endsection
