@include('layouts.includes.meta')
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel fixed-top">
        <div class="container">
            <a class="h1" href="@guest{{ url('/') }} @else{{route('user_profile')}}@endguest" id="title">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li><a class="speedrun-primary" href="{{ route('login') }}">{{ __('Se connecter') }}</a></li>
                        <li><a class="speedrun-primary" href="{{ route('register') }}">{{ __('S\'inscrire') }}</a></li>
                    @else

                        <li class="nav-item dropdown btn">
                            <a id="navbarDropdown" class="text-light nav-link dropdown-toggle  speedrun-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item speedrun-primary" href="{{route('actu')}}"><i class="mr-2 fas fa-user-friends"></i>Mon réseau</a>
                                <a class="dropdown-item speedrun-primary" href="{{ route('user_profile') }}"><i class="mr-2 fas fa-user"></i>Profil</a>
                                <a class="dropdown-item speedrun-primary" href="{{ route('statistics') }}"><i class="mr-2 fas fa-chart-bar"></i>Mes Statistiques</a>
                                <a class="dropdown-item speedrun-primary" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="mr-1 fas fa-sign-out-alt"></i>
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>