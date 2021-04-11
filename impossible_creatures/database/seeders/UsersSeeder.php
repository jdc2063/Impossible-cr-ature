<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => "Antoni",
            'password' => Hash::make('password'),
            'gold' => 110,
            'point' => 19,
        ]);

        DB::table('users')->insert([
            'username' => "Jérome",
            'password' => Hash::make('password'),
            'gold' => 0,
            'point' => 157,
        ]);

        DB::table('users')->insert([
            'username' => "Cristine",
            'password' => Hash::make('password'),
            'gold' => 1111,
            'point' => 1405,
        ]);
    }
}
