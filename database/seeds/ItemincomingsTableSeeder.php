<?php

use Illuminate\Database\Seeder;

class ItemincomingsTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    factory(App\Itemincoming::class, 20)->create();
  }
}
