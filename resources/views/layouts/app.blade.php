<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Nombre del tab --}}
    <title>{{ config('app.name') }}-@yield('title')</title>
    
    {{-- Styles --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- CDN para los iconos de FontAwesome --}}
    <script src="https://kit.fontawesome.com/de17adf649.js" crossorigin="anonymous"></script>

</head>

<body>
    <div id="app">
        
        {{-- Llama al header --}}
        @include('layouts.header')

        {{-- Contenido principal de la aplicacion --}}
        <div class="min-100vh">
            @yield('content')
        </div>
        
        @guest
        {{-- Componente solo visible para invitados --}}
        <x-auth-banner/>
        @endguest
        
        {{-- Llama al footer --}}
        @include('layouts.footer')

    </div>

    {{-- Scripts para todas las paginas  --}}
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- Scripts para usar en algunas paginas --}}
    @yield('scripts')

</body>

</html>
