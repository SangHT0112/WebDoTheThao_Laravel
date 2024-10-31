<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\MenuService;
<<<<<<< HEAD

=======
use App\Http\Services\Slider\SliderService;
use Illuminate\Http\Request;
>>>>>>> 0c763c3c91f51227b336369c7225d46cb773ca36

class HomeController extends Controller
{
    protected $menu;
    protected $slider;
    public function __construct(SliderService $slider, MenuService $menu)
    {
        $this->menu = $menu;
        $this->slider = $slider;
    }
    public function index()
    {
        return view('frontend.home',[

            'title' => 'Shop-SP',
           'sliders' => $this->slider->show(),
           'menus'=>$this->menu->show()
>>>>>>> 0c763c3c91f51227b336369c7225d46cb773ca36
        ]);
    }
}
