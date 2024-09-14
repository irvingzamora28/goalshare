<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GoalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'due_date' => $this->due_date ? $this->due_date->toDateString() : null,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
            // Include related types or any other relations if needed
            'types' => GoalTypeResource::collection($this->whenLoaded('goalTypes')),
        ];
    }
}
