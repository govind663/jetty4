<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ProjectDetailsRequest extends FormRequest
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
                'image.*' => ['nullable', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
                'projects_id' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255'],
                'built_up_area' => ['nullable', 'string', 'max:255'],
                'it_load' => ['nullable', 'string', 'max:255'],
                'developers' => ['nullable', 'string', 'max:255'],
                'client_name' => ['nullable', 'string', 'max:255'],
                'structural_consultant' => ['nullable', 'string', 'max:255'],
                'architect' => ['nullable', 'string', 'max:255'],
                'breadcrumbs_image' => ['nullable', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            ];
        }else{
            $rule = [
                'image.*' => ['required', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
                'projects_id' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255'],
                'built_up_area' => ['nullable', 'string', 'max:255'],
                'it_load' => ['nullable', 'string', 'max:255'],
                'developers' => ['nullable', 'string', 'max:255'],
                'client_name' => ['nullable', 'string', 'max:255'],
                'structural_consultant' => ['nullable', 'string', 'max:255'],
                'architect' => ['nullable', 'string', 'max:255'],
                'breadcrumbs_image' => ['required', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'image.*.required' => 'Project Image is required',
            'image.*.mimes' => 'Project Image must be a file of type: jpeg, png, jpg, webp',
            'image.*.max' => 'The size of project image should not exceed 2 MB',

            'projects_id.required' => 'Project Name is required',
            'projects_id.string' => 'Please enter a valid project name',
            'projects_id.max' => 'The project name should not exceed 255 characters',

            'slug.required' => 'Project slug is required',
            'slug.string' => 'Please enter a valid slug',
            'slug.max' => 'The slug should not exceed 255 characters',

            'built_up_area.required' => 'Built up area is required',
            'built_up_area.string' => 'Please enter a valid built up area',
            'built_up_area.max' => 'The built up area should not exceed 255 characters',

            'it_load.required' => 'IT Load is required',
            'it_load.string' => 'Please enter a valid IT Load',
            'it_load.max' => 'The IT Load should not exceed 255 characters',

            'developers.required' => 'Developer Name is required',
            'developers.string' => 'Please enter a valid developer name',
            'developers.max' => 'The developer name should not exceed 255 characters',

            'client_name.required' => 'Client Name is required',
            'client_name.string' => 'Please enter a valid client name',
            'client_name.max' => 'The client name should not exceed 255 characters',

            'structural_consultant.required' => 'Structural Consultant is required',
            'structural_consultant.string' => 'Please enter a valid structural consultant',
            'structural_consultant.max' => 'The structural consultant should not exceed 255 characters',

            'architect.required' => 'Architect is required',
            'architect.string' => 'Please enter a valid architect',
            'architect.max' => 'The architect should not exceed 255 characters',

            'breadcrumbs_image.required' => 'Breadcrumbs Image is required',
            'breadcrumbs_image.mimes' => 'Breadcrumbs Image must be a file of type: jpeg, png, jpg, webp',
            'breadcrumbs_image.max' => 'The size of breadcrumbs image should not exceed 2 MB',
        ];
    }
}
