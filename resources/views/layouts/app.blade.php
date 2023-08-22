<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jQuery.js') }}" defer></script>
    <script src="{{ asset('js/materialize.js') }}" defer></script>
    <script src="{{ asset('js/init.js') }}" defer></script>
	@yield('myjs')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/materialize.css') }}" rel="stylesheet">
	<link href="{{ asset('css/general.css') }}" rel="stylesheet">
	@yield('mycss')
</head>

<body>
    <div id="app">
        <ul id="dropdown1" class="dropdown-content">
            <li><a href="{{ url('/leitura') }}">de leitura</a></li>
            <li><a href="{{ url('/tabuada') }}">de tabuada</a></li>
            <li><a href="#!">epacial</a></li>
        </ul>
        <nav>
            <div class="row green accent-2">
                <div class="nav-wrapper col s12">
                    <a class="btn" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>

                    <!-- Right Side Of Navbar -->
                    <ul class="right hide-on-med-and-down">
                        <li>
                            <a class="dropdown-trigger" href="#!" data-target="dropdown1">
                                Simulação
                                <i class="material-icons right">arrow_drop_down</i>
                            </a>
                        </li>
                        <li><a href="{{ route('config') }}">Minhas simulação</a></li>
                        <li><a>Game</a></li>
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li>
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li>
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li>
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ url('/perfil') }}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
		
		
    </div>
</body>

</html>