<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table = 'votes';
    protected $fillable = [
        'user_id', 'link_id',
    ];

    public function links()
    {
        return $this->hasOne('App\Links');
    }
}
