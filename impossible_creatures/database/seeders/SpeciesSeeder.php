<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SpeciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('species')->insert([
            'name' => "chat",
            'user_id' => 1,
        ]);

        DB::table('species')->insert([
            'name' => "chient",
            'user_id' => 2,
        ]);

        DB::table('species')->insert([
            'name' => "chaient",
            'user_id' => 3,
            'parent1_id' => 2,
            'parent2_id' => 1,
        ]);
    }
}
