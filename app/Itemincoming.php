<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Itemincoming extends Model
{
  use SoftDeletes;

  public function items()
  {
    return $this->hasMany('App\Item');
  }
  public function users()
  {
    return $this->belongsTo('App\User');
  }
  public function itemoutgoing()
  {
    return $this->hasMany('App\Itemoutgoing');
  }
}
