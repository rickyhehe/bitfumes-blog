<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    public function tags()
    {
      return $this->belongsToMany('App\Model\user\tag')->withTimestamps();
    }
}
