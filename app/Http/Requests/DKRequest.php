<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DKRequest extends FormRequest
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
            'username' => 'required',
            'password1' => 'required',
            'password2' => 'required|same:password1',
            'email' => 'required',
        ];
    }
    public function messages(){
         return [
            'username.required' => 'Vui lòng nhập username',
            'password1.required' => 'Vui lòng nhập password',
            'password2.required|same' => 'Mật khẩu chưa khớp',
            'email.required' => 'Nhập đúng dạng email(*@*.*)'
        ];
    }
}
