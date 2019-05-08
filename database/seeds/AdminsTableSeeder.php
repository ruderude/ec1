<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      Admin::create([
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('password')
            ]);
    }
}
