<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\QuestionTag>
 */
class QuestionTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "question_id" => $this->faker->numberBetween(1, 50),
            "tag_id" => $this->faker->numberBetween(1, 10),
        ];
    }
}
