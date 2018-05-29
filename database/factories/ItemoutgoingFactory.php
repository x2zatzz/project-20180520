<?php

use Faker\Generator as Faker;

$factory->define(App\Itemoutgoing::class, function (Faker $faker) {
  $id = App\Item::select('id')->get()->random()['id'];
  $quantity = rand(1, App\Itemincoming::where('item_id', $id)->sum('quantity')-App\Itemoutgoing::where('item_id', $id)->sum('quantity'));
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
