<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class SubmitController extends Controller
{
    public function index()
    {
        return view('submit');
    }

    public function submit(Request $request) 
    {
        $validator = \Validator::make($request->all(), [
            'title' => 'required|max:255',
            'url' => 'required_without:text|max:255',
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
        $link->url = $request->url ?: 'NULL';
        $link->text = $request->text ?: 'NULL';
        $link->user_id = $request->user_id;
        $link->save();
        return redirect('/');
    }
}
