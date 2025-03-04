<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
class OurUspRequest extends FormRequest
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
                'banner_icon.*' => ['required', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
                'banner_title.*' => ['required', 'string', 'max:255'],
                'banner_description.*' => ['required', 'string', 'min:1'],
                'banner_image.*' => ['required', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            ];
        }else{
            $rule = [
                'title' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'min:1'],
                'banner_icon.*' => ['required', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
                'banner_title.*' => ['required', 'string', 'max:255'],
                'banner_description.*' => ['required', 'string', 'min:1'],
                'banner_image.*' => ['required', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
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
            'description.min' => __('Description must have at least one value'),

            'banner_icon.*.required' => __('Banner Icon is required'),
            'banner_icon.*.mimes' => __('Banner Icon must be a file of type: jpeg, png, jpg, webp'),
            'banner_icon.*.max' => __('The size of Banner Icon should not exceed 2048.'),

            'banner_title.*.required' => __('Banner Title is required'),
            'banner_title.*.string' => __('Banner Title must be a string'),
            'banner_title.*.max' => __('The size of Banner Title should not exceed 255.'),

            'banner_description.*.required' => __('Banner Description is required'),
            'banner_description.*.string' => __('Banner Description must be a string'),
            'banner_description.*.min' => __('Banner Description must have at least one value'),
            'banner_description.*.max' => __('The size of Banner Description should not exceed 1000.'),

            'banner_image.*.required' => __('Banner Image is required'),
            'banner_image.*.mimes' => __('Banner Image must be a file of type: jpeg, png, jpg, webp'),
            'banner_image.*.max' => __('The size of Banner Image should not exceed 2048.'),
        ];
    }
}
