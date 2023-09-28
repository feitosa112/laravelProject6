<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCityRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'city' => 'required|string',
            'country' => 'required|string',
            'temperature' => 'required|string',
        ];
    }
}
