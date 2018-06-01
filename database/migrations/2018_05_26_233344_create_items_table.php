<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Faker\Factory as Faker;

class CreateItemsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    $faker = Faker::create();

    Schema::create('items', function (Blueprint $table) {
      $table->increments('id');

      $table->string('name');
      $table->string('brand');
      $table->string('namebrand');
      $table->string('model');
      $table->longText('description')->nullable();

      $table->decimal('retailprice', 8, 2);

      $table->string('localcode')->nullable();
      $table->string('barcode')->nullable();
      $table->string('image')->nullable();
      $table->unsignedInteger('user_id');

      $table->timestamps();
      $table->softDeletes();

      $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
    });


    $name = $faker->unique()->word;
    $brand = $faker->word;
    $value = rand(0,9)*10000+rand(0,9)*1000+rand(0,9)*100+rand(0,9)*10+rand(0,9)*1+rand(0,9)*0.1+rand(0,9)*0.01;

    DB::table('items')->insert(
      [
        [
          'name' => $name,
          'brand' => $brand,
          'namebrand' => $brand.'-'.$name,
          'model' => $faker->word,
          'description' => $faker->sentence,

          'retailprice' => $value,

          'localcode' => $faker->ean8,
          'barcode' => $faker->ean13,
          'image' => $faker->imageUrl($width=200, $height=200, 'cats'),
          'user_id' => 3,
        ]
      ]
    );

  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('items');
  }
}
