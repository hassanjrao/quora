<?php

namespace Database\Seeders;

use App\Models\AnswerVote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnswerVoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AnswerVote::factory()->count(40)->create();
    }
}
