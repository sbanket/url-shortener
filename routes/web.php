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

Auth::routes();

Route::middleware('auth')->prefix('/crud-url')->group(
    function () {
        Route::get('/list', 'UrlCrudController@list')->name('url.list');
        Route::get('/show/{urlId}', 'UrlCrudController@show')->name('url.show');
        Route::get('/create', 'UrlCrudController@createForm')->name('url.create.form');
        Route::post('/create', 'UrlCrudController@create')->name('url.create');
        Route::delete('/delete/{urlId}', 'UrlCrudController@delete')->name('url.delete');
    }
);

Route::prefix('/')->group(
    function () {
        Route::get('/', 'UrlController@index')->name('home');
        Route::get('/{key}', 'UrlController@visit')->name('visit');
    }
);

