<?php

use Illuminate\Database\Seeder;

class ItemoutgoingsTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    factory(App\Itemoutgoing::class, 1)->create();
    factory(App\Itemoutgoing::class, 1)->create();
    factory(App\Itemoutgoing::class, 1)->create();
    factory(App\Itemoutgoing::class, 1)->create();
    factory(App\Itemoutgoing::class, 1)->create();
    factory(App\Itemoutgoing::class, 1)->create();
    factory(App\Itemoutgoing::class, 1)->create();
    factory(App\Itemoutgoing::class, 1)->create();
    factory(App\Itemoutgoing::class, 1)->create();
  }
}
