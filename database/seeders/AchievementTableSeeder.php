<?php

namespace Database\Seeder;

use App\Models\Achievement;
use Illuminate\Database\Seeder;

class AchievementTableSeeder extends Seeder
{
    // public $factory;


    public function run()
    {
        // $factory->define(App\Achievement::class, function (Faker $faker) {
        //     return [
        //         'title' => $faker->word,
        //         'description' => $faker->sentence,
        //     ];
        // });

        // $achievement = [ 
        //     [
        //         'id'    =>  1,
        //         'title' =>  '5K SCORE',
        //         'desc'  =>  'Collect 5,000 coins',
        //     ],
        //     [
        //         'id'    =>   2,
        //         'title' => '10K Score',
        //         'desc' => 'Collect 10,000 Score',


        //     ],
        // ];
        $achievement = factory(App\Achievement::class, 10)->create();
    }
}
