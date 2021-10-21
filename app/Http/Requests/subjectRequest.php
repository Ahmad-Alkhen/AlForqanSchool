<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class subjectRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'=>'max:100',
        ];
    }


    public function messages()
    {
        return [
            'name.max'=>'تجاوز الاسم الحد الأعلى 100 محرف ',

        ];
    }

}
