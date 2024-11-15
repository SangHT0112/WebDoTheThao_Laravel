<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Menu\MenuService;
use Illuminate\Http\Request;
use App\Models\Menu;


class   MenuController extends Controller
{

    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function create()
    {
        return view('admin.menu.add',[
            'title' => 'Thêm Menu',
            'menus'=> $this->menuService->getParent()
        ]);
    }

    public function store(CreateFormRequest $request)
    {

        $this->menuService->create($request);

        return redirect()->back();
    }

    public function index()
    {
        return view('admin.menu.list',[
            'title'=>'Danh sách Menu mới nhất',
            'menus'=> $this->menuService->getAll()
        ]);
    }

    public function show(Menu $menu)
    {
        return view('admin.menu.edit',[
            'title'=>'Chỉnh sửa menu: ' . $menu->name,
            'menu'=> $menu,
            'menus'=> $this->menuService->getParent()
        ]);
    }

    public function update(Menu $menu, CreateFormRequest $request)
    {
        $this->menuService->update($request, $menu);
        return redirect('/admin/menus/list');
    }


    public function destroy(Request $request)
    {
        $result=$this->menuService->destroy($request);
        if($result){
            return response()->json([
                    'error'=>false,
                'message'=>'Xóa thành công menu !'
            ]);
        }


        return response()->json([
            'error'=>true
        ]);
    }




}
