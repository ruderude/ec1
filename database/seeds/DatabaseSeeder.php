<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call([
       AdminsTableSeeder::class,
       PaymentsTableSeeder::class,
       FeesTableSeeder::class,
       ItemsTableSeeder::class,
       CategoriesTableSeeder::class,
      ]);
    }
}
