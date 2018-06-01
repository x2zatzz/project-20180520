<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomingOutgoingTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('incoming_outgoing', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('item_id');
      $table->unsignedInteger('itemincoming_id');
      $table->unsignedInteger('itemoutgoing_id');
      $table->timestamps();
    });
  }
  
  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('incoming_outgoing');
  }
}
