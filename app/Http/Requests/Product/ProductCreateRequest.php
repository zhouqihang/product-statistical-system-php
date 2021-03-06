<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'number' => 'string|unique:products,prod_number',
            'title' => 'string|unique:products,prod_title',
            'count' => 'required|Numeric',
            'unit' => 'required|string',
            'remark' => 'string|nullable',
        ];
    }
}
