<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(array('name' => 'Сергей', 'education_id' => '1'));
        User::create(array('name' => 'Владимир', 'education_id' => '2'));
        User::create(array('name' => 'Иван', 'education_id' => '1'));
        User::create(array('name' => 'Семен', 'education_id' => '3'));
        User::create(array('name' => 'Анна', 'education_id' => '4'));
        User::create(array('name' => 'Елена', 'education_id' => '2'));
        User::create(array('name' => 'Мария', 'education_id' => '4'));
        User::create(array('name' => 'Алексей', 'education_id' => '1'));
        User::create(array('name' => 'Николай', 'education_id' => '3'));
        User::create(array('name' => 'Оксана', 'education_id' => '4'));
        User::create(array('name' => 'Александр', 'education_id' => '3'));
        User::create(array('name' => 'Ирина', 'education_id' => '2'));
        User::create(array('name' => 'Михаил', 'education_id' => '4'));
        User::create(array('name' => 'Мария', 'education_id' => '4'));
        User::create(array('name' => 'Евгений', 'education_id' => '1'));
    }
}
