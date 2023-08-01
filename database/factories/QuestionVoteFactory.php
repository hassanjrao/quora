<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\QuestionVote>
 */
class QuestionVoteFactory extends Factory
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
            "voted_by" => $this->faker->numberBetween(1, 4),
            "is_upvote" => $this->faker->boolean(),
        ];
    }
}
