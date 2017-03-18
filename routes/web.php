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
    //$links = \App\Link::paginate(10);
    $links = \App\Link::orderBy('updated_at', 'desc')->paginate(10);
    return view('welcome', compact('links'));
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/submit', 'SubmitController@index');
Route::get('/users', 'UsersController@index');
Route::get('/user/{name}', 'UsersController@user');
Route::get('/user/{name}/submissions', 'UsersController@userSubmissions');
Route::get('/upvote/{id}', function($id){
    if (!Auth::check()){
        return redirect('/login');
    }
    $user = Auth::id();
    $link = \App\Link::where('id','=',$id)->firstOrFail();
    $vote = \App\Vote::firstOrCreate(['link_id' => $link->id, 'user_id' => $user]);
    $link->touch();
    return redirect('/');
});
Route::get('/unvote/{id}', function($id){
    if (!Auth::check()){
        return redirect('/login');
    }
    $user = Auth::id();
    $link = \App\Link::where('id','=',$id)->firstOrFail();
    $unvote = \App\Vote::where(['link_id' =>  $link->id, 'user_id' => $user]);
    $unvote->delete();
    //$link->touch();
    return redirect('/');
});

Route::post('/submit', 'SubmitController@submit'); 