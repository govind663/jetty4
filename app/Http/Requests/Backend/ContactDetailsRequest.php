<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ContactDetailsRequest extends FormRequest
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
                'company_mobile_no' => 'required|string',
                'company_email' => 'required|string|email',
                'company_address' => 'required|string',
                'location_map_link' => 'required|string',
                'location_map_iframe_link' => 'required|string',
            ];
        }else{
            $rule = [
                'company_mobile_no' => 'required|string',
                'company_email' => 'required|string|email',
                'company_address' => 'required|string',
                'location_map_link' => 'required|string',
                'location_map_iframe_link' => 'required|string',
            ];
        }
        return $rule;
    }


    public function messages()
    {
        return [
            'company_mobile_no.required' => 'Company Mobile No is required',
            'company_email.required' => 'Company Email is required',
            'company_address.required' => 'Company Address is required',
            'location_map_link.required' => 'Location Map Link is required',
            'location_map_iframe_link.required' => 'Location Map Iframe Link is required',
        ];
    }

}
