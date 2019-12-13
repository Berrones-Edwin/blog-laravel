<?php

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

Route::redirect('/','blog');

Auth::routes();
Route::group(['namespace'=>'Web'],function(){
    Route::get('blog', 'PageController@blog')->name('blog');
    Route::get('entrada/{slug}', 'PageController@post')->name('post');
    Route::get('categoria/{slug}', 'PageController@category')->name('category');
    Route::get('etiqueta/{slug}', 'PageController@tag')->name('tag');
});

// admin
Route::group(['namespace'=>'Admin'],function(){
    Route::resource('tags', 'TagController');
    // Route::get('tags','TagController@index')->name('tags.index');
    // Route::get('tags/create','TagController@create')->name('tags.create');
    // Route::post('tags','TagController@store')->name('tags.store');


    Route::resource('categories', 'CategoryController');
    Route::resource('posts', 'PostController');
});