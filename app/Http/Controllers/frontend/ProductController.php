<?php

namespace App\Http\Controllers\frontend;
use App\Http\Services\Product\ProductService;
use App\Http\Controllers\Controller;
use App\Http\Services\Menu\MenuService;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index($id = '', $slug = '')
    {
        $product = $this->productService->show($id);
        $productsMore = $this->productService->more($id);

        return view('frontend.products.content', [
            'title' => $product->name,
            'product' => $product,
            'products' => $productsMore
        ]);
    }

    public function showQuickView($id)
    {
        $product = Product::find($id);

    return response()->json([
        'id' => $product->id,
        'name' => $product->name,
        'price' => $product->price,
        'priceSale' => $product->priceSale,
        'thumb' => $product->thumb,
        'description' => $product->description,
        'images' => $product->images, // nếu sản phẩm có nhiều ảnh
    ]);
    }
}