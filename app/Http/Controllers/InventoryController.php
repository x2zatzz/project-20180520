<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Storage;
use App\Item;
use App\Transaction;

class InventoryController extends Controller
{
  public function checkout(Request $request){

    $transaction = new Transaction;

    $transaction->user_id = Auth::user()->id;
    $transaction->item_id = Item::all()->firstWhere('namebrand',$request->item_name)->id;
    $transaction->type = 'check-out';
    $transaction->date = $request->checkoutdate.' '.$request->checkouttime;
    $transaction->quantity = $request->quantity;
    $transaction->value = $request->soldprice;
    $transaction->invoice = $request->salesinvoice;

    $transaction->save();

    return redirect('')->with(
      [
        'snackbar' => 'snackbar-success',
        'message' => 'Transaction successfully logged',
      ]
    );
  }

  public function checkin(Request $request){

    $transaction = new Transaction;

    $transaction->user_id = Auth::user()->id;
    $transaction->item_id = Item::all()->firstWhere('namebrand',$request->item_name)->id;
    $transaction->type = 'check-in';
    $transaction->date = $request->checkindate.' '.$request->checkintime;
    $transaction->quantity = $request->quantity;
    $transaction->value = $request->purchaseprice;
    $transaction->invoice = $request->purchaseinvoice;

    $transaction->save();

    return redirect('')->with(
      [
        'snackbar' => 'snackbar-success',
        'message' => 'Transaction successfully logged',
      ]
    );
  }

  public function newitem(Request $request){
    $item = new Item;

    $filename = ($item->all()->sortBy('id')->last()->id + 1) . '.jpg';

    $item->name = $request->name;
    $item->brand = $request->brand;
    $item->namebrand = $request->brand . '-' . $request->name;
    $item->model = $request->model;
    $item->description = $request->description;
    $item->retailprice = $request->retailprice;
    $item->image = $filename;
    $item->user_id = Auth::user()->id;

    $item->save();

    $path = Storage::putFileAs('public/image', $request->file('image'), $filename);

    return redirect('')->with(
      [
        'snackbar' => 'snackbar-success',
        'message' => 'Successfully registered new item',
      ]
    );
  }

  public function updateitem(Request $request){

    $item = Item::all()->find($request->item_id);
    $filename = ($item->id) . '.jpg';

    if($request->name !== null && $request->name !== $item->name){
      $item->name = $request->name;
    }
    if($request->brand !== null && $request->brand !== $item->brand){
      $item->brand = $request->brand;
    }
    if($request->brand . '-' . $request->name !== null && $request->brand . '-' . $request->name !== $item->namebrand){
      $item->namebrand = $request->brand . '-' . $request->name;
    }
    if($request->model !== null && $request->model !== $item->model){
      $item->model = $request->model;
    }
    if($request->description !== null && $request->description !== $item->description){
      $item->description = $request->description;
    }
    if($request->retailprice !== null && $request->retailprice !== $item->retailprice){
      $item->retailprice = $request->retailprice;
    }
    if($request->image !== null && $request->image !== $item->image){
      $item->image = $filename;
      $path = Storage::putFileAs('public/image', $request->file('image'), $filename);
    }
    $item->user_id = Auth::user()->id;

    $item->save();

    return redirect('')->with(
      [
        'snackbar' => 'snackbar-success',
        'message' => 'Successfully updated item information',
      ]
    );
  }
}
