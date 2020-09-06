@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 text-center">
            <img class="rounded-circle img-thumbnail" src="{{ $user->image_path }}">
        </div>
        <div class="col-md-6 offset-md-1">
            <div class="form-group row">
                <div class="col-md-12">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nombres" value="{{ $user->name }}" name="name" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Apellidos" name="last_name" value="{{ $user->last_name }}" required autocomplete="name" autofocus>

                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" placeholder="Nombre de usuario" name="username" value="{{ $user->username }}" required autocomplete="name" autofocus>

                    @error('user_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Ingresar correo" name="email" value="{{ $user->email }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Descripción sobre ti" name="description" rows="3">{{ $user->description }}</textarea>
                        @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                </div>
            </div>
            
        
        </div>
    </div>
</div>
@endsection
