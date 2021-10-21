<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class noteRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'note'=>'required|max:250',
        ];
    }


    public function messages()
    {
        return [
            'name.required'=>'You must enter the user name',
            'name.max'=>'تجاوز الحد الأعلى 250 محرف ',

        ];
    }

}
