<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class homeworkRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'info'=>'max:200',
        ];
    }


    public function messages()
    {
        return [
            'info.max'=>'تجاوز الاسم الحد الأعلى 200 محرف ',

        ];
    }

}
