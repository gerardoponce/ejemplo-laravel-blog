@extends('layouts.app')
@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
        Crear categoría
    </button>

    <x-create-category/>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Categoría</th>
            <th>Descripción</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <th scope="row">{{ $category->name }}</th>
            <td>{{ $category->description }}</td>
            <td>  
                <a class="btn btn-sm btn-outline-info text-dark" href=" {{ route('admin.categories.show', ['category' => $category->slug]) }}">Ver más</a>
            </td>
            <td>
                <form action="{{ route('admin.categories.destroy', ['category' => $category->slug]) }}" method="POST">
                    
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection