<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'title' => 'required|unique:tasks|string|max:255',
            'contents' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.unique' => 'Tiêu đề đã tồn tại',
            'title.required' => 'Chưa nhập tiêu đề',
            'contents.required' => 'Chưa nhập nội dung bài học',
            'title.max' => 'Tên tiêu đề quá dài',

        ];
    }
}
