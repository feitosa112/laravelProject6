<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCityRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'city' => 'required|string|unique:city_temperatures',
            'country' => 'required|string',
            'temperature' => 'required|string',
        ];
    }
}
