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
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chat_id')->constrained('direct_chats')->comment('Foreign key to the direct_chats table');
            $table->foreignId('sender_id')->constrained('users')->comment('Foreign key to the user who sent the message');
            $table->text('content')->comment('The content of the chat message');
            $table->timestamp('sent_at')->comment('Timestamp of when the message was sent');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_messages');
    }
};
