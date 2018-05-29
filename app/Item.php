<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
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
