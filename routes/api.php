<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::resource('questions', 'QuestionController');

Route::resource('tasks', 'API\TaskController');
Route::get('task_list','API\TaskController@taskList');

Route::post('register', 'API\UserController@register');
Route::post('login', 'API\UserController@login');
Route::post('logout', 'API\UserController@logout');

Route::group(['middleware' => ['jwt.verity']], function(){
    Route::get('user', 'API\UserController@user');
    Route::post('topics', 'API\TopicController@store');
    Route::get('topics', 'API\TopicController@index');

});

// Route::group(['prefix' => 'topics'], function(){
//     Route::post('/', 'API\TopicController@store')->middleware('auth:api');

// });