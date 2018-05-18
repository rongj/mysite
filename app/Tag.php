<?php

namespace App;

use App\Model;

class Tag extends Model
{
    protected $guarded = [];  // 不可以注入的字段

    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }
}
