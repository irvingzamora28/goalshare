<?php

namespace App\Http\Controllers;

use App\Services\MessageBoardService;
use App\Http\Resources\MessageBoardResource;

class MessageBoardController extends Controller
{
    protected $messageBoardService;

    public function __construct(MessageBoardService $messageBoardService)
    {
        $this->messageBoardService = $messageBoardService;
    }

    // Retrieve the message board for a specific goal group
    public function show($goalGroupId)
    {
        $messageBoard = $this->messageBoardService->getMessageBoardByGoalGroupId($goalGroupId);
        return new MessageBoardResource($messageBoard);
    }
}
