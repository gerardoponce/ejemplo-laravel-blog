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
            <div class="card-deck mb-3">
                <div class="card">
                    <img src="{{ asset('img/image1.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href=""><h5 class="card-title">Card title</h5></a>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card">
                    <img src="{{ asset('img/image2.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href=""><h5 class="card-title">Card title</h5></a>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card">
                    <img src="{{ asset('img/image3.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href=""><h5 class="card-title">Card title</h5></a>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
            <div class="card-deck">
                <div class="card">
                    <img src="{{ asset('img/image1.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href=""><h5 class="card-title">Card title</h5></a>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card">
                    <img src="{{ asset('img/image2.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href=""><h5 class="card-title">Card title</h5></a>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card">
                    <img src="{{ asset('img/image3.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href=""><h5 class="card-title">Card title</h5></a>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
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