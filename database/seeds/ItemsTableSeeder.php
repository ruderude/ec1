<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
          'name' => 'カメラ１',
          'manufacturer' => '1',
          'item_code' => '1111',
          'list_price' => '20000',
          'sale_price' => '19800',
          'category_id' => '1',
          'image_url' => 'ffnr1391_01.jpg',
          'item_description' => '良いカメラです。',
          'state' => '0',
        ];
        DB::table('items')->insert($param);
    }
}
