<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function upvote($id){
        if (!\Auth::check()){
            return redirect('/login');
        }
        $user = \Auth::id();
        $item = \App\Item::where('id','=',$id)->first();
        if ($item){
            $vote = \App\Vote::firstOrCreate(['item_id' => $item->id, 'user_id' => $user]);
            $item->touch();
        }
        return redirect('/');
    }

    public function unvote($id){
        if (!\Auth::check()){
            return redirect('/login');
        }
        $user = \Auth::id();
        $item = \App\Item::where('id','=',$id)->first();
        if ($item){
            $unvote = \App\Vote::where(['item_id' =>  $item->id, 'user_id' => $user]);
            $unvote->delete();
        }
        return redirect('/');
    }
}
