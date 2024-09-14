<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Authorize the request for authenticated users
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
            'content' => 'required|string|max:1000', // Message content is required and has a max length
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
            'content.required' => 'The message content is required.',
            'content.string' => 'The message content must be a valid string.',
            'content.max' => 'The message content must not exceed 1000 characters.',
        ];
    }
}
