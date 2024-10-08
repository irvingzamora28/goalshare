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
        Schema::create('goal_types', function (Blueprint $table) {
            $table->id()->comment('Primary key, auto-increment');
            $table->string('name')->comment('The name of the goal type (e.g. Education, Personal Development)');
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goal_types');
    }
};
