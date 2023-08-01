<?php

namespace Database\Seeders;

use App\Models\QuestionVote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionVoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuestionVote::factory()->count(40)->create();
    }
}
