<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class messageRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'sender'=>'max:100',
            'subject	'=>'max:100',
            'message		'=>'max:250',
        ];
    }


    public function messages()
    {
        return [
            'sender.max'=>'تجاوز الاسم الحد الأعلى 100 محرف ',
            'subject.max'=>'تجاوز الموضوع الحد الأعلى 100 محرف ',
            'message.max'=>'تجاوزت الرسالة الحد الأعلى 250 محرف ',

        ];
    }

}
