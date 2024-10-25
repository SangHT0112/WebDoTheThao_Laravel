<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Menu\MenuService;
use Illuminate\Http\Request;
use LDAP\Result;

class MenuController extends Controller
{

    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }
    public function create()
    {
        return view('admin.menu.add',[
            'title' => 'Thêm danh mục'
        ]);
    }

    public function store(CreateFormRequest $request)
    {
       // dd($request->input());
        $result = $this->menuService->create($request);

        return redirect()->back();
    }
}
