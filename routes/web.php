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


Route::get('/about', function(){

	// return 'About me';

	return view('about');

});

Route::get('post/{id}', function(\illuminate\Http\Request $request, $id){


$post = \App\Models\Post::findOrFail($id);

	return response()->json([
		'title' => $post->title,
		'body' => $post->body,
		'published' => $post->createdAt()
	]);
});

// Route::middleware('test')->get('/custom', function(){
// Route::get('/custom/{id}', function(\illuminate\Http\Request $request, $id){

	
// 	if(!auth()->check()){
		
// 		throw new \App\Exceptions\HackerAlertException;
		
// 	}

// 	return \App\Models\User::findOrFail($id);
	

// 	$tsp = resolve('medium-php-sdk');

// 	dd($tsp);
// 	dd(config('app.developer'));
// 	dd(config('blog'));
// });

Route::get('/queue-test', 'QueueController@index');

Route::get('/', 'QuestionController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('cruds', 'CrudController@index');
Route::get('cruds/create', 'CrudController@create')->name('cruds.index');
Route::post('cruds/store', 'CrudController@store')->name('cruds.store');


Route::resource('questions', 'QuestionController')->except(['show']);

Route::get('questions/{slug}','QuestionController@show')->name('questions.show');

Route::resource('questions.answers', 'AnswerController')->except(['create', 'show']);

Route::post('answers/{answer}/accept', 'AcceptAnswerController')->name('answers.accept');

Route::post('questions/{question}/favorite', 'FavoriteQuestionController@store')->name('questions.favorite');

Route::delete('questions/{question}/favorite', 'FavoriteQuestionController@distroy')->name('questions.unfavorite');

Route::post('questions/{question}/vote', 'VoteQuestionController')->name('questions.vote');

Route::post('answers/{answer}/vote', 'VoteAnswerController')->name('answers.vote');

Route::get('solutions/{id}', 'ProblemController@solutions');
