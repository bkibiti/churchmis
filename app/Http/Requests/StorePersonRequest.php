<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

  
    public function rules()
    {
        return [
            'first_name' => 'required|max:40',
            'middle_name' => 'max:40',
            'last_name' => 'required|max:40',
            'email' => 'email|max:50',
            'gender' => 'required',
            'address' => 'max:100',
            'mobile_phone' => 'max:14',
            'alt_phone' => 'max:14',
        ];

    }
  
}
