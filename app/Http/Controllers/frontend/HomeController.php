<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;
use App\Http\Services\Slider\SliderService;
use App\Models\Config;
use App\Models\Menu;
use App\Models\News;
use App\Models\Product;
use http\Encoding\Stream\Deflate;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    protected $menu;
    protected $slider;
    protected $product;
    public function __construct(SliderService $slider, MenuService $menu, ProductService $product)
    {
        $this->menu = $menu;
        $this->slider = $slider;
        $this->product = $product;

    }
    public function index()
    {
        $logo=session('logo');/*test*/
        $news=News::get();
        $video=Config::where('status','1')->where('name','video')->first();

        return view('frontend.home',[

            'title' => 'Shop-SP',
           'sliders' => $this->slider->show(),
           'menus'=>$this->menu->show(),
           'products'=>$this->product->get(),
            'logo'=>$logo,
            'news'=>$news,
            'video'=>$video
        ]);
    }

    public function loadProduct(Request $request)
    {
        $page = $request->input('page', 0);
        $result = $this->product->get($page);
        if (count($result) != 0) {
            $html = view('frontend.products.list', ['products' => $result ])->render();

            return response()->json([ 'html' => $html ]);
        }

        return response()->json(['html' => '' ]);
    }

    public function search(Request $request)
    {

            $products = Product::where('name','like','%'.$request->search.'%')->paginate(12);

            if($products->isEmpty() || empty($request->search)){
                return view('frontend.search.listsearch',[
                    'title' => 'Không Có  Sản Phẩm Tìm Kiếm',
                    'products' => null
                ]);
            }
            else{
                return view('frontend.search.listsearch',[
                    'title' => 'Sản Phẩm Tìm Kiếm',
                    'products' => $products
                ]);
            }
    }


    public function beStSale()
    {
        $products=Product::where('price_sale','!=',0)->paginate(12);
        return view('frontend.bestsaler.bestsaler',[
            'title'=>'Sale',
            'products'=>$products
        ]);
    }
}
