<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loginRequest extends FormRequest
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
            'email'=>'required|max:100',
            'password'=>'required|max:100',
        ];
    }


    public function messages()
    {
        return [
            'email.required'=>'You must enter the email',
            'password.required'=>'You must enter the password ',
        ];
    }

}
