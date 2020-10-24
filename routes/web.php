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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('questions', 'QuestionController');
Route::get('question/status/change/{question}', 'QuestionController@statusChange')->name('questions.status.change');


Route::resource('questions.options', 'OptionController');


Route::get('lessons', 'LessonController@index')->name('all.lesson');
Route::get('lessons/questions/{id}', 'LessonController@allQuestion')->name('all.lesson.question');

// question answer route
Route::resource('answers', 'AnswerController');






