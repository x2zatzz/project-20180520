<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Itemoutgoing extends Model
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
  public function itemincoming()
  {
    return $this->belongsTo('App\Itemincoming');
  }
}
