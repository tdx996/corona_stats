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
