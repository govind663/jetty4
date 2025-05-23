<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class AboutSustainabilityRequest extends FormRequest
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
                'pillers_title.*' => ['required', 'string', 'max:255'],
                'pillers_description.*' => ['required', 'string', 'min:1'],
                'other_description' => ['required', 'string', 'min:1'],
            ];
        }else{
            $rule = [
                'title' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'min:1'],
                'image' => ['required', 'mimes:jpeg,png,jpg,svg,webp', 'max:2048'],
                'pillers_title.*' => ['required', 'string', 'max:255'],
                'pillers_description.*' => ['required', 'string', 'min:1'],
                'other_description' => ['required', 'string', 'min:1'],
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

            'pillers_title.*.required' => 'Pillers title is required',
            'pillers_title.*.string' => 'Pillers title must be a string',
            'pillers_title.*.max' => 'Pillers title must not be greater than 255 characters',

            'pillers_description.*.required' => 'Pillers description is required',
            'pillers_description.*.string' => 'Pillers description must be a string',
            'pillers_description.*.min' => 'Pillers description must have at least one character',

            'other_description.required' => 'Other description is required',
            'other_description.string' => 'Other description must be a string',
            'other_description.min' => 'Other description must have at least one character',
        ];
    }
}
