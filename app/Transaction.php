<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Transaction extends Model
{
  use SoftDeletes;


  protected $fillable = [
    'user_id', 'item_id', 'type', 'date', 'quantity', 'value', 'invoice',
  ];

  public function users()
  {
    return $this->belongsTo('App\User');
  }

  public function items()
  {
    return $this->belongsTo('App\Item');
  }
}
