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

// Route::get('/', function () {
// 	return view('layouts.app');
// });

Auth::routes();


Route::prefix('admin')->group(function(){

	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/dashboard', 'AdminController@index')->name('admin.home');
});

Route::get('/home', 'HomeController@index')->name('home');



Route::get('cruds', 'CrudController@index');
Route::get('cruds/create', 'CrudController@create')->name('cruds.index');
Route::post('cruds/store', 'CrudController@store')->name('cruds.store');


Route::resource('questions', 'QuestionController')->except(['show']);
Route::get('questions/{slug}','QuestionController@show')->name('questions.show');

Route::resource('questions.answers', 'AnswerController')->except(['index', 'create', 'show']);
