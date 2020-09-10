@extends('layouts.app')
@section('tab-title', 'Artículo')
@section('content')
    <main class="container-lg my-2 py-2 px-5">
        <section class="text-center">
            <img src="{{ $article->image_path }}" alt="" class="img-fluid">
        </section>
        <section class="">
            <div>
                <h2 class="h1 my-2">{{ $article->title }}</h2>
                <p class="h4 my-1">{{ '@'.$user->username }}</p>
                <p class="h3 my-2">{{ $article->summary }}</p>
            </div>
            <div>
                {{ $article->text }}
            </div>
        </section>
    </main>
@endsection