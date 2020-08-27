@extends('layouts.app')
@section('content')

<h1>Otro error</h1>
@auth
    @if (Auth::user()->getRoleNames()->first() == 'admin')
    <a class="btn btn-primary" href=" {{ route('admin.index')}}">HOME</a>
    @elseif (Auth::user()->getRoleNames()->first() == 'writer')
    <a class="btn btn-primary" href=" {{ route('index')}}">HOME</a>
    @endif
@else
    <a class="btn btn-primary" href=" {{ route('index')}}">HOME</a>
@endauth

@endsection