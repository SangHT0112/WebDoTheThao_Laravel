<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Services\Product\ProductAdminService; // Nhập lớp ProductAdminService
use App\Models\Product;


class ProductController extends Controller
{
    protected $productService; // Khai báo biến

    // Khởi tạo ProductAdminService trong constructor
    public function __construct(ProductAdminService $productService)
    {
        $this->productService = $productService; // Gán biến
    }

    public function index()
    {
        return view("admin.product.list",[
            'title' => "Danh Sách Sản Phẩm",
            'products' => $this->productService->get()
        ]);
    }

    public function create()
    {
        return view('admin.product.add', [
            'title' => 'Thêm sản phẩm',
            'menus' => $this->productService->getMenu()
        ]);
    }

    public function store(ProductRequest $request)
    {
        $this->productService->insert($request); // Sửa lại gọi biến productService
        // Thêm redirect hoặc response sau khi insert thành công

        return redirect()->back();
    }



    public function show(Product $product) //Dùng để edit
    {
        return view('admin.product.edit',
        [
            'title'=> "Chỉnh Sửa Sản Phẩm",
            'product' => $product,
            'menus' => $this->productService->getMenu()
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        $this->productService->update($request, $product);

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $result = $this->productService->delete($request);
        if($result){
            return response()->json([
                'error' => false,
                "message" => 'Xóa Thành Công Sản Phẩm'
            ]);
        }

        return response()->json(['eror' => true]);
    }
}
