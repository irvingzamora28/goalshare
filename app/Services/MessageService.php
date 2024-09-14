<?php

namespace App\Services;

use App\Models\Message;

class MessageService
{
    public function getAllMessagesForGoalGroup($goalGroupId)
    {
        // Retrieve all messages for a specific goal group
        return Message::where('goal_group_id', $goalGroupId)->get();
    }

    public function createMessage($validatedData)
    {
        // Create a new message in the message board
        return Message::create($validatedData);
    }
}
