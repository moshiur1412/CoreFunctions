<?php

Route::get('/', function(){
	dd('worked from admin');
});

Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/dashboard', 'AdminController@index')->name('admin.home');