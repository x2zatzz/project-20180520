<?php

use Illuminate\Database\Seeder;
use App\Item;

class ItemsTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    factory(App\Item::class, 5)->create();


    for($l=0; $l<count(App\Item::all()); $l++){
      $item = App\Item::find($l+1);
      $item->image = ($l+1).".jpg";
      $item->save();
    }
  }
}
