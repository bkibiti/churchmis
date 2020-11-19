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
            'name' => 'required|max:60',
            'email' => 'email|max:50',
            'gender' => 'required',
            'address' => 'max:100',
            'mobile_phone' => 'max:20',
            'partner_phone' => 'max:20',
        ];

    }
  
}
