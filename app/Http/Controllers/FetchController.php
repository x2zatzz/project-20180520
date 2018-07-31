<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Transaction;
use App\User;

class FetchController extends Controller
{
  public function itemdetail(Request $request){
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

  public function itemname(){
    $data = '';

    $item = Item::all()->where('name', $_POST['name'])->count();

    if($item > 0){
      $data = "  warning, only one unique name is allowed per brand";
    } else{
      $data = null;
    }

    return json_encode($data);
  }


  public function itembrand(){
    $data = '';

    $name = Item::all()->where('name', $_POST['name'])->count();
    $brand = Item::all()->where('brand', $_POST['brand'])->count();

    if($name > 0 && $brand > 0){
      $data = "  please provide a unique name+brand ID for your new registration";
    } else{
      $data = null;
    }

    return json_encode($data);
  }

  public function itemupdate(){

    $itemid = substr($_POST['item_id'], strpos($_POST['item_id'], '-')+1);

    $data = Item::all()->find($itemid);

    return json_encode($data);
  }

  public function username(){
    $data = '';

    $username = $_POST['username'];

    echo User::select('username')->get();

    return json_encode($data);
  }
}
