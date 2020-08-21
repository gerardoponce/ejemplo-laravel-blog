<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Pagina de inicio, solo para usuarios no autenticados
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/pruebas', function () {
    return view('layouts.app');
});

// Rutas para los usuarios autenticados
Route::middleware( ['auth'] )->group( function() {

    // Ruta para los administradores
    Route::namespace( 'Admin' )->prefix( '/admin' )->group( function() {

        Route::get('/', 'AdminController')
            ->middleware('permission:admin.home')
            ->name('admin.index');
   
        Route::get('/categories', 'CategoryController@index')
            ->middleware('permission:categories.index')
            ->name('admin.categories.index');
        
        Route::get('/categories/create', 'CategoryController@create')
            ->middleware('permission:categories.create')
            ->name('admin.categories.create');
        
        Route::post('/categories/store', 'CategoryController@store')
            ->middleware('permission:categories.create')
            ->name('admin.categories.store');
        
        Route::get('/categories/{category}', 'CategoryController@show')
            ->middleware('permission:categories.show')
            ->name('admin.categories.show');
        
        Route::get('/categories/{category}/edit', 'CategoryController@edit')
            ->middleware('permission:categories.edit')
            ->name('admin.categories.edit');
        
        Route::patch('/categories/{category}', 'CategoryController@update')
            ->middleware('permission:categories.edit')
            ->name('admin.categories.update');
        
        Route::delete('/categories/{category}', 'CategoryController@destroy')
            ->middleware('permission:categories.destroy')
            ->name('admin.categories.destroy');

    });

    // Ruta para los escritores
    Route::namespace( 'Writer' )->group( function() {
        Route::get('/home', 'WriterController')->middleware('permission:writer.home');
    });

});
