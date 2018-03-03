<?php

namespace App\Http\Requests\Material;

use Illuminate\Foundation\Http\FormRequest;

class MaterialCreateRequest extends FormRequest
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
            'number' =>  'string|unique:materials,material_number',
            'title' =>  'string|unique:materials,material_title',
            'unit' =>  'required|string',
            'count' =>  'required|integer',
            'danger' =>  'required|integer|min:0',
            'remark' =>  'string',
        ];
    }
}
