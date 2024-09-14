<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGoalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // You can set up any specific authorization logic here.
        // For now, we return true to allow authenticated users to update a goal.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'due_date' => 'nullable|date',  // Optional due date for the goal
            'status' => 'nullable|in:not started,in progress,completed',  // Optional status update
        ];
    }

    /**
     * Custom error messages for validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.string' => 'The title must be a valid string.',
            'description.string' => 'The description must be a valid string.',
            'due_date.date' => 'The due date must be a valid date.',
            'status.in' => 'The status must be one of the following: not started, in progress, or completed.',
        ];
    }
}
