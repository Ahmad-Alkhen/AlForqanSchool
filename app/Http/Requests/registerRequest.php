<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'=>'required|max:100',
        ];
    }


    public function messages()
    {
        return [
            'name.required'=>'You must enter the user name',
            'name.max'=>'تجاوز الاسم الحد الأعلى 100 محرف ',

        ];
    }

}
