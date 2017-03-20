<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

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
}
