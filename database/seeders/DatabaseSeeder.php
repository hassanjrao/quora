<?php

namespace Database\Seeders;

use App\Models\QuestionVote;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            QuestionSeeder::class,
            AnswerSeeder::class,
            TagSeeder::class,
            QuestionTagSeeder::class,
            QuestionVoteSeeder::class,
            AnswerVoteSeeder::class,

        ]);
    }
}
