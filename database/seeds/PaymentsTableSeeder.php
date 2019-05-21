<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Payment;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::create([
            'name' => '代引き'
        ]);
    }
}
