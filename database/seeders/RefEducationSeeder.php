<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RefEducation;

class RefEducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RefEducation::create(array('name' => 'Среднее'));
        RefEducation::create(array('name' => 'Бакалавр'));
        RefEducation::create(array('name' => 'Магистр'));
        RefEducation::create(array('name' => 'Специалист'));
    }
}
