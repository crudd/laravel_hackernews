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
    
    public function user(){
        //$user = \App\User::
    }
}
