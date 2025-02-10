<?php

namespace App\Http\Requests;

use App\Models\myclass;
use Illuminate\Foundation\Http\FormRequest;
use Psy\Util\Str;

class myrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    protected $stopOnFirstFailure = true;
    public function authorize(): bool
    {
        return true;

    }
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'course_id' => 'required|integer', // 假设有一个 courses 表
            'teacher_id' => 'required|integer', // 假设有一个 teachers 表
            'capacity' => 'required|integer|min:1',
            'start_data' => 'required|date',
            'end_data' => 'required|date|after_or_equal:start_data',
            'school_id' => 'required|integer|exists:schools,id',
        ];
    }
    public function messages(): array
    {
        return [
            'school_id.required' => '参数错误：ID不能为空',
            'school_id.exists:schools,id' => '参数错误：学校ID不存在',
            'name.required' => '参数错误：名称不能为空',
            'name.string' => '参数错误：名称必须为字符串',
            'name.max' => '参数错误：名称最大长度为255',
        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

}
