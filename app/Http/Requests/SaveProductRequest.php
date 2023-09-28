<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveProductRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            'name' => 'required|string',
            'price' => 'required|numeric',
            'amount' => 'required|numeric',
            'description' => 'required|string|min:5|max:100'
        ];
    }
}
