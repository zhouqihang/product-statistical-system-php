<?php

namespace App\Http\Requests\PMB;

use Illuminate\Foundation\Http\FormRequest;

class ProductsMaterialsBaseCreateRequest extends FormRequest
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
            'product' => 'required|integer',
            'material' => 'required|integer',
            'count' => 'required|Numeric|min:0',
            'remark' =>  'nullable|string',
        ];
    }
}
