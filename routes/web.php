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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('questions', 'QuestionController')->except('show');
//Route::post('/questions/{question}/answers','AnswersController@store')->name('answers.store');

Route::resource('questions.answer', 'AnswersController')->only(['store','edit','update','destroy']);
Route::get('/questions/{slug}', 'QuestionController@show')->name('questions.show');

Route::post('/answer/{answer}/accept', 'AcceptAnswerController')->name('answers.accept');
