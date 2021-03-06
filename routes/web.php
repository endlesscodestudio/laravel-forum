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

Route::get('/', 'ThreadsController@index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/** Threads */
Route::get('/threads', 'ThreadsController@index');
Route::get('/threads/create', 'ThreadsController@create');
Route::get('threads/{channel}/{thread}', 'ThreadsController@show');
Route::get('threads/{channel}', 'ThreadsController@index');

Route::post('/threads', 'ThreadsController@store');
/** ./Threads */

/** Replies */
Route::post('/threads/{thread}/replies', 'RepliesController@store');
Route::post('threads/{reply}/favorites', 'FavoritesController@store');
/** ./Replies */

/** UsersProfile */
Route::get('/profile/{user}', 'ProfilesController@show')->name('profile');
/** /.UsersProfile */