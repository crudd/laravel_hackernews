<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = 'links';
     
     /**
     * Get the username associated with the link.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function votes()
    {
        return $this->hasMany('App\Vote');
    }
}
