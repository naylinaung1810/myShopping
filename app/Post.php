<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public  function postImage()
    {
        return $this->hasMany('App\Postimage');
    }

    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function category()
    {
        return $this->belongsTo("App\Category");
    }

}
