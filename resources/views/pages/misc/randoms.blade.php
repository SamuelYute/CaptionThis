<div class="tab-pane animated fadeIn active" id="random" role="tabpanel">
    <div id="random-pictures-wrapper" class="container-fluid">
        <div class="w3-margin-top w3-padding-large">

            <div class="w3-center w3-padding-large">
                <div  style="display: inline-block">
                    <h2>Random Crisp</h2>
                    <div style="border-bottom: 5px solid gray;width: 70%;margin:auto"></div>
                </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-9">
                @foreach($randomCrip as $picture)
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
              </div>
            </div>
        </div>
    </div>
</div>
