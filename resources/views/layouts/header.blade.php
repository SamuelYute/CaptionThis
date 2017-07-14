<!-- Navbar -->
<div class="container-fluid shadow">
    <nav class="navbar navbar-toggleable-md navbar-transparent bg-faded">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon w3-text-white"><i class="fa fa-bars w3-xlarge"></i></span>
        </button>
        <a class="navbar-brand" href="{{ URL::route('index') }}">Crisp</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ $active == 'home'? 'active' : ''}}">
                    <a class="nav-link" href="{{ URL::route('index') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ $active == 'challenges'? 'active' : ''}}">
                    <a class="nav-link" href="{{ URL::route('challenges') }}">Challenges</a>
                </li>

                <li class="nav-item {{ $active == 'gallery'? 'active' : ''}}">
                    <a class="nav-link" href="#">Gallery</a>
                </li>

                <li class="nav-item {{ $active == 'about'? 'active' : ''}}">
                    <a class="nav-link" href="#">About</a>
                </li>

                @if(Auth::check() && Auth::user()->role == 'admin')
                    <li class="nav-item {{ $active == 'admin'? 'active' : ''}}">
                        <a class="nav-link" href="{{ URL::route('admin') }}">Admin</a>
                    </li>
                @endif

                <li class="nav-item {{ $active == 'dashboard'? 'active' : ''}}">
                    <div class="dropdown">
                        <a class="nav-link" href="#" role="button" id="account-drop-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle-o w3-xlarge"></i></a>

                        <div class="dropdown-menu dropdown-menu-right" id="account-drop-menu" aria-labelledby="account-drop-btn">
                            @if (Auth::guest())
                                <a class="dropdown-item" href="{{url('/login')}}"><i class="fa fa-sign-in"></i> Login</a>
                                <a class="dropdown-item" href="{{url('/register')}}" ><i class="fa fa-plus"></i> Sign Up</a>
                            @else
                                <div>
                                    @if(Auth::user()->avatar)
                                        <img src="{{ Auth::user()->avatar }}"  class="img-circle img-thumbnail img-responsive" alt="Cinque Terre" width="100" height="85" style="margin:15px 25px;">
                                    @else
                                        <i class="fa fa-user-circle-o fa-5x"></i>
                                    @endif
                                </div>
                                <a class="dropdown-item"><h4>{{ Auth::user()->username ? Auth::user()->username : Auth::user()->firstname.' '.Auth::user()->lastname }}</h4></a>
                                <a class="dropdown-item" href="{{ URL::route('dashboard.home') }}"><i class="fa fa-btn fa-dashboard"></i> My Space</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-btn fa-sign-out"></i> Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            @endif
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
