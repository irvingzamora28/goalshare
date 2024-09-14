<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserGoalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Allow the request for authenticated users
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
            'goal_id' => 'required|exists:goals,id', // Ensure the goal exists
            'status' => 'nullable|in:not completed,in progress,completed', // Optional status field
            'start_date' => 'nullable|date', // Optional start date
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
            'goal_id.required' => 'A goal must be selected.',
            'goal_id.exists' => 'The selected goal does not exist.',
            'status.in' => 'The status must be one of: not completed, in progress, or completed.',
            'start_date.date' => 'The start date must be a valid date.',
        ];
    }
}
