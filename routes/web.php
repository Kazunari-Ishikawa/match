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
    Route::get('/api/works/commented', 'WorksController@getCommentedWorks');
    Route::get('/works/applied', 'WorksController@showAppliedWorks')->name('works.applied');
    Route::get('/api/works/applied', 'WorksController@getAppliedWorks');
    Route::post('/works/{id}/apply', 'WorksController@apply')->name('works.apply');
    Route::get('/api/works/{id}/apply', 'WorksController@getApplyCount');

    // Comments
    Route::get('/comments', 'CommentsController@index')->name('comments.index');
    Route::post('/works/{id}/comments/create', 'CommentsController@create')->name('comments.new');
    Route::get('/api/works/{id}/comments/latest', 'CommentsController@getLatestComment');
    Route::post('/api/comments/{id}/delete', 'CommentsController@destroy');

    // Messages
    Route::get('/messages', 'BoardsController@index')->name('messages.index');
    Route::get('/api/boards', 'BoardsController@getBoards');
    Route::get('/api/boards/{id}/messages/latest', 'MessagesController@getLatestMessage');
    Route::post('/api/boards/{id}/delete', 'BoardsController@destroy');
    Route::get('/messages/{id}', 'BoardsController@show')->name('messages.show');
    Route::get('/api/messages/{id}', 'MessagesController@getMessages');
    Route::post('/api/messages/{id}', 'MessagesController@sendMessage');
});

Route::get('/works', 'WorksController@index')->name('works.index');
Route::get('/api/works', 'WorksController@getworks');
Route::get('/works/{id}', 'WorksController@show')->name('works.show');
Route::get('/api/works/{id}/comments', 'CommentsController@getComments');
