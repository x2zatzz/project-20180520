<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Item extends Model
{
  use SoftDeletes;

  public function itemincomings()
  {
    return $this->hasMany('App\Itemincoming');
  }
  public function itemoutgoings()
  {
    return $this->hasMany('App\Itemoutgoing');
  }
  public function users()
  {
    return $this->hasMany('App\User');
  }
}
