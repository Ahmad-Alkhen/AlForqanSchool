<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class homeworkFilesRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'file' => 'required|max:10000|mimes:doc,docx,pdf,xls,xlsx'
        ];
    }


    public function messages()
    {
        return [
            'file.mimes'=>'يجب ان يكون ملف وورد , اكسل , pdf   ',
            'file.max'=>'تجاوز حجم الملف الحد الأعظمي 10 ميغا ',
        ];
    }

}
