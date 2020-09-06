@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 text-center">
            <img class="rounded-circle img-thumbnail" src="{{ Auth::user()->image_path ? asset(Auth::user()->image_path) : '/img/default_profile.jpg' }}">
        </div>
        <div class="col-md-6 offset-md-1">
        
        {!! Form::open(['route' => 'writer.profile.updateProfile', 'method' => 'PUT', 'files' => TRUE]) !!}

            <div class="form-group row">
                <div class="col-md-12">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nombres" value="{{ Auth::user()->name }}" name="name" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Apellidos" name="last_name" value="{{ Auth::user()->last_name }}" required autocomplete="name" autofocus>

                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" placeholder="Nombre de usuario" name="username" value="{{ Auth::user()->username }}" required autocomplete="name" autofocus>

                    @error('user_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Ingresar correo" name="email" value="{{ Auth::user()->email }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Descripción sobre ti" name="description" rows="3">{{ Auth::user()->description }}</textarea>
                        @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="image_path" class="col-md-4 col-form-label text-md-center">Subir imagen:</label>

                <div class="col-md-8">
                    <input id="image_path" type="file" class="form-control @error('image_path') is-invalid @enderror" name="image_path" accept="image/*">

                    @error('image_path')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            {!! Form::submit('Grabar', ['class'=>'btn btn-primary btn-lg btn-block']) !!}

        {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
