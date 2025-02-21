<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class SafetyInitiativesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->id){
            $rule = [
                'title' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'min:1'],
                'image' => ['nullable', 'mimes:jpeg,png,jpg,svg,webp', 'max:2048'],
                'icon' => ['nullable', 'mimes:jpeg,png,jpg,svg,webp', 'max:2048'],
                'status' => ['required', 'integer', 'min:0', 'max:1'],
            ];
        }else{
            $rule = [
                'title' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'min:1'],
                'image' => ['required', 'mimes:jpeg,png,jpg,svg,webp', 'max:2048'],
                'icon' => ['required', 'mimes:jpeg,png,jpg,svg,webp', 'max:2048'],
                'status' => ['required', 'integer', 'min:0', 'max:1'],
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required',
            'title.string' => 'Title must be a string',
            'title.max' => 'Title must not be greater than 255 characters',

            'description.required' => 'Description is required',
            'description.string' => 'Description must be a string',
            'description.min' => 'Description must have at least one character',

            'image.required' => 'Image is required',
            'image.mimes' => 'Image must be a file of type: jpeg, png, jpg, svg, webp',
            'image.max' => 'Image must not be greater than 2MB',

            'icon.required' => 'Icon is required',
            'icon.mimes' => 'Icon must be a file of type: jpeg, png, jpg, svg, webp',
            'icon.max' => 'Icon must not be greater than 2MB',

            'status.required' => 'Status is required',
            'status.integer' => 'Status must be an integer',
            'status.min' => 'Status must be greater than or equal to 0',
            'status.max' => 'Status must be less than or equal to 1',
        ];
    }
}
