<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = \App\User::all();
        return view('users', compact('users'));
    }
    
    public function user($name)
    {
        $user = \App\User::where('name', '=', $name)->first();
        return view('user', compact('user'));
    }

    public function userSubmissions($name)
    {
        $user = \App\User::where('name', '=', $name)->first();
        if (!$user){
            return view('user', compact('user'));
        }else{
            $items = \App\Item::where('user_id', '=', $user->id)->paginate(10);
        }
        return view('submissions', compact('items'));
    }
}
