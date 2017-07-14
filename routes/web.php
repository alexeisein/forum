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

Route::group(['middleware' => ['web']], function ()
{
	Route::get('/posts', [
			'as' => 'posts.all',
			'uses' => 'PagesController@getAllQuestions'
		]);

	Route::get('/posts/{slug}', [
			'as' => 'posts.single',
			'uses' => 'PagesController@getSingleQuestion'
		])->where('slug', '[\w\d\-\_]+');

	Route::group(['middleware' => 'auth'], function ()
	{
		Route::group(['prefix' => 'user'], function ()
		{
			Route::get('/dashboard', [
					'as' => 'user.dashboard',
					'uses' => 'UserProfileController@dashboard'
				]);

			Route::get('/settings', [
					'as' => 'user.settings',
					'uses' => 'UserProfileController@settings'
				]);
			Route::get('/', [
					'as' => 'user.all',
					'uses' => 'UserProfileController@allUsers'
				]);
			Route::get('/view', [
					'as' => 'user.view',
					'uses' => 'UserProfileController@viewUser'
				]);

			Route::get('/profile', [
					'as' => 'user.profile',
					'uses' => 'UserProfileController@profile'
				]);
			Route::get('/profile/{profile}', [
					'as' => 'user.show',
					'uses' => 'UserProfileController@show'
				]);

		});

		Route::resource('/categories', 'CategoriesController', ['except' => ['create']]);

		Route::resource('/questions', 'QuestionsController');

		Route::resource('/replies', 'RepliesController', ['except' => ['index','create']]);

	});
});




Auth::routes();

