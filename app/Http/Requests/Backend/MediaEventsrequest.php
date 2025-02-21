<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class MediaEventsrequest extends FormRequest
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
                'title' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'min:1'],
                'event_date' => ['required', 'date'],
                'event_location' => ['required', 'string', 'max:255'],
                'status' => ['required', 'string', 'max:255'],
            ];
        }else{
            $rule = [
                'image' => ['required', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
                'title' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'min:1'],
                'event_date' => ['required', 'date'],
                'event_location' => ['required', 'string', 'max:255'],
                'status' => ['required', 'string', 'max:255'],
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'image.required' => 'Event Image is required.',
            'image.mimes' => 'Event Image must be a file of type: jpeg, png, jpg, webp.',
            'image.max' => 'Event Image may not be greater than 2048 kilobytes.',

            'title.required' => 'Event Name is required.',
            'title.string' => 'Event Name must be a string.',
            'title.max' => 'Event Name may not be greater than 255 characters.',

            'slug.required' => 'Event Slug is required.',
            'slug.string' => 'Event Slug must be a string.',
            'slug.max' => 'Event Slug may not be greater than 255 characters.',

            'description.required' => 'Event Description is required.',
            'description.string' => 'Event Description must be a string.',
            'description.min' => 'Event Description must be at least 1 character.',

            'event_date.required' => 'Event Date is required.',
            'event_date.date' => 'Event Date is not a valid date.',

            'event_location.required' => 'Event Location is required.',
            'event_location.string' => 'Event Location must be a string.',
            'event_location.max' => 'Event Location may not be greater than 255 characters.',

            'status.required' => 'Event Status is required.',
            'status.string' => 'Event Status must be a string.',
            'status.max' => 'Event Status may not be greater than 255 characters.',
        ];
    }
}
