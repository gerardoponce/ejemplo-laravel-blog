@extends('layouts.app')

@section('tab-title', 'Administrador')
@section('header-title', '- Admin')
@section('content')

    <section class="banner">
        <div class="container">
            <div class="row mt-4">
                <div class="col-sm">
                    <p class="text-center">Total de usuarios<br>{{ $users }}</p>
                </div>
                <div class="col-sm">
                    <p class="text-center">Nro. Categorias<br>{{ count($header_categories) }}</p>
                </div>
                <div class="col-sm">
                    <p class="text-center">Nro. Tags<br>{{ $tags }}</p>
                </div>
            </div>
            <!-- Chart's container -->
            <div class="charts">
                <div id="registerChart" style="height: 300px;" class="registerChart"></div>
                <div id="categoryChart" style="height: 300px;" class="categoryChart"></div>
                <div id="tagChart" style="height: 300px;" class="tagChart"></div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')

    @include('admin.charts.registerChart')
    @include('admin.charts.categoryChart')
    @include('admin.charts.tagChart')

@endsection