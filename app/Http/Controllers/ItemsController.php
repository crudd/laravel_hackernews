<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = \App\Item::where('parent', '=', '0')->orderBy('updated_at', 'desc')->paginate(10);
        return view('welcome', compact('items'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        $items = \App\Item::where('parent', '=', '0')->orderBy('created_at', 'desc')->paginate(10);
        return view('welcome', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('submit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required_without:parent|max:255',
            'url' => 'required_without:text|max:255|unique:items|nullable',
            'text' => 'required_without:url|max:255',
            'user_id' =>'required',
        ]);

        $item = new \App\Item;
        $item->title = $request->title;
        $item->url = $request->url;
        $item->text = $request->text;
        $item->user_id = $request->user_id;
        if ($request->parent){
            $item->parent = $request->parent;
            $parent = \App\Item::where('id', '=', $item->parent)->first();
            $parent->touch();
        }
        $item->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //$item = \App\Item::where('id', '=' ,$item)->firstOrFail();
        return view('item', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
