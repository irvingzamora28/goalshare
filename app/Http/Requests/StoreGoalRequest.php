<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGoalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // You can set up any specific authorization logic here.
        // For now, we return true to allow all authenticated users to create a goal.
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'nullable|date',  // Optional due date for the goal
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
            'title.required' => 'The title is required.',
            'description.required' => 'The description is required.',
            'due_date.date' => 'The due date must be a valid date.',
        ];
    }
}
