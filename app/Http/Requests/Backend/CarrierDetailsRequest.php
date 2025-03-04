<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CarrierDetailsRequest extends FormRequest
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
                'image' => ['nullable', 'mimes:jpeg,png,jpg,svg,webp', 'max:2048'],
                'title' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'min:1'],
                'other_description' => ['required', 'string', 'min:1'],                
            ];
        }else{
            $rule = [
                'image' => ['required', 'mimes:jpeg,png,jpg,svg,webp', 'max:2048'],
                'title' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'min:1'],
                'other_description' => ['required', 'string', 'min:1'],                
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'image.required' => 'Image is required',
            'image.mimes' => 'Image must be a file of type: jpeg, png, jpg, svg, webp',
            'image.max' => 'Image must not be greater than 2MB',

            'title.required' => 'Title is required',
            'title.string' => 'Title must be a string',
            'title.max' => 'Title must not be greater than 255 characters',

            'description.required' => 'Description is required',
            'description.string' => 'Description must be a string',
            'description.min' => 'Description must have at least one character',
            
            'other_description.required' => 'Other Description is required',
            'other_description.string' => 'Other Description must be a string',
            'other_description.min' => 'Other Description must have at least one character',
        ];
    }
}
