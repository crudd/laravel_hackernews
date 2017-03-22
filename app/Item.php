<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
     
     /**
     * Get the username associated with the item.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function votes()
    {
        return $this->hasMany('App\Vote');
    }

    public function comments()
    {
        return $this->hasMany('App\Item', 'parent')->orderBy('id', 'desc');
    }

    public function allComments()
    {
        return $this->comments()->with('allComments');
    }

    public function getCommentsCount()
    {
        return $this->comments->first()->count();    //returns count of all items, not just thread comments :/
        return $this->comments->where('id', '=', $this->id)->count(); //returns 0
    }

}
