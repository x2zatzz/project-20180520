<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Itemoutgoing extends Model
{
  use SoftDeletes;

  public function items()
  {
    return $this->belongsTo('App\Item');
  }
  public function users()
  {
    return $this->belongsTo('App\User');
  }
}
