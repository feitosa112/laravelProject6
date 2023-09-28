<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'description' => 'required|string'
        ];
    }
}
