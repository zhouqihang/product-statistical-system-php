<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductShowRequest extends FormRequest
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
            'pagesize' => 'integer',
            'page' => 'integer',
            'number' => 'string',
            'title' => 'string',
            'unit' => 'string',
            'countBegin' => 'Numeric',
            'countEnd' => 'Numeric',
            'sortField' => 'string',
            'sortord' => 'in:desc,asc'
        ];
    }
}
