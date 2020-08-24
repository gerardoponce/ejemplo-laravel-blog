@extends('layouts.app')

@section('content')
<div class="row">
    @foreach ($articles as $article)
    <div class="col-12 col-sm-6 col-md-6 col-lg-4">
        <div class="card mb-3">
                <img src="{{ $article->image_path}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text">{{ $article->sub_title}}</p>
                    <p class="card-text"><small class="text-muted"> {{$article->created_at}}</small></p>
                </div>
                <div class="card-footer">
                    <a class="btn btn-sm" href="{{ route('writer.articles.show', ['article' => $article->slug]) }}">Ver más</a>
                </div>
        </div>
    </div>    
    @endforeach
</div>
{{ $articles->links() }}
@endsection