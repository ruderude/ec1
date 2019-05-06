<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      // adminユーザーを定義
      App\User::create([
         'password' => Hash::make('password'),
         'name_kanji' => '訓志',
         'name_kana' => 'くんし',
         'sex' => '1',
         'email' => 'admin@admin.com',
         'postal' => '1111111',
         'prefectures' => '1',
         'address1' => '新宿区',
         'remember_token' => str_random(10),
      ]);


    }
}
