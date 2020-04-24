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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/mypage', function() {
    return view('mypage');
});

// Users
Route::get('/users/{id}', 'UsersController@edit')->name('users.edit');

// Works
Route::get('/works', 'WorksController@index')->name('works.index');
Route::get('/works/new', 'WorksController@new')->name('works.new');
Route::post('/works/new', 'WorksController@create');