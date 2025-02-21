<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class MediaEventsDetailsRequest extends FormRequest
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
                'media_events_id' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255'],
                'image' => ['nullable', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
                'description' => ['required', 'string', 'min:1'],
                'event_gallery_images.*' => ['nullable', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            ];
        }else{
            $rule = [                
                'media_events_id' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255'],
                'image' => ['required', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
                'description' => ['required', 'string', 'min:1'],
                'event_gallery_images.*' => ['required', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'media_events_id.required' => 'Event Name is required.',
            'media_events_id.string' => 'Event Name must be a string.',
            'media_events_id.max' => 'Event Name may not be greater than 255 characters.',

            'slug.required' => 'Event Slug is required.',
            'slug.string' => 'Event Slug must be a string.',
            'slug.max' => 'Event Slug may not be greater than 255 characters.',

            'image.required' => 'Event Banner Image is required.',
            'image.mimes' => 'Event Banner Image must be a file of type: jpeg, png, jpg, webp.',
            'image.max' => 'Event Banner Image may not be greater than 2048 kilobytes.',

            'description.required' => 'Event Description is required.',
            'description.string' => 'Event Description must be a string.',
            'description.min' => 'Event Description must be at least 1 characters.',

            'event_gallery_images.*.required' => 'Event Gallery Image is required.',
            'event_gallery_images.*.mimes' => 'Event Gallery Image must be a file of type: jpeg, png, jpg, webp.', 
            'event_gallery_images.*.max' => 'Event Gallery Image may not be greater than 2048 kilobytes.',                                                                                    
        ];
    }
}
