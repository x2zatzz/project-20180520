<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->increments('id');
      $table->string('username')->unique();
      $table->string('password');
      $table->string('role')->default('staff');
      $table->rememberToken();
      $table->softDeletes();
      $table->timestamps();
    });

    DB::table('users')->insert(
      [
        [
          'username' => 'staff',
          'password' => Hash::make('1234'),
          'role' => 'staff',
        ],
        [
          'username' => 'manager',
          'password' => Hash::make('12345'),
          'role' => 'manager',
        ],
        [
          'username' => 'sagaysayjv',
          'password' => Hash::make('1234567890'),
          'role' => 'manager',
        ],
        [
          'username' => 'aquinon',
          'password' => Hash::make('00000'),
          'role' => 'staff',
        ],
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
    Schema::dropIfExists('users');
  }
}
