<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
      factory(App\Item::class, 30)->create();
    }
}
