<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
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
            'user_name'=>'required|max:100',
            'password'=>'required|max:200',
        ];
    }


    public function messages()
    {
        return [
            'user_name.required'=>'You must enter the user name',
            'password.required'=>'You must enter the password ',
        ];
    }

}
