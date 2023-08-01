<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_votes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("question_id");
            $table->foreign("question_id")->references("id")->on("questions");

            $table->unsignedBigInteger("voted_by");
            $table->foreign("voted_by")->references("id")->on("users");

            $table->boolean("is_upvote")->default(true);




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_votes');
    }
};
