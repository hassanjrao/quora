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
        Schema::dropIfExists("replies");


        Schema::create('replies', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("answer_id");
            $table->foreign("answer_id")->references("id")->on("answers")->onDelete("cascade");

            $table->unsignedBigInteger("created_by");
            $table->foreign("created_by")->references("id")->on("users")->onDelete("cascade");

            $table->text("reply");


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
