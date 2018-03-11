<?php

namespace App\Http\Requests\Task;

use App\Task;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskShowRequest extends FormRequest
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
            'page' => 'integer',
            'pagesize' => 'integer',
            'title' => 'string',
            'status' => ['string', Rule::in(array_keys(Task::$status))],
            'beginTime' => 'string',
            'endTIme' => 'string',
            'sortField' => 'string',
            'sortord' => 'in:desc,asc'
        ];
    }
}
