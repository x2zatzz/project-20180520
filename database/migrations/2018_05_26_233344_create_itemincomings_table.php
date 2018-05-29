<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemincomingsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('itemincomings', function (Blueprint $table) {
      $table->increments('id');
      
      $table->date('receivedate');
      $table->string('name');
      $table->string('brand');
      $table->string('model');
      $table->longText('description')->nullable();
      
      $table->enum('unit', ['qty', 'set', 'pack'])->default('qty');
      $table->unsignedSmallInteger('quantity');
      $table->decimal('retailprice', 8, 2);
      
      $table->string('localcode')->nullable();
      $table->string('barcode')->nullable();
      $table->string('purchaseinvoice')->nullable();
      $table->decimal('purchaseprice', 8, 2)->nullable();
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
    Schema::dropIfExists('itemincomings');
  }
}
