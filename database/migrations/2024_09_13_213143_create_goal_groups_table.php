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
        Schema::create('goal_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('goal_id')->constrained()->comment('Foreign key to the goals table');
            $table->string('group_name')->comment('The name of the group, typically derived from the goal title');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goal_groups');
    }
};
