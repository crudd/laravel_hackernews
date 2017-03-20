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
use Illuminate\Http\Request;

Route::get('/', 'ItemsController@index');
Route::get('/new', 'ItemsController@new')->name('new');
Route::get('/item/{item}', 'ItemsController@show');
Route::get('/submit', 'ItemsController@create')->name('submit');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users', 'UsersController@index');
Route::get('/user/{name}', 'UsersController@user');
Route::get('/user/{name}/submissions', 'UsersController@userSubmissions');
Route::get('/upvote/{id}', 'VotesController@upvote');
Route::get('/unvote/{id}', "VotesController@unvote");

Route::post('/item/{item}/comment', 'ItemsController@store');
Route::post('/submit', 'ItemsController@store'); 

Auth::routes();