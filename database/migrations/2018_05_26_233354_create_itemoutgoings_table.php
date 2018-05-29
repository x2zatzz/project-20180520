<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemoutgoingsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('itemoutgoings', function (Blueprint $table) {
      $table->increments('id');
      
      $table->unsignedInteger('itemincoming_id');
      $table->date('checkoutdate');

      $table->enum('unit', ['qty', 'set', 'pack'])->default('qty');
      $table->unsignedSmallInteger('quantity');
      $table->decimal('soldprice', 8, 2);

      $table->string('localcode')->nullable();
      $table->string('barcode')->nullable();
      $table->string('salesinvoice')->nullable();
      $table->unsignedInteger('user_id');

      $table->timestamps();
      $table->softDeletes();

      $table->foreign('itemincoming_id')
            ->references('id')->on('itemincomings')
            ->onDelete('cascade');
      $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('itemoutgoings');
  }
}
