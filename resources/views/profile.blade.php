@extends('layouts.app')

@section('content')
<div class="container-xl">
    <div class="row">
        <div class="col-md-5 text-center">
            <img class="rounded-circle img-thumbnail" src="{{ $user->image_path }}">
            <p>{{'@' . $user->username }}</p>
        </div>
        <div class="col-md-6 offset-md-1 my-auto">
                <div class="col-md-12 border m-1 p-2">
                    <p>{{ $user->name }} {{ $user->last_name }}</p>
                    <p>{{ $user->email }}</p>
                </div>

                <div class="col-md-12 border m-1 p-2">
                    @isset($user->description)
                    <p>{{ $user->description }}</p>
                    @else
                    <p>No hay descripción</p>
                    @endisset
                </div>
            
        
        </div>
    </div>
    <div class="row">
        @foreach ($articles as $article)
        <div class="col-12 col-sm-6 col-md-6 col-lg-4">
            <div class="card mb-3">
                    <img src="{{ $article->article_image_path }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ $article->summary}}</p>
                        <p class="card-text"><small class="text-muted"> {{$article->created_at}}</small></p>
                    </div>
                    <div class="card-footer">
                        <div class="float-left">
                            <a class="btn btn-sm btn-secondary my-auto" href="{{ route('article', ['user' => $user->username, 'article' => $article->slug]) }}">Ver más</a>
                        </div>
                    </div>
            </div>
        </div>    
        @endforeach
    </div>
    <section class="d-flex justify-content-center">
        {{ $articles->links() }}
    </section>
</div>
@endsection
