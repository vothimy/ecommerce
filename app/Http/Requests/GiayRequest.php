<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GiayRequest extends FormRequest
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
            'name' => 'required',
            'gia' => 'required',
            'mota' => 'required',
        ];
    }
     public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên giày',
            'gia.required' => 'Vui lòng nhập giá giày',
            'mota.required' => 'Vui lòng nhập mô tả',
        ];
    }
}
