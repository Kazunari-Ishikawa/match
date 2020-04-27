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

// ログイン時のみのルーティング
Route::group(['middleware' => 'auth'], function(){
    // Users
    Route::get('/users/edit', 'UsersController@edit')->name('users.edit');
    Route::post('/users/edit', 'UsersController@update');
    Route::get('/users/password/edit', 'UsersController@editPassword')->name('users.editPassword');
    Route::post('/users/password/edit', 'UsersController@updatePassword');
    Route::get('/withdraw', 'UsersController@showWithdrawForm')->name('withdraw');
    Route::post('/withdraw', 'UsersController@withdraw');
    Route::get('/mypage', 'UsersController@mypage')->name('users.mypage');

    // Works
    Route::get('/works/new', 'WorksController@new')->name('works.new');
    Route::post('/works/new', 'WorksController@create');
    Route::get('/works/{id}/edit', 'WorksController@edit')->name('works.edit');
    Route::post('/works/{id}/edit', 'WorksController@update');
    Route::post('/works/{id}/delete', 'WorksController@destroy')->name('works.destroy');
    Route::post('/works/{id}/close', 'WorksController@close')->name('works.close');
    Route::get('/works/registered', 'WorksController@showRegisteredWorks')->name('works.registered');
    Route::get('/api/works/registered', 'WorksController@getRegisteredWorks');
});

Route::get('/works', 'WorksController@index')->name('works.index');
Route::post('/api/works', 'WorksController@getworks');
Route::get('/works/{id}', 'WorksController@show')->name('works.show');
