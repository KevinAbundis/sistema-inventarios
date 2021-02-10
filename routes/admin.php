<?php

Route::prefix('/admin')->group(function(){
	Route::get('/', 'Admin\DashboardController@getDashboard')->name('dashboard');

	//Module Users
	Route::get('/users/{status}','Admin\UsersController@getUsers')->name('user_list');
	Route::get('/user/add', 'Admin\UsersController@getUserAdd')->name('user_add');
	Route::post('/user/add', 'Admin\UsersController@postUserAdd')->name('user_add');
	Route::get('/user/{id}/edit','Admin\UsersController@getUserEdit')->name('user_edit');
	Route::post('/user/{id}/edit','Admin\UsersController@postUserEdit')->name('user_edit');




});
