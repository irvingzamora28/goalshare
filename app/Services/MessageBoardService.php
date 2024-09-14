<?php

namespace App\Services;

use App\Models\MessageBoard;

class MessageBoardService
{
    public function getMessageBoardByGoalGroupId($goalGroupId)
    {
        // Retrieve the message board associated with a specific goal group
        return MessageBoard::where('goal_group_id', $goalGroupId)->firstOrFail();
    }
}
