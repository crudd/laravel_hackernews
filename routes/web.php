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
    $links = \App\Link::paginate(10);
    return view('welcome', compact('links'));
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/submit', 'SubmitController@index');
Route::get('/users', 'UsersController@index');
Route::get('/user/{name}', function($name){
    $user = \App\User::where('name', '=', $name)->firstOrFail();
    return view('user', compact('user'));
});
Route::get('/user/{name}/submissions', function($name){
    $user = \App\User::where('name', '=', $name)->firstOrFail();
    $links = \App\Link::where('user_id', '=', $user->id)->paginate(10);
    return view('submissions', compact('links'));
});
Route::get('/upvote/{id}', function($id){
    if (!Auth::check()){
        return redirect('/login');
    }
    $user = Auth::id();
    $link = \App\Link::where('id','=',$id)->firstOrFail();
    $fack = \App\Vote::firstOrCreate(['link_id' => $link->id, 'user_id' => $user]);
    //$fack
    return redirect('/');
});

Route::post('/submit', function(Request $request) {
    $validator = Validator::make($request->all(), [
        'title' => 'required|max:255',
        'url' => 'required_without:text|max:255|url|unique:links|nullable',
        'text' => 'required_without:url|max:255',
        'user_id' =>'required',
    ]);
    if ($validator->fails()) {
        return back()
            ->withInput($request->input())
            ->withErrors($validator);
    }
    $link = new \App\Link;
    $link->title = $request->title;
    $link->url = $request->url;// ?: 'NULL';
    $link->text = $request->text;// ?: 'NULL';
    $link->user_id = $request->user_id;
    $link->save();
    return redirect('/');
});