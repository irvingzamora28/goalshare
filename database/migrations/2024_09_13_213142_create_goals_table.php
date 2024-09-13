<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('goals', function (Blueprint $table) {
            $table->id()->comment('Primary key, auto-increment');
            $table->string('title')->comment('The title of the predefined goal');
            $table->text('description')->comment('A brief description of the goal');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goals');
    }
};
