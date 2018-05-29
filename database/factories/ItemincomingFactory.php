<?php

use Faker\Generator as Faker;


$factory->define(App\Itemincoming::class, function (Faker $faker) {
  $price = rand(1, 9)*10000 + rand(1, 9)*1000 + rand(1, 9)*100 + rand(1, 9)*10 + rand(1, 9)*1 + rand(1, 100)*0.01;
  $unit_array = ['qty', 'set', 'pack'];
  $unit = array_rand($unit_array,1);

  return [
    'receivedate' => today(),
    'name' => $faker->word,
    'brand' => $faker->word,
    'model' => $faker->word,
    'description' => $faker->sentence,
    'unit' => $unit_array[$unit],
    'quantity' => rand(1,10),
    'retailprice' => $price,
    'localcode' => $faker->ean8,
    'barcode' => $faker->ean13,
    'purchaseinvoice' => $faker->ean8,
    'purchaseprice' => $price,
    'user_id' => 3,
  ];
});
