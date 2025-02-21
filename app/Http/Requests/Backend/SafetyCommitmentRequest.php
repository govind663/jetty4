<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class SafetyCommitmentRequest extends FormRequest
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
            ];
        }else{
            $rule = [
                'title' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'min:1'],
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
            'description.min' => __('The size of description should not be less than 1.'),
        ];
    }
}
