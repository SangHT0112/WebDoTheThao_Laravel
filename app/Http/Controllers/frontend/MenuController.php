<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\MenuService;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index(Request $request,Menu $id, $slug = '')
    {
        $products = $this->menuService->getProduct($id, $request);
        return view('frontend.menu', [
            'title' => $id->name,
            'products' => $products
        ]);
    }
}
