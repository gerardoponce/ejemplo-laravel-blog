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
    Route::get('/', 'HomeController@getHome')->name('home');

});

Auth::routes();

Route::get('/pruebas', function () {
    return view('layouts.app');
});

// Rutas para los usuarios autenticados
Route::middleware( ['auth'] )->group( function() {

    // Rutas para los admins
    Route::namespace( 'Admin' )->prefix( '/admin' )
        ->middleware('role:admin')
        ->group( function() {

        Route::get('/', 'AdminController@getHome')
            ->name('admin.home');
   
        Route::get('/categories', 'CategoryController@index')
            ->name('admin.categories.index');
        
        Route::get('/categories/create', 'CategoryController@create')
            ->name('admin.categories.create');
        
        Route::post('/categories/store', 'CategoryController@store')
            ->name('admin.categories.store');
        
        Route::get('/categories/{category}', 'CategoryController@show')
            ->name('admin.categories.show');
        
        Route::get('/categories/{category}/edit', 'CategoryController@edit')
            ->name('admin.categories.edit');
        
        Route::put('/categories/{category}', 'CategoryController@update')
            ->name('admin.categories.update');
        
        Route::delete('/categories/{category}', 'CategoryController@destroy')
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

        Route::put('/config', 'WriterController@updateProfile')
            ->middleware('permission:writer.update')
            ->name('writer.profile.updateProfile');

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
