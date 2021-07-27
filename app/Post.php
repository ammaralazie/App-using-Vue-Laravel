<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $gaurded=[''];

    public function users(){
        return $this->belongsTo(User::class);
    }//end of users
}
