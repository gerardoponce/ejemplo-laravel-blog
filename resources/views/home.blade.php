@extends('layouts.app')
@section('tab-title', 'Portada')
@section('content')
    <section class="banner">
        <div class="container">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="circle active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1" class="circle"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2" class="circle"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/image1.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            First slide label
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/image2.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            Second slide label
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/image3.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            Third slide label
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="recent-articles">
        <div class="container">
            <div class="subtitle mt-4">
                <h5><a href="">Reciente</a></h5>
            </div>
            <div class="articles">
                <div class="row">
                    @foreach ($articles as $article)
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                        <div class="card mb-3">
                            <img src="{{ $article->image_path}}" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">{{ $article->title }}</h5>
                              <p class="card-text">{{ $article->summary}}</p>
                              <p class="card-text"><small class="text-muted"> {{$article->created_at}}</small></p>
                            </div>
                          </div>
                    </div>    
                    @endforeach
                </div>
            </div>
    </section>
    <section class="categories-principal">
        <div class="container">
            <div class="subtitle mt-4">
                <h5><a href="">Más Categorias</a></h5>
            </div>
        </div>
        <div class="galery">
            <a href="">
            <div class="photo">
                <img src="{{ asset('img/image1.jpg') }}" alt="">
                <div class="title"><h5>Tiulo de la categoria 1</h5></div>
            </div>
            </a>
            <a href="">
            <div class="photo">
                <img src="{{ asset('img/image2.jpg') }}" alt="">
                <div class="title"><h5>Tiulo de la categoria 1</h5></div>
            </div>
            </a>
            <a href="">
            <div class="photo">
                <img src="{{ asset('img/image3.jpg') }}" alt="">
                <div class="title"><h5>Tiulo de la categoria 1</h5></div>
            </div>
            </a>
            <a href="">
            <div class="photo">
                <img src="{{ asset('img/image1.jpg') }}" alt="">
                <div class="title"><h5>Tiulo de la categoria 1</h5></div>
            </div>
            </a>
        </div>
    </section>
    <section class="sentence">
        <div class="container">
            <div class="eslogan">
                <h2>Hello world !!!</h2>
            </div>
        </div>
    </section>
@endsection