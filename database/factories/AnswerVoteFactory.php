<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AnswerVote>
 */
class AnswerVoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "answer_id" => $this->faker->numberBetween(1, 10),
            "voted_by" => $this->faker->numberBetween(1, 4),
            "is_upvote" => $this->faker->boolean(),
        ];
    }
}
