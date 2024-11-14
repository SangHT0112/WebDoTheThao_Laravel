<?php

namespace App\Http\Controllers\frontend;
use App\Http\Services\Product\ProductService;
use App\Http\Controllers\Controller;
use App\Http\Services\Menu\MenuService;
use Illuminate\Http\Request;


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
}