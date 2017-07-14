@extends('layouts.master')

@section('styles')
  {!! Html::style('css/challenges.css') !!}
@endsection

@section('content')

    <div class="container-fluid no-padding-container no-margin-container">
        @include('layouts.header',['active' => 'challenges'])

        <div class="container w3-center w3-padding-large">

          <div class="w3-text-grey w3-xxxlarge">
            Challenges
          </div>

          <span class="w3-dark-gray shadow" style="margin:30px 0px;padding:0px 40px;font-size:100px;display:inline-block">
            <i class="fa fa-trophy"></i>
          </span>

          <div class="w3-xxlarge">
            Simply upload a picture to a challenge.
          </div>

          <div>
            <button class="btn w3-blue w3-hover-shadow w3-ripple"><i class="fa fa-mouse-pointer"></i> Choose a Challenge</button>
          </div>
        </div>
    </div>

    <div class="div-divider">

    </div>

    <div id="main-content" class="container-fluid no-padding-container">
      <div>
        <div class="w3-center w3-padding-large">
            <div  style="display: inline-block">
                <h2>Current Challenge</h2>
                <div style="border-bottom: 5px solid gray;width: 70%;margin:auto"></div>
            </div>
        </div>

        <div id="challenges" class="container">
            <div class="row w3-margin">
                <div class="col">
                    <div class="w3-margin w3-hover-shadow challenge-wrapper">
                        <img src="images/art.jpg"  class="img-fluid"/>
                        <div class="w3-padding w3-margin-bottom">
                            <h3>Art in Buildings</h3>
                            <p>Survey malawi and look for rich art found in our historic buildings.</p>

                            <div class="d-flex justify-content-around">
                                <div class="p-2">
                                    <button class="btn btn-info">
                                        View
                                    </button>
                                </div>
                                <div class="p-2 ml-auto align-self-center w3-small text-muted">
                                    <i class="fa fa-clock-o"></i> 5 days to go
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="w3-margin w3-hover-shadow challenge-wrapper">
                        <img src="images/desk.jpg"  class="img-fluid"/>
                        <div class="w3-padding w3-margin-bottom">
                            <h3>Things on Desks</h3>
                            <p>Be artistic and show us that your desk is better than everyone else's.</p>

                            <div class="d-flex justify-content-around">
                                <div class="p-2">
                                    <button class="btn btn-info">
                                        View
                                    </button>
                                </div>
                                <div class="p-2 ml-auto align-self-center w3-small text-muted">
                                    <i class="fa fa-clock-o"></i> 9 days to go
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>

      <div class="div-divider">

      </div>

      <div>
        <div class="w3-center w3-padding-large">
            <div  style="display: inline-block">
                <h2>Past Challenges</h2>
                <div style="border-bottom: 5px solid gray;width: 70%;margin:auto"></div>
            </div>
        </div>

        <div id="challenges" class="container">
            <div class="row w3-margin">
                <div class="col">
                    <div class="w3-margin w3-hover-shadow challenge-wrapper">
                        <img src="images/art.jpg"  class="img-fluid"/>
                        <div class="w3-padding w3-margin-bottom">
                            <h3>Art in Buildings</h3>
                            <p>Survey malawi and look for rich art found in our historic buildings.</p>

                            <div class="d-flex justify-content-around">
                                <div class="p-2">
                                    <button class="btn btn-info">
                                        View
                                    </button>
                                </div>
                                <div class="p-2 ml-auto align-self-center w3-small text-muted">
                                    <i class="fa fa-clock-o"></i> 5 days to go
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="w3-margin w3-hover-shadow challenge-wrapper">
                        <img src="images/desk.jpg"  class="img-fluid"/>
                        <div class="w3-padding w3-margin-bottom">
                            <h3>Things on Desks</h3>
                            <p>Be artistic and show us that your desk is better than everyone else's.</p>

                            <div class="d-flex justify-content-around">
                                <div class="p-2">
                                    <button class="btn btn-info">
                                        View
                                    </button>
                                </div>
                                <div class="p-2 ml-auto align-self-center w3-small text-muted">
                                    <i class="fa fa-clock-o"></i> 9 days to go
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>


    </div>

    @include('layouts.footer')
@endsection
