<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class OurManagementRequest extends FormRequest
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
                'quality_icon.*' => ['nullable', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
                'quality_title.*' => ['nullable', 'string', 'max:255'],
                'quality_description.*' => ['nullable', 'string', 'min:1'],
            ];
        }else{
            $rule = [
                'title' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'min:1'],
                'image' => ['required', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
                'quality_icon.*' => ['required', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
                'quality_title.*' => ['required', 'string', 'max:255'],
                'quality_description.*' => ['required', 'string', 'min:1'],
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

            'quality_icon.*.required' => __('Quality Icon is required'),
            'quality_icon.*.mimes' => __('Quality Icon must be a file of type: jpeg, png, jpg, webp'),
            'quality_icon.*.max' => __('Quality Icon size should not exceed 2MB'),

            'quality_title.*.required' => __('Quality Title is required'),
            'quality_title.*.string' => __('Quality Title must be a string'),
            'quality_title.*.max' => __('The size of quality title should not exceed 255.'),

            'quality_description.*.required' => __('Quality Description is required'),
            'quality_description.*.string' => __('Quality Description must be a string'),
            'quality_description.*.min' => __('Quality Description must be at least 1 characters'),
        ];

    }
}