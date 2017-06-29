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

Route::get('setlocale/{locale}', function ($locale) {
    if (array_key_exists($locale, \Config::get('app.locales'))) {
        Session::put('locale', $locale);
    }
    return redirect()->back();
});

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('epreuves/{id}', 'CardController@show');
Route::post('search', 'CardController@search');
Route::get('search', 'CardController@search');

Route::group(['middleware' => ['auth', 'check.permission:2']], function () {
    Route::resource('cards', 'CardController');
    Route::resource('card_types', 'CardTypeController');
    Route::resource('chapters', 'ChapterController');
    Route::resource('fields', 'FieldController');
    Route::resource('grades', 'GradeController');
    Route::resource('subjects', 'SubjectController');

    Route::post('cards/create/{query}', 'CardController@ajaxHandler');
    Route::post('cards/{id}/edit/{query}', 'CardController@ajaxHandler');
});

Route::group(['middleware' => ['auth', 'check.permission:1']], function () {
    Route::resource('users', 'UserController');
    Route::resource('questions', 'QuestionController');
    Route::resource('exercises', 'ExerciseController');
    Route::resource('comments', 'CommentController');
    Route::resource('tags', 'TagController');
});
