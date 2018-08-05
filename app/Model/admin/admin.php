<?php

namespace App\Model\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{
  use Notifiable;
  public function roles()
  {
    return $this->belongsToMany('App\Model\admin\role');
  }
}
