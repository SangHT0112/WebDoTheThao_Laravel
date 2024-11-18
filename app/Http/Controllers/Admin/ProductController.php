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
        $products=Product::where('active','1')->paginate(15);
        return view("admin.product.list",[
            'title' => "Danh Sách Sản Phẩm Mới Nhất",
            'products' => $products
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

    public function destroy(Product $id)
    {
        $id->delete();
        return redirect()->back()->with('success','Xóa Sản Phẩm Thành Công!');
    }

    public function search(Request $request)
    {
        if(!empty($request->search)) {
            $searchproducts = $request->search;
            $searchs = Product::where('name', 'like', '%' . $searchproducts . '%')->paginate(15);
            return view('admin.product.search', [
                'search' => $searchs,
                'title' => ' Danh Sách Tìm Kiếm'
            ]);
        }
        else{
            return redirect()->route('admin.products.list');
        }
    }
}
