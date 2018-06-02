<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Transaction;

class FetchController extends Controller
{
  public function main(Request $request){
    $data = [];
    $calc = Item::all()->firstWhere('namebrand',$_POST['namebrand']);
    $calc1 = Transaction::where('item_id',$calc->id)->where('type','check-in')->sum('quantity');
    $calc2 = Transaction::where('item_id',$calc->id)->where('type','check-out')->sum('quantity');


    if($calc===null || $calc===0){
      $data = ['message' => 'empty query result'];
    } else{
      array_push($data,
        [
          'item_id' => $calc->id,
          'barcode' => $calc->barcode,
          'image' => $calc->image,
          'quantity' => $calc1-$calc2,
          'value' => $calc->retailprice,
        ]
      );
    }

    return json_encode($data);
  }
}
