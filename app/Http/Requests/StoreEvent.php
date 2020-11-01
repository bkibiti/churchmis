<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEvent extends FormRequest
{
 
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            'title' => 'required|max:50',
            'description' => 'required|max:100',
            'location' => 'required|max:100',
            'contact_person' => 'max:30',
            'alt_contact_person' => 'max:30',
            'mobile' => 'max:14',
            'alt_mobile' => 'max:14',
        ];
    }

    public function attributes()
    {
        return [
            'alt_mobile' => 'alternate mobile',
            'contact_person' => 'contact person',
            'alt_contact_person' => 'alternate contact person',
        ];
    }
}
