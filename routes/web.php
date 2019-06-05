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

Auth::routes();

Route::get('/lang/{lang}', 'LanguageController@switchLang')->name('lang.switch');

Route::get('/', 'PostsController@index');
Route::get('/{username}', 'ProfilesController@show')->name('profile.show');
Route::get('/p/create', 'PostsController@create');
Route::get('/p/{post}', 'PostsController@show');
Route::post('/p', 'PostsController@store');

Route::get('/profile/edit', 'ProfilesController@edit')->name('profile.edit')->middleware('auth');
Route::put('/profile/update', 'ProfilesController@update')->name('profile.update');

Route::post('/follow/{user}', 'FollowingsController@follow');
Route::put('/follow/{user}', 'FollowingsController@unfollow');
