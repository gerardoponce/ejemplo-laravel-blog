<header class="px-0">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container-md">

            <section>
                <a class="navbar-brand d-flex align-items-center" href="@yield('header-link')">
                    <img src="{{ asset('img/logo.svg') }}" class="img-fluid my-auto" alt="Logo con forma de rombo" loading="lazy">
                    <span class="h1 text-secondary my-auto">Plot @yield('header-title')</span>
                </a>
            </section>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    
                </ul>
                        
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <form class="form-group my-auto">
                            <div class="ocultar-md input-group">
                                <input class="form-control rounded-pill bg-light mr-1 py-2 pr-5" type="search" placeholder="Buscar">
                                <span class="input-group-append">
                                    <button class="btn border-0 rounded-pill ml-n5" type="button">
                                          <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </li>
                </ul>
                    
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    
                    <li class="nav-item my-auto">
                        <a class="nav-link btn text-secondary ocultar-md mx-1 px-4" href="#">Populares</a>
                    </li>
                    <li class="nav-item my-auto">
                        <div class="dropdown text-center">
                            <button class="btn dropdown-toggle text-secondary mx-1 px-4" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categorías
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @isset($header_categories)
                                @foreach ($header_categories as $category)
                                <a class="dropdown-item text-secondary" href="#">{{ $category->name }}</a>
                                @endforeach
                            @else
                                <a class="dropdown-item text-secondary" href="#">No existen categorías</a>
                            </div>
                            @endisset
                        </div>                            
                    </li>

                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item my-auto">
                            <a class="nav-link btn text-secondary rounded-0 mx-1 px-4" href="{{ route('login') }}">Iniciar sesión</a>
                        </li>
                        <li class="nav-item my-auto">
                            <a class="nav-link btn btn-primary text-white rounded-0 font-weight-bolder mx-1 px-4" href="{{ route('register') }}">Regístrate</a>
                        </li>
                    <!-- Authentication Links -->
                    @else
                        <li class="nav-item dropdown btn text-center my-auto">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} {{ Auth::user()->last_name }}<span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                @if (Auth::user()->getRoleNames()->first() == 'admin')
                                <a class="dropdown-item" href="{{ route('admin.categories.index')}}">
                                    Categorías
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.categories.index')}}">
                                    Etiquetas
                                </a>
                                @elseif (Auth::user()->getRoleNames()->first() == 'writer')
                                <a class="dropdown-item" href="{{ route('writer.articles.create')}}">
                                    Crear artículo
                                </a>
                                <a class="dropdown-item" href="{{ route('writer.profile.edit') }}">
                                    Configuración
                                </a>
                                @endif

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                {!! Form::open(['route' => 'logout', 'id' => 'logout-form', 'style' => "display: none;"]) !!}
                                {!! Form::close() !!}
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
