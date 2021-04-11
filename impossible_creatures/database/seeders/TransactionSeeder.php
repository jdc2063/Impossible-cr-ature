<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            'price' => 10,
            'sale_at' => '2021-03-30 10:28:00',
            'purchase_at' => '2021-03-30 10:28:00',
            'animal_sold_id' => 2,
            'user_saller_id' => 1,
            'buyer_user_id' => 2,
        ]);

      DB::table('transactions')->insert([
            'price' => 30,
            'sale_at' => '2021-03-30 10:28:00',
            'purchase_at' => '2021-03-30 10:28:00',
            'animal_sold_id' => 2,
            'user_saller_id' => 2,
            'buyer_user_id' => 1,
        ]);

      DB::table('transactions')->insert([
            'price' => 20,
            'sale_at' => '2021-03-30 10:28:00',
            'purchase_at' => '2021-03-30 10:28:00',
            'animal_sold_id' => 3,
            'user_saller_id' => 3,
            'buyer_user_id' => 2,
        ]);

      DB::table('transactions')->insert([
            'price' => 50,
            'sale_at' => '2021-03-30 10:28:00',
            'purchase_at' => '2021-03-30 10:28:00',
            'animal_sold_id' => 3,
            'user_saller_id' => 2,
            'buyer_user_id' => 1,
        ]);
    }
}
