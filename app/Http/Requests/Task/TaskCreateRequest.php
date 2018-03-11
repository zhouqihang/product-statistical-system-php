<?php

namespace App\Http\Requests\Task;

use App\Task;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskCreateRequest extends FormRequest
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
            'title' => 'string|unique:tasks,title|required',
            'status' => ['required', 'string', Rule::in(array_keys(Task::$status))],
            'remark' => 'string|nullable',
            'begin_time' => 'string|nullable',
            'end_time' => 'string|nullable',
        ];
    }
}
