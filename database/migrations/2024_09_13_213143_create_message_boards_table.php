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
        Schema::create('message_boards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->constrained('goal_groups')->comment('Foreign key to the goal_groups table');
            $table->string('topic')->comment('The topic of the message board, typically related to the goal');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_boards');
    }
};
