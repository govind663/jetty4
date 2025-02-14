<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class AssociateRequest extends FormRequest
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
                'description' => ['required', 'string', 'max:1000'],
                'image' => ['nullable', 'array', 'min:1'],
                'image.*' => ['nullable', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            ];
        }else{
            $rule = [
                'title' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'max:1000'],
                'image' => ['required', 'array', 'min:1'],
                'image.*' => ['required', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required',
            'description.required' => 'Description is required',
            'image.*.required' => 'Image is required',
            'image.*.mimes' => 'Image must be a file of type: jpeg, png, jpg, webp.',
            'image.*.max' => 'Image may not be greater than 2048 kilobytes.',
        ];
    }
}
