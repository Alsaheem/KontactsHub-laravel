<!-- navbar -->
<nav class="container navbar navbar-expand-sm navbar-light bd-navbar fixed-top py-4">
    <button type="button" class="btn-outline-transparent btn-transparent navbar-toggler bg-info " data-toggle="collapse" data-target="#nav"><span class="navbar-toggler-icon"></span></button>
    <a class="navbar-brand text-light" href="{{ route('home') }}">
        <i class="fas fa-address-book fa-2x text-info" width="30" height="30" class="d-inline-block align-top"></i>
        KontactsHub
    </a>
    <div class="collapse navbar-collapse justify-content-center" id="nav">
        <br>
        <form class="col-md-5" id="myForm">
            <div class="input-group">
                <input id="myInput" type="text" data-target="#contact" class="form-control search-input" placeholder="Find a contact...">
                <button type="button" class="btn btn-white search-button"><i class="fas fa-search text-danger"></i></button>
            </div>
        </form>
    </div>

    {{--<ul class="navbar-nav ml-auto " >--}}
        <!-- Authentication Links -->
        @guest
            <li class="nav-item" >
                <a class="nav-link"  href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            <li class="nav-item">
                @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            </li>
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->username }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        <a href="#" class="fa-lg mr-xl-3"><i class="fas fa-phone"></i></a>
        <a href="#" class="fa-lg" data-toggle="modal" data-target="#addcontact"><i class="fas fa-user-plus"></i></a>
        @endguest
    {{--</ul>--}}


</nav>
