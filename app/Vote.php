<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table = 'votes';
    protected $fillable = [
        'user_id', 'item_id',
    ];
    //protected $touches = ['items'];


    public function items()
    {
        return $this->hasOne('App\Items');
    }
}
