<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class accountRequest extends FormRequest
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
            'passwordOld'=>'required|max:100|current_password:admin',
            'passwordNew'=>'required|max:100|same:passwordConfirm',
            'passwordConfirm'=>'required|max:100',
        ];
    }


    public function messages()
    {
        return [
            'passwordOld.current_password'=>'كلمة المرور القديمة غير صحيحة !',
            'passwordNew.same'=>'كلمتا المرور غير متطابقتان',
        ];
    }

}
