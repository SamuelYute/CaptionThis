@extends('layouts.master')

@section('styles')
    {!! Html::style('css/dashboard.css') !!}
    {!! Html::style('css/selectize.bootstrap3.css') !!}
@endsection

@section('scripts')
    {!! Html::script('js/selectize.min.js') !!}
@endsection

@section('content')

    @include('layouts.header', ['active' => 'dashboard'])

    <div class="container">
      <div id="display-picture">
        <div class="row justify-content-center">
          <div class="col-4 w3-center" style="font-size:165px;">
            @if ($user->avatar)
              <img src="{{ URL::asset($user->avatar) }}" class="img-fluid img-circle" style="margin:20px auto;max-width:60%"/>
            @else
              <i class="fa fa-user-circle shadow" style="border:1px solid transparent;border-radius:50%"></i>
            @endif
          </div>
        </div>
      </div>

      <div id="info" class="w3-center">
          @if ($user->username)
            <h4>
              {{ '@'.$user->username }}
            </h4>
          @endif

          @if ($user->firstname || $user->lastname)
            <h5>
              {{ $user->firstname.' '.$user->lastname }}
            </h5>
          @endif

          @if ($user->email)
            <h5>
              {{ $user->email}}
            </h5>
          @endif
          <div class="btn-group">
            <a id="profile-btn" role="button" class="btn w3-blue w3-ripple w3-hover-shadow dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Profile
            </a>
            <div id="profile-dropdown" class="dropdown-menu" aria-labelledby="profile-btn">
              <a class="dropdown-item" role="button" data-toggle="modal" data-target="#edit-profile-modal">Edit Details</a>
              <a class="dropdown-item" role="button" data-toggle="modal" data-target="#change-password-modal">Change Password</a>
            </div>
          </div>

          @include('pages.dashboard.partials.edit-profile')
          @include('pages.dashboard.partials.change-password')
      </div>

      <div class="div-divider">

      </div>

      <div id="dashboard-section-links" class="w3-margin-top">
        <div class="row justify-content-center">
          <div class="col w3-center">
            <span class="w3-xxxlarge">{{ $user->pictures->count() }}</span>
            <div class="clear-fix">

            </div>
            <i class="fa fa-file-image-o fa-2x"></i>
            <br />
            {{ $user->pictures->count() == 1? 'Picture' : 'Pictures'}}
          </div>
          <div class="col w3-center w3-text-gray align-self-center w3-hover-text-black">
            <span class="w3-xxlarge">0</span>
            <div class="clear-fix">

            </div>
            <i class="fa fa-trophy fa-2x"></i>
          </div>
          <div class="col w3-center w3-text-gray align-self-center w3-hover-text-black">
            <span class="w3-xxlarge">0</span>
            <div class="clear-fix">

            </div>
            <i class="fa fa-star fa-2x"></i>
          </div>
        </div>
      </div>
    </div>



    <div id="dashboard-sections" class="w3-margin">

      <div class="w3-margin w3-padding-large">
        <div class="w3-center">
            <div class="btn-group">

              <a class="btn w3-hover-dark-gray" role="button" data-toggle="modal" data-target="#add-picture-modal"><i class="fa fa-camera"></i> Add</a>

              <a class="btn w3-hover-dark-gray"><i class="fa fa-filter"></i> Filter</a>
              <a class="btn w3-hover-dark-gray" role="button" id="show-pictures-drop-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sort"></i> Show</a>
              <div class="dropdown-menu dropdown-menu-right" id="show-pictures-menu" aria-labelledby="show-pictures-drop-btn">
                <a class="dropdown-item" onclick="changeRowColumnNumber(12)">One Picture in a Row</a>
                <a class="dropdown-item" onclick="changeRowColumnNumber(6)">Two Pictures in a Row</a>
                <a class="dropdown-item" onclick="changeRowColumnNumber(4)">Three Pictures in a Row</a>
                <a class="dropdown-item" onclick="changeRowColumnNumber(3)">Four Pictures in a Row</a>
              </div>
                @include('pages.dashboard.partials.add-photo')
            </div>
        </div>
        <div class="div-divider">

        </div>
      </div>
      <div id="pictures-section" class="row justify-content-center">
        @foreach ($user->pictures as $picture)
          <div class="col-3">
            <div>
              <div class="w3-margin w3-hover-shadow challenge-wrapper">
                  <img src="{{ URL::asset('storage'.$picture->low_resolution)}}"  class="img-fluid"/>
                  <div class="w3-padding">
                      <div class="d-flex justify-content-end">
                          <div class="p-2 mr-auto align-self-center">
                              <i class="fa fa-trophy w3-medium {{ $picture->type == 'Random'? 'w3-text-light-gray':'w3-text-teal'}}"></i>
                              <i class="fa fa-star w3-medium w3-text-khaki"></i>
                          </div>
                          <div class="p-2 align-self-center w3-small text-muted">
                              <i class="fa fa-clock-o"></i> {{ $picture->created_at->diffForHumans() }}
                          </div>
                          <div class="p-2 align-self-center text-muted" style="text-align:right">
                              <a role="button" id="show-picture-options-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-v w3-xlarge"></i></a>
                              <div class="dropdown-menu dropdown-menu-right" id="show-pictures-menu" aria-labelledby="show-pictures-options-btn">
                                  <a class="dropdown-item" role="button" data-target="#edit-picture-modal-{{$picture->id}}" data-toggle="modal">Edit</a>
                                  <a class="dropdown-item" onclick="changeRowColumnNumber(6)">Delete</a>
                                  <a class="dropdown-item" onclick="changeRowColumnNumber(4)">Collect</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    @foreach($user->pictures as $picture)
        @include('pages.dashboard.partials.edit-photo')
    @endforeach

@endsection
