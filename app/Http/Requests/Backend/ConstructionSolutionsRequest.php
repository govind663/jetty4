<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ConstructionSolutionsRequest extends FormRequest
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
                'image' => ['nullable', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
                'solution_name' => ['required', 'array', 'min:1'],
                'solution_name.*' => ['required', 'string', 'max:255'],
                'solution_description' => ['required', 'array', 'min:1'],
                'solution_description.*' => ['required', 'string', 'max:1000'],
            ];
        }else{
            $rule = [
                'title' => ['required', 'string', 'max:255'],
                'image' => ['required', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
                'solution_name' => ['required', 'array', 'min:1'],
                'solution_name.*' => ['required', 'string', 'max:255'],
                'solution_description' => ['required', 'array', 'min:1'],
                'solution_description.*' => ['required', 'string', 'max:1000'],
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

            'image.required' => __('Image is required'),
            'image.mimes' => __('Image must be a file of type: jpeg, png, jpg, gif, webp.'),
            'image.max' => __('The size of image should not exceed 2 MB.'),

            'solution_name.*.required' => __('Solution name is required'),
            'solution_name.*.array' => __('Solution name must be an array'),
            'solution_name.*.min' => __('Solution name must have at least one value'),
            'solution_name.*.string' => __('Solution name must be a string'),
            'solution_name.*.max' => __('The size of solution name should not exceed 255.'),

            'solution_description.*.required' => __('Solution description is required'),
            'solution_description.*.array' => __('Solution description must be an array'),
            'solution_description.*.min' => __('Solution description must have at least one value'),
            'solution_description.*.string' => __('Solution description must be a string'),
            'solution_description.*.max' => __('The size of solution description should not exceed 1000.'),
        ];
    }
}
