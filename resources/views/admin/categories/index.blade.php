@extends('layouts.app')
@section('tab-title', 'Categorías')
@section('header-title', '- Admin')
@section('content')

<div class="container-lg">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <section class="d-flex justify-content-end">
        <div class="p-4">
            {{-- Formulario modal --}}
        <x-create-model-form buttonName="Crear Categoria" id="createForm" method="POST" className="btn btn-primary" modalTitle="Crear categoría" textName="name" textareaName="description" textNamePH="Nombre" textareaNamePH="Descripción" modelName="categoría" route="admin.categories.store"/>
        {{-- Formulario modal --}}
        </div>
    </section>

    <section class="mx-4 px-4">
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">Categoría</th>
                    <th>Descripción</th>
                    <th colspan="3">Opciones</th>
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
                        <x-create-model-form image_path="{{ $category->image_path }}" buttonName="Editar" valueName="{{ $category->name }}" descriptionValue="{{ $category->description }}" className="btn btn-sm btn-outline-secondary" id="{{ $category->slug }}" method="PUT" modalTitle="Editar categoría" textName="name" textareaName="description" textNamePH="Nombre" textareaNamePH="Descripción" modelName="categoría" route="admin.categories.update"/>
                        {{-- <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.categories.edit', ['category' => $category->slug]) }}">Editar</a> --}}
                    </td>
                    <td>
                        {!! Form::open(['route' => ['admin.categories.destroy', 'category' => $category->slug,], 'method' => 'DELETE']) !!}
                            <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</div>

@endsection