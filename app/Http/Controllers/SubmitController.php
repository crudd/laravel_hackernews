<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class SubmitController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('submit');
    }

    public function submit(Request $request) 
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'url' => 'required_without:text|max:255|unique:items',
            'text' => 'required_without:url|max:255',
            'user_id' =>'required',
        ]);

        $item = new \App\Item;
        $item->title = $request->title;
        $item->url = $request->url;
        $item->text = $request->text;
        $item->user_id = $request->user_id;
        $item->save();
        return redirect('/');
    }
}
