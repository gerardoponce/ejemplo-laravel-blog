<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>Plot - @yield('tab-title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- <!-- Fonts --> --}}
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/main.css') }}" rel="stylesheet"> --}}

    <!-- Place your kit's code here -->
    <script src="https://kit.fontawesome.com/de17adf649.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
        <header class="container-fluid px-0">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container-md">
                    <section class="">
                        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                            <img src="{{ asset('img/logo.svg') }}" class="img-fluid" alt="Logo con forma de rombo" loading="lazy">
                            <span class="h1 text-secondary">Plot</span>
                        </a>
                    </section>
    
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            
                        </ul>
                                
                            
                        
    
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <form class="form-inline">
                                    <div class="input-group">
                                        <input class="form-control rounded-pill bg-light mr-1 py-2 pr-5" type="search" placeholder="Buscar">
                                        <span class="input-group-append">
                                            <button class="btn border-0 rounded-pill ml-n5" type="button">
                                                  <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn text-secondary px-4" href="#">Populares</a>
                            </li>
                            <li class="nav-item">
                                <div class="dropdown text-center">
                                    <button class="btn dropdown-toggle text-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Categorías
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </li>

                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link btn text-secondary px-4" href="{{ route('login') }}">Iniciar sesión</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-primary rounded-0 font-weight-bolder text-white ml-3 px-4" href="{{ route('register') }}">Regístrate</a>
                                    </li>
                                @endif
                            <!-- Authentication Links -->
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('writer.profile.edit') }}">
                                            Configuración
                                        </a>
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
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main class="container-md py-4 vh-100">
            @yield('content')
        </main>
        
        @guest
        {{-- Componente solo visible para invitados --}}
        <x-auth-banner/>
        @endguest

        <footer class="container-fluid px-0 bg-dark">
            <div class="container-md">
                <div class="row text-white p-3">
                    <section class="col-6 col-md-3">
                        <h4>Información de contacto</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae sed neque aut quas corporis ut nihil soluta nulla tenetur ratione temporibus est ad quam aspernatur aliquam hic, quisquam impedit recusandae?</p>
                    </section>
                    <section class="col-6 col-md-3">
                        <h4>¿Qué es Plot?</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit provident velit officia, laborum, non neque corrupti eos et magni atque nemo molestias! Facere facilis eligendi quae pariatur exercitationem cumque non?</p>
                    </section>
                    <section class="col-md-3 ocultar">
                        <h4>Lorem1</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus recusandae sunt debitis facere voluptate, accusantium consequuntur rem beatae excepturi quam possimus? Eos, numquam adipisci eveniet suscipit accusantium obcaecati alias laborum.</p>
                    </section>
                    <section class="col-md-3 ocultar">
                        <h4>Lorem2</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto quos excepturi consequatur laboriosam omnis ex animi architecto expedita consectetur sunt sapiente, adipisci natus debitis itaque quas nisi delectus tempore laudantium.</p>
                    </section>
                </div>
            </div>
        </footer>

    </div>
</body>
</html>
