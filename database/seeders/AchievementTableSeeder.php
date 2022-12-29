<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AchievementTableSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Achievement::factory(10)->create();
    }
}
