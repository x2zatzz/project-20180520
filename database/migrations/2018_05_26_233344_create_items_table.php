<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
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
