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
        Schema::create('goal_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('goal_type_id')->constrained()->comment('Foreign key to the goal_types table');
            $table->string('status')->comment('The status of the goal, e.g., "completed", "in progress"');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goal_statuses');
    }
};
