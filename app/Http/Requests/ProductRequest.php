<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name"=> "required",
            "thumb" => "required"
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Vui Lòng Nhập Tên Sản Phẩm",
            "thumb.required" => "Ảnh Đại Diện không được trống"
        ];
    }
}
