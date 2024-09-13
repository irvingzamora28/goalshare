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
        Schema::create('goal_goal_type', function (Blueprint $table) {
            $table->id()->comment('Primary key, auto-increment');
            $table->foreignId('goal_id')->constrained()->comment('Foreign key to the Goals table');
            $table->foreignId('goal_type_id')->constrained()->comment('Foreign key to the Goal Types table');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goal_goal_type');
    }
};
