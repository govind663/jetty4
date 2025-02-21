<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ProjecTypeRequest extends FormRequest
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
                'project_type' => ['required', 'string', 'max:255'],
            ];
        }else{
            $rule = [
                'project_type' => ['required', 'string', 'max:255'],
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'project_type.required' => 'Project Type is required',
            'project_type.string' => 'Project Type must be a string',
            'project_type.max' => 'Project Type must not be greater than 255 characters',
        ];
    }
}
