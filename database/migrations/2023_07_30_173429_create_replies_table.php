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
        Schema::create('replies', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("question_id");
            $table->foreign("question_id")->references("id")->on("questions");

            $table->unsignedBigInteger("answer_id");
            $table->foreign("answer_id")->references("id")->on("answers");

            $table->unsignedBigInteger("created_by");
            $table->foreign("created_by")->references("id")->on("users");

            $table->text("details")->nullable();

            $table->unsignedBigInteger("replied_to_user")->nullable();
            $table->foreign("replied_to_user")->references("id")->on("users");


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
        Schema::dropIfExists('replies');
    }
};
