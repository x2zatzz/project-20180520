<?php

use Faker\Generator as Faker;
use App\Itemicoming;

$factory->define(App\Itemoutgoing::class, function (Faker $faker) {
  $id = App\Itemincoming::select('id')->get()->random()['id'];
  $unit = App\Itemincoming::find($id)->unit;
  $quantity = App\Itemincoming::find($id)->quantity;
  $soldprice = App\Itemincoming::find($id)->retailprice;
  $localcode = App\Itemincoming::find($id)->localcode;
  $barcode = App\Itemincoming::find($id)->barcode;
  $salesinvoice = App\Itemincoming::find($id)->salesinvoice;

  return [
    'itemincoming_id' => $id,
    'checkoutdate' => today(),
    'unit' => $unit,
    'quantity' => $quantity,
    'soldprice' => $soldprice,
    'localcode' => $localcode,
    'barcode' => $barcode,
    'salesinvoice' => $salesinvoice,
    'user_id' => 4,
  ];
});
