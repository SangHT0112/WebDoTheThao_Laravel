<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'parent_id' => 'required|integer',
            'description' => 'nullable|string',
            'content' => 'required',
            'active' => 'required|boolean',
            'created_at' => 'nullable|date',
            'updated_at' => 'nullable|date',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên danh mục.',
            'name.max' => 'Tên danh mục không được vượt quá 255 ký tự.',
            'parent_id.required' => 'Vui lòng chọn danh mục cha.',
            'parent_id.integer' => 'Danh mục cha không hợp lệ.',
            'content.required' => 'Vui lòng nhập nội dung chi tiết.',
            'active.required' => 'Vui lòng chọn trạng thái kích hoạt.',
            'active.boolean' => 'Giá trị kích hoạt không hợp lệ.',
            'created_at.date' => 'Ngày tạo không đúng định dạng.',
            'updated_at.date' => 'Ngày cập nhật không đúng định dạng.',
        ];
    }


}
