<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
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
        // 如果需要返回ajax的消息，在请求中带上header'X-Requested-With','XMLHttpRequest'
        return [
            'number' =>  'string',
            'title' =>  'string',
            'unit' =>  'required|string',
            'count' =>  'required|integer',
            'danger' =>  'required|integer',
            'remark' =>  'string',
        ];
    }
}
