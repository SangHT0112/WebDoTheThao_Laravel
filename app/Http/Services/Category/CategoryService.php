<?php

namespace App\Http\Services\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CategoryService
{
    public function create($request)
    {
        try {
            Category::create($request->input());
            Session::flash('success', 'Thêm danh mục thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm danh mục LỖI');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }
}
