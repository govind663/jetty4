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
                'slug' => ['required', 'string', 'max:255'],
                'breadcrumbs_image' => ['nullable', 'mimes:jpeg,png,jpg,webp,svg', 'max:2048'],
            ];
        }else{
            $rule = [
                'project_type' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255'],
                'breadcrumbs_image' => ['required', 'mimes:jpeg,png,jpg,webp,svg', 'max:2048'],
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

            'slug.required' => 'Slug is required',
            'slug.string' => 'Slug must be a string',
            'slug.max' => 'Slug must not be greater than 255 characters',

            'breadcrumbs_image.required' => 'Breadcrumbs Image is required',
            'breadcrumbs_image.mimes' => 'Breadcrumbs Image must be a file of type: jpeg, png, jpg, webp, svg',
            'breadcrumbs_image.max' => 'Breadcrumbs Image must not be greater than 2048 kilobytes',
        ];
    }
}
