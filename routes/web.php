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

// Rutas sin middleware    
Route::get('/@{user}', 'HomeController@getProfile')->name('profile');

Route::get('/@{user}/{article}', 'HomeController@getArticle')->name('article');

// Rutas para solo invitados
Route::middleware( ['guest'] )->group( function() {

    // Ruta de index de invitados y writers
    Route::get('/', 'HomeController@index')->name('index');

});

Auth::routes();

Route::get('/pruebas', function () {
    return view('layouts.app');
});

// Rutas para los usuarios autenticados
Route::middleware( ['auth'] )->group( function() {

    // Rutas para los admins
    Route::namespace( 'Admin' )->prefix( '/admin' )->group( function() {

        Route::get('/', 'AdminController@getIndex')
            ->middleware('permission:admin.home')
            ->name('admin.index');
   
        Route::get('/categories', 'CategoryController@index')
            ->middleware('permission:admin.categories.index')
            ->name('admin.categories.index');
        
        Route::get('/categories/create', 'CategoryController@create')
            ->middleware('permission:admin.categories.create')
            ->name('admin.categories.create');
        
        Route::post('/categories/store', 'CategoryController@store')
            ->middleware('permission:admin.categories.create')
            ->name('admin.categories.store');
        
        Route::get('/categories/{category}', 'CategoryController@show')
            ->middleware('permission:admin.categories.show')
            ->name('admin.categories.show');
        
        Route::get('/categories/{category}/edit', 'CategoryController@edit')
            ->middleware('permission:admin.categories.edit')
            ->name('admin.categories.edit');
        
        Route::put('/categories/{category}', 'CategoryController@update')
            ->middleware('permission:admin.categories.edit')
            ->name('admin.categories.update');
        
        Route::delete('/categories/{category}', 'CategoryController@destroy')
            ->middleware('permission:admin.categories.destroy')
            ->name('admin.categories.destroy');

    });

    // Rutas para los writers
    Route::namespace( 'Writer' )->group( function() {
        Route::get('/news', 'WriterController@index')
            ->middleware('permission:writer.home')
            ->name('writer.index');

        Route::get('/config', 'WriterController@edit')
            ->middleware('permission:writer.edit')
            ->name('writer.profile.edit');

        Route::post('/config/update', 'WriterController@update')
            ->middleware('permission:writer.update')
            ->name('writer.profile.update');

        Route::get('/me/articles', 'ArticleController@index')
            ->middleware('permission:writer.articles.index')
            ->name('writer.articles.index');

        Route::get('/me/articles/create', 'ArticleController@create')
            ->middleware('permission:writer.articles.create')
            ->name('writer.articles.create');

        Route::post('/me/articles/store', 'ArticleController@store')
            ->middleware('permission:writer.articles.create')
            ->name('writer.articles.store');

        Route::get('/me/articles/{article}', 'ArticleController@show')
            ->middleware('permission:writer.articles.show')
            ->name('writer.articles.show');

        Route::get('/me/articles/{article}/edit', 'ArticleController@edit')
            ->middleware('permission:writer.articles.edit')
            ->name('writer.articles.edit');
        
        Route::put('/me/articles/{article}', 'ArticleController@update')
            ->middleware('permission:writer.articles.edit')
            ->name('writer.articles.update');
        
        Route::delete('/me/articles/{article}', 'ArticleController@destroy')
            ->middleware('permission:writer.articles.destroy')
            ->name('writer.articles.destroy');            
    });

});
