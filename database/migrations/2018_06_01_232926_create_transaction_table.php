<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('transactions', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('user_id');
      $table->unsignedInteger('item_id');
      $table->enum('type', ['check-in', 'check-out']);
      $table->datetime('date');
      $table->unsignedInteger('quantity');
      $table->decimal('value', 8, 2);
      $table->string('invoice')->nullable();

      $table->timestamps();
      $table->softDeletes();

      $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
      $table->foreign('item_id')
            ->references('id')->on('items')
            ->onDelete('cascade');
    });

    // DB::table('transactions')->insert(
    //   [
    //     [
    //       'user_id' => 2,
    //       'item_id' => 1,
    //       'type' => 'check-in',
    //       'date' => today(),
    //       'quantity' => rand(1, 10),
    //       'value' => rand(0,9)*10000+rand(0,9)*1000+rand(0,9)*100+rand(0,9)*10+rand(0,9)*1+rand(0,9)*0.1+rand(0,9)*0.01,
    //       'invoice' => uniqid(),
    //     ],
    //     [
    //       'user_id' => 3,
    //       'item_id' => 1,
    //       'type' => 'check-in',
    //       'date' => today(),
    //       'quantity' => rand(1, 10),
    //       'value' => rand(0,9)*10000+rand(0,9)*1000+rand(0,9)*100+rand(0,9)*10+rand(0,9)*1+rand(0,9)*0.1+rand(0,9)*0.01,
    //       'invoice' => uniqid(),
    //     ],
    //   ]
    // );
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('transactions');
  }
}
