<?php

use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    for($l=20; $l!==0; $l--){
      factory(App\Transaction::class, 1)->create();
    }
  }
}
