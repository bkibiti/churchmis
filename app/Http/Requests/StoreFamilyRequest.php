<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFamilyRequest extends FormRequest
{
  
    public function authorize()
    {
        return true;
    }

 
    public function rules()
    {
        return [
            'name' => 'required|max:40',
            'email' => 'max:50',
            'member_ids' => 'required',
            'address' => 'max:100',
            'mobile_phone' => 'max:14',
            'alt_phone' => 'max:14',
        ];
    }

    public function messages()
    {
        return [
            'member_ids.required' => 'Please select at list one family member',
        ];
    }
}
