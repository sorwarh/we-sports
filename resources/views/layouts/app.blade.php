<!Doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    {{--    Styles--}}
    <link rel="shortcut icon" type="image/png" href="{{asset('images/favicon.png')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">

    <nav class="navbar navbar-expand-lg bg-dark sticky-top justify-content-between" id="mainMenu">
        <a class="navbar-brand" href="{{url('/')}}">
            <img class="border border-primary rounded-lg" src="{{asset('images/brand-logo.png')}}"
                 alt="WeSports"
                 width="180" height="40">
        </a>
        <button class="navbar-toggler bg-secondary text-dark" type="button" data-toggle="collapse"
                data-target="#navbarMenuContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars text-dark"></i>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarMenuContent">
            @guest

                <div class="nav-item text-center">
                    <a href="{{ route('register') }}" class=" text-decoration-none mx-1">
                        <i class="fas fa-user-plus"> <span class="mx-1">Regístrate</span></i>
                    </a>
                    <a href="{{ route('login') }}" class="text-success text-decoration-none mx-1">
                        <i class="fas fa-user"> <span class="mx-1">Iniciar sessión</span></i>
                    </a>
                </div>

        </div>

        @else

            <div class="nav-item" id="navMenuItems">

                <ul class="navbar-nav mr-auto text-white">
                    <a class="dropdown-item" href="{{url('/dashboard')}}"><i class="fas fa-user-cog"></i>Gestión de cuenta y eventos</a>
                    <a class="dropdown-item" href="{{url('/profile/'.Auth::user()->nickname)}}"><i class="fas fa-user"></i>Ver mi
                        perfil</a>
                    <a class="dropdown-item" href="{{url('/events/create')}}"><i class="fas fa-plus"></i>Crear evento</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>
                        Cerrar sesión
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        @csrf
                    </form>
                </ul>
            </div>
        @endguest

    </nav>
    <main>
        @yield('content')
    </main>
    @if(Auth::check() and Request::url() !== 'http://52.91.0.226/events/create')
        <a href="{{url('/events/create')}}" class="float" id="createEventButton">
            <i class="fa fa-plus my-float fa-2x"></i>
        </a>
    @endif

    <footer>
        @include('components.footer')
    </footer>

</div>

@yield('scripts')

</body>
</html>
