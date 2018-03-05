<?php

namespace App\Http\Requests\Material;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MaterialUpdateRequest extends FormRequest
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
            'number' => ['string', Rule::unique('materials', 'material_number')->ignore($this->id)],
            'title' => ['string', Rule::unique('materials', 'material_title')->ignore($this->id)],
            'unit' => 'required|string',
            'count' =>  'required|Numeric',
            'danger' =>  'required|Numeric|min:0',
            'remark' =>  'nullable|string',
        ];
    }
}
