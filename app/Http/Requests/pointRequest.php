<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class pointRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'info'=>'max:100',
        ];
    }


    public function messages()
    {
        return [
            'info.max'=>'تجاوز الاسم الحد الأعلى 100 محرف ',

        ];
    }

}
