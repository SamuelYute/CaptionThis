@extends('layouts.master')

@section('content')

    <div class="home-bg-cover">

        @include('layouts.header',['active' => 'home'])

        <!-- BG Content -->
        <div class="container" style="height:90%">
            <div class="d-flex align-items-center flex-column" style="height:100%;color: white">
                <div class="mb-auto p-2">
                    <div class="d-flex align-items-center animated">
                        <div class="p-2 w3-text-white" style="font-size:75px">
                            Beautiful
                        </div>
                        <div class="p-2 w3-text-white animated rubberBand" style="font-size:200px">
                            HD
                        </div>
                        <div class="p-2 w3-text-white" style="font-size:75px">
                            Malawi
                        </div>
                    </div>
                    <div class="w3-center w3-text-white" style="font-size:150px">
                        <i class="fa fa-file-image-o animated"></i>
                    </div>
                </div>
                <div class="p-2">
                    <i class="fa fa-arrow-circle-down fa-3x animated pulse infinite" id="scroll-btn"></i>
                </div>
            </div>
        </div>
    </div>

    <div id="main-content" class="container-fluid no-padding-container">

        <div class="container w3-margin w3-padding-large">
            <!-- Nav tabs -->
            <ul class="nav nav-pills nav-fill" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#random" role="tab">Randoms <br> <i class="fa fa-random fa-2x"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#home" role="tab">Briefly <br> <i class="fa fa-clock-o fa-2x"></i></a>
                </li>
            </ul>
        </div>

        <div class="div-divider">

        </div>

        <!-- Tab panes -->
        <div class="tab-content">
            @include('pages.misc.briefly')
            @include('pages.misc.randoms')
        </div>
    </div>

    @include('layouts.footer')
@endsection
