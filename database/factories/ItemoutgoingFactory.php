<?php

use Faker\Generator as Faker;

$factory->define(App\Itemoutgoing::class, function (Faker $faker) {
  $id = App\Itemincoming::select('item_id')->where('quantity','>',1)->get()->random()['item_id'];
  $quantity = rand(1, (App\Itemincoming::where('item_id', $id)->where('quantity', '!=', 0)->sum('quantity'))-(App\Itemoutgoing::where('item_id', $id)->sum('quantity')));
  $soldprice = App\Item::find($id)->retailprice;

  return [
    'item_id' => $id,
    'user_id' => 4,
    'checkoutdate' => today(),
    'quantity' => $quantity,
    'soldprice' => $soldprice,
    'salesinvoice' => $faker->ean13,
  ];
});
