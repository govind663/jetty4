<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class BreadcrumbRequest extends FormRequest
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
                'breadcrumb_image' => 'mimes:jpeg,png,jpg,webp|max:2048',
                'breadcrumb_title' => 'required|string|max:255',
                'page_type' => 'required|string|max:255',
                'status' => 'required|numeric',
            ];
        }else{
            $rule = [
                'breadcrumb_image' => 'required|mimes:jpeg,png,jpg,webp|max:2048',
                'breadcrumb_title' => 'required|string|max:255',
                'page_type' => 'required|string|max:255',
                'status' => 'required|numeric',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'breadcrumb_image.required' => __('Banner image is required'),
            'breadcrumb_image.mimes' => __('Banner image must be a file of type: jpeg, png, jpg, webp.'),
            'breadcrumb_image.max' => __('The size of banner image should not exceed 2 MB.'),

            'breadcrumb_title.required' => __('Banner title is required'),
            'breadcrumb_title.string' => __('Banner title must be a string.'),
            'breadcrumb_title.max' => __('Banner title must not exceed 255 characters.'),

            'page_type.required' => __('Page type is required'),
            'page_type.string' => __('Page type must be a string.'),
            'page_type.max' => __('Page type must not exceed 255 characters.'),

            'status.required' => __('Status is required'),
            'status.numeric' => __('Status must be a number.'),

        ];
    }
}
