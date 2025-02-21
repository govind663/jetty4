<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ProjectsRequest extends FormRequest
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
                'image' => ['nullable', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
                'project_name' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255'],
                'project_location' => ['required', 'string', 'max:255'],
                'project_type_id' => ['required', 'integer'],
                'project_status' => ['required', 'string', 'max:255'],
            ];
        }else{
            $rule = [
                'image' => ['required', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
                'project_name' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255'],
                'project_location' => ['required', 'string', 'max:255'],
                'project_type_id' => ['required', 'integer'],
                'project_status' => ['required', 'string', 'max:255'],
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'image.required' => 'Project Image is required',
            'image.mimes' => 'Project Image must be a file of type: jpeg, png, jpg, webp',
            'image.max' => 'The size of project image should not exceed 2 MB',

            'project_name.required' => 'Project Name is required',
            'project_name.string' => 'Please enter a valid project name',
            'project_name.max' => 'The project name should not exceed 255 characters',

            'slug.required' => 'Project slug is required',
            'slug.string' => 'Please enter a valid slug',
            'slug.max' => 'The slug should not exceed 255 characters',

            'project_location.required' => 'Project location is required',
            'project_location.string' => 'Please enter a valid project location',
            'project_location.max' => 'The project location should not exceed 255 characters',

            'project_type_id.required' => 'Please select project type',
            'project_type_id.integer' => 'Please select a valid project type',

            'project_status.required' => 'Please select project status',
            'project_status.string' => 'Please enter a valid project status',
            'project_status.max' => 'The project status should not exceed 255 characters',

        ];
    }
}
