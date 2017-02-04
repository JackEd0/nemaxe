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

Route::get('/', 'HomeController@index');
Route::resource('cards', 'CardController', ['only' => [
    'show'
]]);

Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', 'UserController');
    Route::resource('comments', 'CommentController');
    Route::resource('tags', 'TagController');
    Route::resource('cards', 'CardController', ['except' => [
        'show'
    ]]);


    Route::get('/logout', 'Auth\LoginController@logout');
});
