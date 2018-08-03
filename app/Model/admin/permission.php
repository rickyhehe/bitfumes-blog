<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
  public function roles()
  {
    return $this->belongsToMany("App\Model\admin\permission");
  }
}
