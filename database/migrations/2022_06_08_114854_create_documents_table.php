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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('path');
            $table->string('size')->default(0);
            $table->string('extension');
            $table->string('icon')->default('document.svg');
            $table->string('author')->nullable();
            $table->unsignedBigInteger('post_id')->nullable();
            $table->timestamps();

            $table->foreign('post_id')->on('posts')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::dropIfExists('documents');
    }
};
