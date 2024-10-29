<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\MenuService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $menu;
    public function _construct(MenuService $menu)
    {
        $this->menu = $menu;
    }
    public function index()
    {
        return view('frontend.home',[
            'title' => 'Shop-SP',
            'menus'=>$this->menu->show()
        ]);
    }
}
