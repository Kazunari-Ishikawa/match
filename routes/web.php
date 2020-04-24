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
Route::get('/works', 'WorksController@index')->name('works.index');
Route::post('/api/works', 'WorksController@getworks');

// ログイン時のみのルーティング
Route::group(['middleware' => 'auth'], function(){
    Route::get('/mypage', function() {
        return view('mypage');
    });
    // Users
    Route::get('/users/edit', 'UsersController@edit')->name('users.edit');
    Route::post('/users/edit', 'UsersController@update');
    // Works
    Route::get('/works/new', 'WorksController@new')->name('works.new');
    Route::post('/works/new', 'WorksController@create');
});

