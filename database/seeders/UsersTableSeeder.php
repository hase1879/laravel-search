<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => '丸山 未希子',
        ]);

        User::create([
            'name' => '樋浦 圭',
        ]);

        User::create([
            'name' => '田口 舞子',
        ]);

        User::create([
            'name' => '八尾 努',
        ]);

        User::create([
            'name' => '吉田 亮佑',
        ]);

        User::create([
            'name' => '川根 裕志',
        ]);

        User::create([
            'name' => '澤田 亜矢子',
        ]);

        User::create([
            'name' => '松澤 真弓',
        ]);
    }
}
