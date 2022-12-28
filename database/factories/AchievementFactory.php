<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Achievement>
 */
class AchievementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            $factory->define(App\Achievement::class, function (Faker $faker) {
                return [
                    'name' => $faker->word,
                    'description' => $faker->paragraph,
                ];
            });
        ];
    }
}
