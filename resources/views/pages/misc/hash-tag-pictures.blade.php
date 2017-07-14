@extends('layouts.master')

@section('styles')
    {!! Html::style('css/challenges.css') !!}
@endsection

@section('content')

    <div class="container-fluid no-padding-container no-margin-container">
        @include('layouts.header',['active' => 'Home'])

        <div class="container w3-center w3-padding-large">

            <div class="w3-text-grey w3-jumbo">
                #
            </div>

            <div class="w3-text-grey w3-xlarge">
                {{$hashTag }}
            </div>

            <div class="w3-padding-large">

            </div>

            <i class="fa fa-long-arrow-down fa-2x"></i>
        </div>
    </div>


    <div id="main-content" class="container-fluid no-padding-container">
        <div class="tab-pane animated fadeIn active" id="random" role="tabpanel">
            <div id="random-pictures-wrapper" class="container-fluid">
                <div class="w3-margin-top w3-padding-large">

                    <div class="w3-center w3-padding-large">
                        <div  style="display: inline-block">
                            <h2>{{ $pictures->count() }} picture(s)</h2>
                            <div style="border-bottom: 5px solid gray;width: 70%;margin:auto"></div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-9">
                            @if($pictures->count() > 0)
                                @foreach($pictures as $picture)
                                    <div class="w3-margin w3-hover-shadow">
                                        <div class="picture-wrapper" data-src="{{ URL::asset('storage'.$picture->low_resolution) }}" data-sub-html='<div class="fb-comments lg-custom-caption">@include('components.lg-caption')</div>'>
                                            <img id="{{ $picture->id }}" src="images/placeholder.jpg" data-src="{{ URL::asset('storage'.$picture->low_resolution) }}" class="img-fluid mx-auto d-block">
                                        </div>

                                        <div class="picture-caption w3-padding-large">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="w3-medium">{{ $picture->user->firstname.' '.$picture->user->lastname }}</div>
                                                    <div class="w3-large">{!! $picture->caption !!}</div>
                                                </div>
                                                <div class="col align-self-center">
                                                    @if (Auth::check())
                                                        @if ($picture->likes->contains('user_id', Auth::user()->id))
                                                            <a class="w3-text-blue" role="button"><i class="fa fa-thumbs-up"></i> <span class="likes-count"> {{$picture->likes->count()}}</span><span class="like-keyword">{{ $picture->likes->count() == 1?' Like':' Likes' }}</span></a>
                                                        @else
                                                            <a id="{{ $picture->id }}" class="like-btn btn w3-hover-blue" role="button"><i class="fa fa-thumbs-up"></i> <span class="likes-count">{{$picture->likes->count()}}</span><span class="like-keyword">{{ $picture->likes->count() == 1?' Like':' Likes' }}</span></a>
                                                        @endif
                                                    @else
                                                        <a id="{{ $picture->id }}" class="like-btn btn w3-hover-blue" role="button"><i class="fa fa-thumbs-up"></i> <span class="likes-count">{{$picture->likes->count()}}</span><span class="like-keyword">{{ $picture->likes->count() == 1?' Like':' Likes' }}</span></a>
                                                    @endif
                                                </div>

                                                <div class="col align-self-center w3-large">
                                                    <a href="{{ URL::route('picture.download',$picture->id) }}" class="download-btn btn w3-hover-dark-gray"><i class="fa fa-cloud-download"></i> Download</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else

                                <div class="w3-center w3-padding">
                                    <h4>There are no pictures with this tag</h4>
                                    <i class="fa fa-frown-o fa-5x"></i>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
