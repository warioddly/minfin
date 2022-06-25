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
        Schema::create('minfin_contacts', function (Blueprint $table) {
            $table->id();
            $table->longText('reception')->nullable();
            $table->longText('address')->nullable();
            $table->longText('public_reception')->nullable();
            $table->longText('relations_sector')->nullable();
            $table->string('helpline')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->longText('google_iframe')->nullable();
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
        Schema::dropIfExists('minfin_contacts');
    }
};
