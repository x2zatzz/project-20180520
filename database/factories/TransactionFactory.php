<?php

use Faker\Generator as Faker;

$factory->define(App\Transaction::class, function (Faker $faker) {

  $id = App\Item::all()->random()->id;
  $value = App\Item::find($id)->retailprice;
  $calc = App\Transaction::where('item_id',$id)->where('type','check-in')->sum('quantity');
  $calc1 = App\Transaction::where('item_id',$id)->where('type','check-out')->sum('quantity');
  if($calc === 0){
    $type = 'check-in';
    $quantity = rand(1, 20);
  } else{
    $type = ['check-in', 'check-out'][array_rand([0,1])];
    $quantity = rand(1, $calc-$calc1);
  }
  // $id = App\Transaction::select('item_id')->where('type','check-in')->where('quantity','>',1)->get()->random()['item_id'];
  // $quantity = rand(1, (App\Transaction::where('item_id', $id)->where('type','check-in')->where('quantity', '!=', 0)->sum('quantity'))-(App\Transaction::where('item_id', $id)->where('type', 'check-out')->sum('quantity')));
  // $quantity = rand(, ;

  return
  [
    'user_id' => 3,
    'item_id' => $id,
    'type' => $type,
    'date' => now(),
    'quantity' => $quantity,
    'value' => $value,
    'invoice' => uniqid(),
  ];
});
