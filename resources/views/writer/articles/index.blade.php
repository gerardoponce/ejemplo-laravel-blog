@extends('layouts.app')

@section('content')
<div class="container-xl my-3">
    <section class="row">
        @foreach ($articles as $article)
        <div class="col-12 col-sm-6 col-md-6 col-lg-4">
            <div class="card mb-3">
                    <img src="{{ $article->image_path }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ $article->summary}}</p>
                        <p class="card-text"><small class="text-muted"> {{$article->created_at}}</small></p>
                    </div>
                    <div class="card-footer">
                        <div class="float-left">
                            <a class="btn btn-sm my-auto" href="{{ route('writer.articles.show', ['article' => $article->slug]) }}">Ver más</a>
                        </div>
                        <div class="float-right">
                            @if ($article->published == 1)
                            <span class="badge badge-success my-auto">Publicado</span>
                            @else
                            <span class="badge badge-warning my-auto">No publicado</span>
                            @endif
                        </div>
                    </div>
            </div>
        </div>    
        @endforeach
    </section>
    <section class="d-flex justify-content-center">
        {{ $articles->links() }}
    </section>
</div>

@endsection