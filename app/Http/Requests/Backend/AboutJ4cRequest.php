<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class AboutJ4cRequest extends FormRequest
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
            ];
        }else{
            $rule = [
                'title' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'min:1'],
                'image' => ['required', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
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
            
            'image.required' => __('Image is required'),
            'image.mimes' => __('Image must be a file of type: jpeg, png, jpg, webp.'),
            'image.max' => __('The size of image should not exceed 2 MB.'),
        ];
    }
}
