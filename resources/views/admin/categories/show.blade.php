@extends('layouts.app')
@section('content')

<div class="container-lg">
    @if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div>
    <a class="btn btn-success" href="{{ route('admin.categories.edit', ['category' => $category['slug']]) }}">Editar categoría</a>
</div>

<div class="row">
    <section class="col-6">
        <div class="card">
            <img src="{{ $category->image_path }}" alt="" class="card-img-top img-fluid">
            <div class="card-body">
                <h2>{{ $category->name }}</h2>
                <p class="card-text">{{ $category->description }}</p>
            </div>
        </div>
    </section>
    <section class="col-6">
        <div class="card">
            <p>informacion de la categoria</p>
        </div>
    </section>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Título</th>
            <th>Descripción</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
        <tr>
            <th scope="row">{{ $article->title }}</th>
            <td>{{ $article->summary }}</td>
            <td>  
                <a class="btn btn-sm btn-outline-info text-dark" href=" {{ route('article', ['user'=>$article->username,'article' => $article->slug]) }}">Ver más</a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

{{ $articles->links() }}
</div>

@endsection