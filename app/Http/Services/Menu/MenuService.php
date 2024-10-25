<?php


namespace App\Http\Services\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Menu;

class MenuService
{
    public function create($request)
    {
        try{
            //dd($request->input());
            Menu::create([
               'name' =>(string) $request->input('name'),
                'parent_id' =>(int) $request->input('parent_id'),
                'slug' =>Str::slug($request->input('name'),'-'),
                'description' =>(string) $request->input('description'),
                'content' =>(string) $request->input('content'),
                'active' =>(string) $request->input('active'),
            ]);

                Session::flash('success','Thêm danh mục thành công');
        }catch(\Exception $err){
                Session::flash('error',$err->getMessage());
                return false;
        }

        return true;
    }
}