<div class="tab-pane animated fadeIn" id="home" role="tabpanel">
    <div id="home-challenge-wrapper" class="container-fluid no-padding-container">
        <div class="w3-center w3-padding-large">
            <div  style="display: inline-block">
                <h2>This month's Challenges</h2>
                <div style="border-bottom: 5px solid gray;width: 70%;margin:auto"></div>
            </div>
        </div>

        <div id="challenges" class="container">
            @if($currentChallenges->count() > 0)
                <div class="row w3-margin">
                    @foreach($currentChallenges as $challenge)
                    <div class="col">
                        <div class="w3-margin w3-hover-shadow challenge-wrapper">
                            <img src="{{ URL::asset('storage/'.$challenge->display_picture) }}" class="img-fluid"/>
                            <div class="w3-padding w3-margin-bottom">
                                <h3>{{ $challenge->title }}</h3>
                                <p>{{ $challenge->description }}</p>

                                <div class="d-flex justify-content-around">
                                    <div class="p-2">
                                        <button class="btn btn-info">
                                            View
                                        </button>
                                    </div>

                                    <div class="p-2 align-self-center">
                                        <h5><i class="fa fa-picture-o"></i> {{ $challenge->pictures->count() == 1? $challenge->pictures->count().' HD Picture' : $challenge->pictures->count().' HD Pictures'}}</h5>
                                    </div>
                                    <div class="p-2 ml-auto align-self-center w3-small text-muted">
                                        <i class="fa fa-clock-o"></i> {{ Carbon\Carbon::parse($challenge->end_date)->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="w3-padding-large w3-margin" style="text-align: center;">
                    <i class="fa fa-frown-o fa-5x"></i>
                    <h4>Sadly! No Current Challenges</h4>
                </div>
            @endif
        </div>

        <div class="w3-padding-large">

        </div>

        <div id="leader-boards" class="container-fluid">

            <div class="w3-center w3-padding-large">
                <div class="w3-text-white" style="display: inline-block">
                    <h2>Leader Boards</h2>
                    <div style="border-bottom: 5px solid white;width: 70%;margin:auto"></div>
                </div>
            </div>

            <div class="row w3-margin-top">
                <div class="col">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane animated zoomIn active" id="most-views" role="tabpanel">
                            <div class="container-fluid no-padding-container w3-margin-bottom">
                                <img src="images/car.jpg" class="img-fluid img-thumbnail shadow">
                            </div>
                        </div>
                        <div class="tab-pane animated zoomIn" id="most-likes" role="tabpanel">
                            <div class="container-fluid no-padding-container w3-margin-bottom">
                                <img src="images/ballon.jpg" class="img-fluid img-thumbnail shadow">
                            </div>
                        </div>
                        <div class="tab-pane animated zoomIn" id="most-downloads" role="tabpanel">
                            <div id="most" class="container-fluid no-padding-container w3-margin-bottom">
                                <img src="images/cat.jpg" class="img-fluid img-thumbnail shadow">
                            </div>
                        </div>
                    </div>
                </div>

                <!--<div class="d-flex justify-content-around hidden-sm-up">
                    <div class="p-2 align-self-center" style="border-right:3px solid white;height:70%;">

                    </div>
                </div>-->

                <div class="col-3">
                    <div class="w3-margin-top w3-text-white w3-margin-bottom" style="height:100%">
                        <!-- Nav tabs -->
                        <nav class="nav nav-pills w3-center d-flex justify-content-start flex-column" role="tablist" style="height: 100%">
                            <a class="nav-link active" data-toggle="tab" href="#most-views" role="tab">Most Views <br> <i class="fa fa-eye fa-2x"></i> <br> 201</a>
                            <a class="nav-link" data-toggle="tab" href="#most-likes" role="tab">Most Likes <br> <i class="fa fa-thumbs-up fa-2x"></i> <br> 125 </a>
                            <a class="nav-link" data-toggle="tab" href="#most-downloads" role="tab">Most Downloads <br> <i class="fa fa-cloud-download fa-2x"></i> <br> 58</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="w3-padding-large">

        </div>

        <div id="last-month-winners">

            <div class="w3-center w3-padding-large">
                <div style="display: inline-block">
                    <h2>Meet Last Month's Winners</h2>
                    <div style="border-bottom: 5px solid gray;width: 70%;margin:auto"></div>
                </div>
            </div>

            <div id="winners" class="container-fluid no-padding-container">
                <div class="winner">
                    <div class="container">
                        <div class="w3-margin w3-padding-large ">
                            <div class="d-flex justify-content-center">
                                <div class="winner-avatar shadow" style="background: url('/images/art.jpg') center no-repeat;background-size: cover;">

                                </div>
                            </div>

                            <div class="w3-padding w3-margin-bottom w3-center">
                                <h3>Samuel Yute</h3>
                                <p>Art defines us.</p>
                                <h1>Cars in Black</h1>

                                <div class="d-flex justify-content-around w3-padding-large">
                                    <div class="p-2">
                                        <span class="w3-jumbo">306</span>
                                        <br>
                                        <i class="fa fa-eye fa-3x"></i>
                                        <h4>Views</h4>
                                    </div>
                                    <div class="p-2">
                                        <span class="w3-jumbo">274</span>
                                        <br>
                                        <i class="fa fa-thumbs-up fa-3x"></i>
                                        <h4>Likes</h4>
                                    </div>
                                    <div class="p-2">
                                        <span class="w3-jumbo">52</span>
                                        <br>
                                        <i class="fa fa-cloud-download fa-3x"></i>
                                        <h4>Downloads</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w3-center w3-margin-bottom">
                        <i class="fa fa-angle-double-down fa-3x"></i>
                    </div>

                    <div class="parallax" style="background: url('images/lambo.jpg') center no-repeat; background-size: cover;background-attachment: fixed;min-height:500px">

                    </div>
                </div>

                <div class="winner">
                    <div class="container">
                        <div class="w3-margin w3-padding-large ">
                            <div class="d-flex justify-content-center">
                                <div class="winner-avatar shadow" style="background: url('/images/assassin.jpg') center no-repeat;background-size: cover;">

                                </div>
                            </div>

                            <div class="w3-padding w3-margin-bottom w3-center">
                                <h3>John Matekenya</h3>
                                <p>Art defines us.</p>

                                <h2>The Sky</h2>

                                <div class="d-flex justify-content-around w3-padding-large">
                                    <div class="p-2">
                                        <span class="w3-jumbo">209</span>
                                        <br>
                                        <i class="fa fa-eye fa-3x"></i>
                                        <h4>Views</h4>
                                    </div>
                                    <div class="p-2">
                                        <span class="w3-jumbo">178</span>
                                        <br>
                                        <i class="fa fa-thumbs-up fa-3x"></i>
                                        <h4>Likes</h4>
                                    </div>
                                    <div class="p-2">
                                        <span class="w3-jumbo">67</span>
                                        <br>
                                        <i class="fa fa-cloud-download fa-3x"></i>
                                        <h4>Downloads</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w3-center w3-margin-bottom">
                        <i class="fa fa-angle-double-down fa-3x"></i>
                    </div>

                    <div class="parallax" style="background: url('images/ballon.jpg') center no-repeat; background-size: cover;background-attachment: fixed;min-height:500px">

                    </div>
                </div>
            </div>
        </div>

        <div class="w3-padding-large">

        </div>

        <div id="categories" class="container">
            <div class="w3-center w3-padding-large">
                <div style="display: inline-block">
                    <h2>Available Categories</h2>
                    <div style="border-bottom: 5px solid gray;width: 70%;margin:auto"></div>
                </div>
            </div>

            <div class="row d-flex justify-content-center">
                @foreach($categories as $category)
                    <div class="col-3">
                        <div class="category-parent">
                            <div class="category-background" style="background: url('storage/{{ $category->display_picture }}') 50% 50% no-repeat;background-size: cover;">
                                <div class="w3-center w3-margin-top w3-hover-shadow">
                                    <h3>{{ $category->name }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="w3-padding-large">

        </div>
    </div>
</div>