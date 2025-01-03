<?php

namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class ProductAdminService
{
    public function getMenu()
    {
        return Menu::where('active', 1)->get();
    }

    protected function isValidPrice($request)
    {
        if ($request->input('price') != 0 && $request->input('price_sale') != 0
            && $request->input('price_sale') >= $request->input('price')
        ) {
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }

        if ($request->input('price_sale') != 0 && (int)$request->input('price') == 0) {
            Session::flash('error', 'Vui lòng nhập giá gốc');
            return false;
        }

        return true;
    }

    public function insert($request)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;
        try {
            $request->except('_token');
            Product::create($request->all());
            Session::flash('success', 'Thêm Sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Sản phẩm lỗi');
            Log::error('Thêm Sản phẩm lỗi: ' . $err->getMessage()); // Sử dụng Log đúng cách
            return false;
        }

        return true;
    }

    public function get()
    {
        return Product::with('menu')
            ->orderByDesc('id')->paginate(15);
    }

    public function update($request, $product)
{
    // Kiểm tra tính hợp lệ của giá
    $isValidPrice = $this->isValidPrice($request);
    if ($isValidPrice === false) return false;

    try {
        // Cập nhật dữ liệu sản phẩm
        $product->fill($request->only(['name', 'menu_id', 'price', 'price_sale', 'active', 'description', 'content','updated_at'])); // Chỉ lấy các trường cần thiết
        $product->save();

        Session::flash('success', 'Cập nhật thành công sản phẩm');
    } catch (\Exception $err) {
        Session::flash('error', 'Có lỗi vui lòng thử lại');
        Log::error('Cập nhật sản phẩm lỗi: ' . $err->getMessage()); // Sử dụng Log đúng cách
        return false;
    }

    return true;
}

    public function delete($request)
    {
        $product = Product::where('id', $request->input('id'))->first();
        if ($product) {
            $product->delete();
            return true;
        }

        return false;
    }


}
