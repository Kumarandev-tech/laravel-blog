<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable=['title','category','content','description','image'];

    public function User()
    {
        $this->belongsTo('post');
    }
}
