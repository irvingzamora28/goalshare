<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// TODO: Verify the status relationship and status field (must be corrected) (Check UserGoalService, UpdateGoalRequest, StoreUserGoalRequest, UpdateUserGoalRequest)
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('user_goals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->comment('Foreign key to the users table');
            $table->foreignId('goal_id')->constrained()->comment('Foreign key to the goals table');
            $table->enum('status', ['not completed', 'completed'])->comment('The current status of the goal');
            $table->date('start_date')->comment('The date when the user started the goal');
            $table->date('end_date')->nullable()->comment('The date when the user completed the goal, if applicable');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_goals');
    }
};
