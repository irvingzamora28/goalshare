<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGoalTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Authorize the request for authenticated users or based on some role/permission
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
            'name' => 'required|string|max:255|unique:goal_types,name', // Ensure the name is unique
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
            'name.required' => 'The goal type name is required.',
            'name.string' => 'The goal type name must be a valid string.',
            'name.max' => 'The goal type name must not exceed 255 characters.',
            'name.unique' => 'The goal type name must be unique.',
        ];
    }
}
