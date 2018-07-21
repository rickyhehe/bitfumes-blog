<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
  public function post()
  {
    return $this->hasMany("App\Model\user\post");
  }
}
