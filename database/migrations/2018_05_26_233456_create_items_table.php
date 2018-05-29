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
      $table->unsignedInteger('itemincoming_id');
      // name
      // brand
      // model
      // qty
      $table->unsignedInteger('itemoutgoing_id');
      // qty

      $table->timestamps();
      $table->softDeletes();

      $table->foreign('itemincoming_id')
            ->references('id')->on('itemincomings')
            ->onDelete('cascade');
      $table->foreign('itemoutgoing_id')
            ->references('id')->on('itemoutgoings')
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
