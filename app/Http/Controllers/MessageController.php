<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Services\MessageService;
use App\Models\Message;
use App\Http\Resources\MessageResource;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    protected $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    // Retrieve all messages for a specific goal group
    public function index($goalGroupId)
    {
        $messages = $this->messageService->getAllMessagesForGoalGroup($goalGroupId);
        return MessageResource::collection($messages);
    }

    // Create a new message in the message board
    public function store(StoreMessageRequest $request, $goalGroupId)
    {
        $validatedData = $request->validated();
        $validatedData['goal_group_id'] = $goalGroupId;
        $validatedData['user_id'] = Auth::id();

        $message = $this->messageService->createMessage($validatedData);
        return new MessageResource($message);
    }
}
