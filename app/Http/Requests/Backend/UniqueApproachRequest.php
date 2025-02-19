<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UniqueApproachRequest extends FormRequest
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
                'image' => ['nullable', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
                'service_name.*' => ['required', 'string', 'min:1'],
                'service_description.*' => ['required', 'string', 'min:1'],
            ];
        }else{
            $rule = [
                'title' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'min:1'],
                'image' => ['required', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
                'service_name.*' => ['required', 'string', 'min:1'],
                'service_description.*' => ['required', 'string', 'min:1'],
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'title.required' => __('Title is required'),
            'title.string' => __('Title must be a string'),
            'title.max' => __('The size of title should not exceed 255.'),

            'description.required' => __('Description is required'),
            'description.string' => __('Description must be a string'),
            'description.min' => __('Description must be at least 1 characters'),

            'image.required' => __('Image is required'),
            'image.mimes' => __('Image must be a file of type: jpeg, png, jpg, webp'),
            'image.max' => __('Image size should not exceed 2MB'),

            'service_name.*.required' => __('Service Name is required'),
            'service_name.*.string' => __('Service Name must be a string'),
            'service_name.*.max' => __('The size of Service Name should not exceed 255.'),

            'service_description.*.required' => __('Service Description is required'),
            'service_description.*.string' => __('Service Description must be a string'),
            'service_description.*.min' => __('Service Description must be at least 1 characters'),

        ];

    }
}
