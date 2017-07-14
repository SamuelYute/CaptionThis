@extends('layouts.master')

@section('styles')
    {!! Html::style('css/dashboard.css') !!}
    {!! Html::style('css/selectize.bootstrap3.css') !!}
    {!! Html::style('css/jquery-confirm.min.css') !!}
@endsection

@section('scripts')
    {!! Html::script('js/selectize.min.js') !!}
    {!! Html::script('js/jquery-confirm.min.js') !!}
    {!! Charts::assets(['highcharts']) !!}
@endsection

@section('content')

    @include('layouts.header', ['active' => 'admin'])

    <div class="container-fluid no-margin-container no-padding-container" style="height:100%;">

        <div class="row">
            <div class="col-2 no-padding-container" style="height:100%;padding-top: 30px!important;">

                <div class="w3-padding-large w3-center">
                    <i class="fa fa-tachometer fa-3x"></i>
                </div>

                <div class="div-divider">

                </div>

                <!-- Nav tabs -->
                <ul class="nav nav-pills flex-column nav-fill" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#challenges" role="tab">Challenges</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#categories" role="tab">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#users" role="tab">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#reports" role="tab">Reports</a>
                    </li>

                </ul>
            </div>

            <div class="col-10" style="background: gainsboro;">
                <div class="container">
                    <div class="tab-content">
                        <!-- Home -->
                        <div class="tab-pane animated fadeIn active" id="home" role="tabpanel">
                            <div class="shadow" style="background: white;margin:40px;">
                                <div class="w3-padding w3-margin-bottom" style="border-bottom:1px solid gainsboro">
                                    <h4>App Summary</h4>
                                </div>

                                <div class="row w3-center" style="padding:40px 30px">
                                    <div class="col" >
                                        <i class="fa fa-file-image-o fa-4x"></i>
                                        <h2>{{ $pictures->count() }}</h2>
                                        {{ $pictures->count() == 0? 'Picture' : 'Pictures' }}
                                    </div>
                                    <div class="col">
                                        <i class="fa fa-trophy fa-4x"></i>
                                        <h2>{{ $challenges->count() }}</h2>
                                        {{ $challenges->count() == 0? 'Challenge' : 'Challenges' }}
                                    </div>
                                    <div class="col">
                                        <i class="fa fa-bookmark fa-4x"></i>
                                        <h2>{{ $categories->count() }}</h2>
                                        {{ $categories->count() == 0? 'Category' : 'Categories' }}
                                    </div>
                                    <div class="col">
                                        <i class="fa fa-users fa-4x"></i>
                                        <h2>{{ $users->count() }}</h2>
                                        {{ $users->count() == 0? 'User' : 'Users' }}
                                    </div>
                                </div>
                            </div>

                            <div class="shadow" style="background: white;margin:40px;height:500px">
                                <div class="w3-padding w3-margin-bottom" style="border-bottom:1px solid gainsboro">
                                    <h4>App Activity Stats</h4>
                                </div>

                                <div>
                                    {!! $appActivity->render() !!}
                                </div>

                            </div>
                        </div>
                        @include('pages.admin.challenges')
                        @include('pages.admin.categories')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pages.admin.partials.add-challenge')
    @include('pages.admin.partials.add-category')

    @foreach($challenges as $challenge)
        @include('pages.admin.partials.edit-challenge',['data' => $challenge])
    @endforeach

    @foreach($categories as $category)
        @include('pages.admin.partials.edit-category',['data' => $category])
    @endforeach

@endsection
