<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Employee::create([
            'user_id' => '1',
            '所属支社' => '東京支社',
            '所属部署' => '総務部',

        ]);

        Employee::create([
            'user_id' => '2',
            '所属支社' => '東京支社',
            '所属部署' => '総務部',

        ]);

        Employee::create([
            'user_id' => '3',
            '所属支社' => '東京支社',
            '所属部署' => 'システム部',

        ]);

        Employee::create([
            'user_id' => '4',
            '所属支社' => '東京支社',
            '所属部署' => 'システム部',

        ]);

        Employee::create([
            'user_id' => '5',
            '所属支社' => '大阪支社',
            '所属部署' => '総務部',

        ]);

        Employee::create([
            'user_id' => '6',
            '所属支社' => '大阪支社',
            '所属部署' => '総務部',

        ]);

        Employee::create([
            'user_id' => '7',
            '所属支社' => '大阪支社',
            '所属部署' => 'システム部',

        ]);

        Employee::create([
            'user_id' => '8',
            '所属支社' => '大阪支社',
            '所属部署' => 'システム部',

        ]);

    }
}
