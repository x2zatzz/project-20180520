<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Items extends Model
{
  use SoftDeletes;

  protected $dates = ['deleted_at'];

  public function itemincomings()
  {
    return $this->belongsTo('App\Itemincoming');
  }

  public function itemoutgoings()
  {
    return $this->belongsTo('App\Itemoutgoing');
  }


}
