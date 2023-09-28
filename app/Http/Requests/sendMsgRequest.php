<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class sendMsgRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|string',
            'subject' => 'required|string|max:20',
            'message' => 'required|string|min:5|max:100'
        ];
    }
}
