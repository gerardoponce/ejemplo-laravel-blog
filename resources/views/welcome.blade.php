@extends('layouts.app')
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
                            <h5>First slide label</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/image2.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/image3.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="recent-articles">
        <div class="container">
            <div class="subtitle">
                <a href=""><h3>Reciente</h3></a>
            </div>
            <div class="articles">
            <div class="card-deck">
                <div class="card">
                    <img src="{{ asset('img/image1.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card">
                    <img src="{{ asset('img/image2.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card">
                    <img src="{{ asset('img/image3.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
            <div class="card-deck">
                <div class="card">
                    <img src="{{ asset('img/image1.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card">
                    <img src="{{ asset('img/image2.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card">
                    <img src="{{ asset('img/image3.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
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
            <div class="subtitle">
                <a href=""><h3>Categorias</h3></a>
            </div>
            <div class="categories-container">
                <div class="categorie">
                    <div class="image">
                        <img src="{{  asset('img/image1.jpg') }}" alt="">
                    </div>
                    <div class="categorie-title">
                        <h3>Titulo de la categoria</h3>
                    </div>
                </div>
                <div class="categorie">
                    <div class="image">
                        <img src="{{  asset('img/image2.jpg') }}" alt="">
                    </div>
                    <div class="categorie-title">
                        <h3>Titulo de la categoria</h3>
                    </div>
                </div>
                <div class="categorie">
                    <div class="image">
                        <img src="{{  asset('img/image3.jpg') }}" alt="">
                    </div>
                    <div class="categorie-title">
                        <h3>Titulo de la categoria</h3>
                    </div>
                </div>
                <div class="categorie">
                    <div class="image">
                        <img src="{{  asset('img/image1.jpg') }}" alt="">
                    </div>
                    <div class="categorie-title">
                        <h3>Titulo de la categoria</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sentence">
        <div class="container">
            <h3>Hello world !!!</h3>
        </div>
    </section>
    <section class="option-login">
        <div class="container">
            <div class="description">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque optio id aliquam expedita iusto! Atque perspiciatis nemo facere quasi consequuntur.
            </div>
            <div class="buttons">
                <a class="btn btn-primary" href="">Registrate</a>
                <a class="btn btn-primary" href="">Iniciar Sesión</a>
            </div>
        </div>
    </section>
    <footer>
        <div class="social-networks">
            
        </div>
    </footer>
@endsection