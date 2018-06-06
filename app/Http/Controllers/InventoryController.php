<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Item;
use App\Transaction;
use Storage;

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

    return redirect('/');
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

    return redirect('/');
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

    return redirect('/');
  }
}
