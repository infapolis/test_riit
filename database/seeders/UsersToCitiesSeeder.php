<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersToCitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_to_cities')->insert(['user_id' => '1', 'ref_city_id' => '1']);
        DB::table('users_to_cities')->insert(['user_id' => '2', 'ref_city_id' => '2']);
        DB::table('users_to_cities')->insert(['user_id' => '3', 'ref_city_id' => '3']);
        DB::table('users_to_cities')->insert(['user_id' => '4', 'ref_city_id' => '4']);
        DB::table('users_to_cities')->insert(['user_id' => '5', 'ref_city_id' => '5']);
        DB::table('users_to_cities')->insert(['user_id' => '6', 'ref_city_id' => '1']);
        DB::table('users_to_cities')->insert(['user_id' => '7', 'ref_city_id' => '2']);
        DB::table('users_to_cities')->insert(['user_id' => '8', 'ref_city_id' => '3']);
        DB::table('users_to_cities')->insert(['user_id' => '9', 'ref_city_id' => '4']);
        DB::table('users_to_cities')->insert(['user_id' => '10', 'ref_city_id' => '5']);
        DB::table('users_to_cities')->insert(['user_id' => '11', 'ref_city_id' => '1']);
        DB::table('users_to_cities')->insert(['user_id' => '12', 'ref_city_id' => '2']);
        DB::table('users_to_cities')->insert(['user_id' => '13', 'ref_city_id' => '3']);
        DB::table('users_to_cities')->insert(['user_id' => '14', 'ref_city_id' => '4']);
        DB::table('users_to_cities')->insert(['user_id' => '15', 'ref_city_id' => '5']);
        DB::table('users_to_cities')->insert(['user_id' => '1', 'ref_city_id' => '2']);
        DB::table('users_to_cities')->insert(['user_id' => '2', 'ref_city_id' => '3']);
        DB::table('users_to_cities')->insert(['user_id' => '3', 'ref_city_id' => '4']);
        DB::table('users_to_cities')->insert(['user_id' => '4', 'ref_city_id' => '5']);
        DB::table('users_to_cities')->insert(['user_id' => '5', 'ref_city_id' => '1']);
    }
}
