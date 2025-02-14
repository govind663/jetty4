<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class TeamsRequest extends FormRequest
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
                'image' => ['nullable', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
                'description' => ['required', 'string', 'min:1'],
            ];
        }else{
            $rule = [
                'title' => ['required', 'string', 'max:255'],
                'image' => ['required', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
                'description' => ['required', 'string', 'min:1'],
            ];
        }
        return $rule;
    }

    public function attributes()
    {
        return [
            'title.required' => __('Title is required'),
            'title.string' => __('Title must be a string'),
            'title.max' => __('The size of title should not exceed 255.'),

            'image.required' => __('Image is required'),
            'image.mimes' => __('Image must be a file of type: jpeg, png, jpg, gif, webp.'),
            'image.max' => __('The size of image should not exceed 2 MB.'),

            'description.required' => __('Description is required'),
            'description.string' => __('Description must be a string'),
            'description.min' => __('Description must have at least one value'),
        ];
    }

}
