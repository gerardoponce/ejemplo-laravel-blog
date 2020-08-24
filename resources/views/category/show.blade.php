@extends('layouts.app')
@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div>
    <a class="btn btn-success" href="{{ route('admin.categories.edit', ['category' => $category['slug']]) }}">Editar categoría</a>
</div>

<div>
    <h2>{{ $category['name'] }}</h2>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Título</th>
            <th>Descripción</th>
            <th>Opciones</th>
        </tr>
    </thead>
    {{-- <tbody>
        @foreach ($category['articles'] as $article)
        <tr>
            <th scope="row">{{ $article->title }}</th>
            <td>{{ $article->excerpt }}</td>
            <td>  
                <a class="btn btn-sm btn-outline-info text-dark" href=" {{ route('admin.categories.show', ['category' => $article->slug]) }}">Ver más</a>
            </td>
        </tr>
        @endforeach

    </tbody> --}}
</table>


@endsection