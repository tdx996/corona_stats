<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index');
Route::get('/infogram', 'HomeController@infogram')->name('infogram');
Route::post('/anketa/{poll}','PollsController@answer')->name('polls.answer');
Route::get('/kontakt','ContactController@show')->name('contact');
Route::post('/kontakt','ContactController@send')->name('contact');

Route::get('/debata-o-koronavirusu', 'QuestionsController@index')->name('questions.index');
Route::get('/debata-o-koronavirusu/{question}', 'QuestionsController@show')->name('questions.show');
Route::post('/debata-o-koronavirusu/{question}/odgovori', 'AnswersController@store')->name('questions.answers');
Route::post('/debata-o-koronavirusu/{question}/odgovori/{answer}/up-vote', 'AnswersController@upVote')->name('questions.answers.up_vote');
Route::post('/debata-o-koronavirusu/{question}/odgovori/{answer}/down-vote', 'AnswersController@downVote')->name('questions.answers.down_vote');
