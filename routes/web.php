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

Route::get('/', function () {
    $items = \App\Item::orderBy('updated_at', 'desc')->paginate(10);
    return view('welcome', compact('items'));
});

Auth::routes();
Route::get('/item/{id}', function () {return 'Item';});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/submit', 'SubmitController@index')->name('submit');
Route::get('/users', 'UsersController@index');
Route::get('/user/{name}', 'UsersController@user');
Route::get('/user/{name}/submissions', 'UsersController@userSubmissions');
Route::get('/upvote/{id}', 'VotesController@upvote');
Route::get('/unvote/{id}', "VotesController@unvote");

Route::post('/submit', 'SubmitController@submit'); 