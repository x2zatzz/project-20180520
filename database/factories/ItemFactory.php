<?php

use Faker\Generator as Faker;

$factory->define(App\Item::class, function (Faker $faker) {
  $price = rand(1, 9)*10000 + rand(1, 9)*1000 + rand(1, 9)*100 + rand(1, 9)*10 + rand(1, 9)*1 + rand(1, 100)*0.01;

  return [
    'name' => $faker->unique()->word,
    'brand' => $faker->word,
    'model' => $faker->word,
    'description' => $faker->sentence,
    'retailprice' => $price,

    'localcode' => $faker->ean8,
    'barcode' => $faker->ean13,
    'image' => $faker->imageUrl($width=200, $height=200, 'cats'),
    'user_id' => 3,
  ];
});
