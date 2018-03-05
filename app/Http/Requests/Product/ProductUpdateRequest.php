<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductUpdateRequest extends FormRequest
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
            'number' => ['string', Rule::unique('products', 'prod_number')->ignore($this->id)],
            'title' => ['string', Rule::unique('products', 'prod_title')->ignore($this->id)],
            'count' => 'required|Numeric',
            'unit' => 'required|string',
            'remark' => 'string|nullable',
        ];
    }
}
