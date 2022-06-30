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
        Schema::create('post_translates', function (Blueprint $table) {
            $table->id();
            $table->string("title")->nullable();
            $table->string("kg_title")->nullable();
            $table->string("en_title")->nullable();
            $table->longText("description")->nullable();
            $table->longText("kg_description")->nullable();
            $table->longText("en_description")->nullable();
            $table->longText("content")->nullable();
            $table->longText("kg_content")->nullable();
            $table->longText("en_content")->nullable();
            $table->unsignedBigInteger("post_id")->nullable();
            $table->timestamps();

            $table->foreign('post_id')->on('posts')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_translates');
    }
};
