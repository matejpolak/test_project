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

Route::get('/', 'indexController@index');

Route::get('/authors/list', 'authorController@list');

Route::get('/authors/create', 'authorController@create');

Route::get('/books', 'booksController@index');

Route::post('/books/{id}', 'booksController@store');

Route::post('/book/new', 'booksController@new');

Route::post('/author/new', 'authorController@new');

Route::get('/authors/delete/{id}', 'authorController@destroy');

Route::post('/author/edit/{id}', 'authorController@edit');