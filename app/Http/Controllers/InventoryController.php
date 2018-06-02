<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
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

    // DB::table('transactions')->insert(
    //   [
    //     [
    //       'user_id' => Auth::user()->id,
    //       'item_id' => Item::all()->firstWhere('namebrand',$request->item_name)->id,
    //       'type' => 'check-out',
    //       'date' => $request->checkoutdate.' '.$request->checkouttime,
    //       'quantity' => $request->quantity,
    //       'value' => $request->soldprice,
    //       'invoice' => $request->salesinvoice,
    //     ]
    //   ]
    // );

    return redirect('/');
  }
}
