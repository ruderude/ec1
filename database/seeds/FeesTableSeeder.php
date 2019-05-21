<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Fee;

class FeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fee::create([
            'underprice' => '0',
            'overprice' => '9999',
            'fee' => '300'
        ]);

        Fee::create([
            'underprice' => '10000',
            'overprice' => '29999',
            'fee' => '400'
        ]);

        Fee::create([
            'underprice' => '30000',
            'overprice' => '99999',
            'fee' => '600'
        ]);

        Fee::create([
            'underprice' => '100000',
            'overprice' => '300000',
            'fee' => '1000'
        ]);
    }
}
