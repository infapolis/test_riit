<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RefCity;

class RefCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RefCity::create(array('name' => 'Москва'));
        RefCity::create(array('name' => 'Санкт-Петербург'));
        RefCity::create(array('name' => 'Новосибирск'));
        RefCity::create(array('name' => 'Красноярск'));
        RefCity::create(array('name' => 'Владивосток'));
    }
}
