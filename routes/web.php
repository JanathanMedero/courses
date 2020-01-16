<?php


Route::get('/', 'HomeController')->name('home');

Route::middleware(['auth'])->group(function (){
	Route::get('Dashboard/{slug}', 'DashboardController')->name('dashboard');

	//Users
	Route::get('users', 'UsersController@index')->name('users.index');

	//Moderators
	Route::get('moderators', 'ModeratorsController@index')->name('moderators.index');

	//Courses
	Route::get('courses', 'CoursesController@index')->name('courses.index');
});

Auth::routes();
