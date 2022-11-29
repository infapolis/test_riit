<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\RefCitySeeder;
use Database\Seeders\RefEducationSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\UsersToCitiesSeeder;
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
            RefCitySeeder::class,
            RefEducationSeeder::class,
            UserSeeder::class,
            UsersToCitiesSeeder::class,
        ]);
    }
}
