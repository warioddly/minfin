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
        Schema::create('post_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("tag_id")->nullable();
            $table->unsignedBigInteger("post_id")->nullable();
            $table->timestamps();

            $table->foreign('tag_id')->on('tags')->references('id');
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
        Schema::dropIfExists('post_tags');
    }
};
