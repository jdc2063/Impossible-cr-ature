<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animals')->insert([
            'user_creator_id' => 1,
            'species_id' => 2,
            'user_owner_id' => 1,
        ]);

        DB::table('animals')->insert([
            'user_creator_id' => 2,
            'species_id' => 1,
            'user_owner_id' => 1,
        ]);

        DB::table('animals')->insert([
            'user_creator_id' => 3,
            'species_id' => 3,
            'user_owner_id' => 3,
        ]);
    }
}
