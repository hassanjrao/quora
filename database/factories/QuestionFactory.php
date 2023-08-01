<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "title" => $this->faker->sentence,
            "details" => $this->faker->paragraph,
            "slug" => $this->faker->slug,
            "total_views" => $this->faker->numberBetween(1, 100),
            "category_id" => $this->faker->numberBetween(1, 10),
            "created_by" => $this->faker->numberBetween(1,4),
        ];
    }
}
