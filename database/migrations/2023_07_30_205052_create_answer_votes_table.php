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
        Schema::create('answer_votes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("answer_id");
            $table->foreign("answer_id")->references("id")->on("answers");

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
        Schema::dropIfExists('answer_votes');
    }
};
