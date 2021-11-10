<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userUploadRequest extends FormRequest
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
            'import' => 'required|max:10000|mimes:csv,xlsx,xlx'
        ];
    }


    public function messages()
    {
        return [

            'import.mimes'=>'يجب ان يكون الملف بلاحقة csv أو xlsx أو xlx ',
            'import.max'=>'تجاوز حجم الملف الحد الأعظمي 10 ميغا ',
        ];
    }

}
