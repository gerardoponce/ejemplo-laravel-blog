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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['admin'])->prefix('admin')->group(function () {

    Route::get('home', 'HomeController@adminIndex');

});

Route::middleware(['writer'])->group(function () {

    Route::get('home', 'HomeController@writerIndex');

});

Route::middleware(['auth'])->prefix('admin')->namespace('Admin')->group(function () {
   
    Route::get('categories', 'AdminCategoryController@index')
        ->name('categories.index')
        ->middleware('permission:categories.index');
    
    Route::get('categories/create', 'AdminCategoryController@create')
        ->name('categories.create')
        ->middleware('permission:categories.create');
    
    Route::post('categories/store', 'AdminCategoryController@store')
        ->name('categories.store')
        ->middleware('permission:categories.create');
    
    Route::get('categories/{category}', 'AdminCategoryController@show')
        ->name('categories.show')
        ->middleware('permission:categories.show');
    
    Route::get('categories/{category}/edit', 'AdminCategoryController@edit')
        ->name('categories.edit')
        ->middleware('permission:categories.edit');
    
    Route::patch('categories/{category}', 'AdminCategoryController@update')
        ->name('categories.update')
        ->middleware('permission:categories.edit');
    
    Route::delete('categories/{category}', 'AdminCategoryController@destroy')
        ->name('categories.destroy')
        ->middleware('permission:categories.destroy');

});
