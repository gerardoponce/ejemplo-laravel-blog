@extends('layouts.app')
@section('tab-title', 'Portada')
@section('content')
    <main class="container-md">

        {{ $article->text }}

    </main>
@endsection