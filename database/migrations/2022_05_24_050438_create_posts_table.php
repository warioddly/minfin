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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->longText("description")->nullable();
            $table->longText("content")->nullable();
            $table->string("preview_image")->nullable();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->integer("views")->default(0);
            $table->boolean("is_published")->default(0);
            $table->unsignedBigInteger("category_id")->nullable();
            $table->unsignedBigInteger("page_id")->nullable();
            $table->timestamps();

            $table->foreign('category_id')->on('categories')->references('id');
            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('page_id')->on('pages')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
