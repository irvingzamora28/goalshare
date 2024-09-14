<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserGoalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // You can set up any specific authorization logic here.
        // For now, return true to allow authenticated users to update their goal.
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
            'status' => 'sometimes|in:not completed,in progress,completed',  // Optional status update
            'start_date' => 'nullable|date', // Optional update to start date
            'end_date' => 'nullable|date', // Optional update to end date
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
            'status.in' => 'The status must be one of: not completed, in progress, or completed.',
            'start_date.date' => 'The start date must be a valid date.',
            'end_date.date' => 'The end date must be a valid date.',
        ];
    }
}
