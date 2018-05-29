<?php

use Faker\Generator as Faker;

$factory->define(App\Itemincoming::class, function (Faker $faker) {
  $id = App\Item::select('id')->get()->random()['id'];
  $price = rand(1, 9)*10000 + rand(1, 9)*1000 + rand(1, 9)*100 + rand(1, 9)*10 + rand(1, 9)*1 + rand(1, 100)*0.01;

  return [
    'item_id' => $id,
    'user_id' => 3,

    'receivedate' => today(),
    'quantity' => rand(1,10),
    'purchaseinvoice' => $faker->ean8,
    'purchaseprice' => $price,
  ];
});
