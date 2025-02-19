<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CurrentOpeningRequest extends FormRequest
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
                'designation' => ['required', 'string', 'max:255'],
                'location' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'min:1'],
                'image' => ['nullable', 'mimes:jpeg,png,jpg,svg,webp,pdf', 'max:2048'],
                'status' => ['required', 'string', 'max:255'],
            ];
        }else{
            $rule = [
                'designation' => ['required', 'string', 'max:255'],
                'location' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'min:1'],
                'image' => ['required', 'mimes:jpeg,png,jpg,svg,webp,pdf', 'max:2048'],
                'status' => ['required', 'string', 'max:255'],
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'designation.required' => 'Designation is required',
            'designation.string' => 'Designation must be a string',
            'designation.max' => 'Designation must not be greater than 255 characters',

            'location.required' => 'Location is required',
            'location.string' => 'Location must be a string',
            'location.max' => 'Location must not be greater than 255 characters',

            'description.required' => 'Description is required',
            'description.string' => 'Description must be a string',
            'description.min' => 'Description must have at least one character',

            'image.required' => 'Document file is required',
            'image.mimes' => 'Document file must be a file of type: jpeg, png, jpg, svg, webp, pdf',
            'image.max' => 'Document file must not be greater than 2MB',

            'status.required' => 'Status is required',
            'status.string' => 'Status must be a string',
            'status.max' => 'Status must not be greater than 255 characters',
        ];
    }
}
