@extends('layouts.app')
@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

{{-- Formulario modal --}}
<x-create-model-form id="createForm" modalTitle="Crear categoría" textName="name" textareaName="description" textNamePH="Nombre" textareaNamePH="Descripción" modelName="categoría"/>
{{-- Formulario modal --}}

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
                <a href="{{ route('admin.categories.edit', ['category' => $category->slug]) }}">Editar</a>
            </td>
            <td>
                {!! Form::open(['route' => ['admin.categories.destroy', 'category' => $category->slug,], 'method' => 'DELETE']) !!}
                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection