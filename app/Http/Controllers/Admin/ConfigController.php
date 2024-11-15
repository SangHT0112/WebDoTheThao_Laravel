<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;
class ConfigController extends Controller
{
    public function index()
    {
        $logo =Config::where('status',1)->where('name','logo')->first();
        $favicon =Config::where('status',1)->where('name','favicon')->first();
        $diachi =Config::where('status',1)->where('name','diachi')->first();
        $email =Config::where('status',1)->where('name','email')->first();
        $copyright =Config::where('status',1)->where('name','copyright')->first();
        session(['logo'=>$logo->description]); //ko can thiet
        return view('admin.config.add',[
            'title'=>'Config'
        ],compact('logo','favicon','diachi','email','copyright'));
    }


    public function update(Request $request)
    {
        if($request->diachi=="" || $request->email=="" || $request->copyright==""){
            return redirect('admin/config')->with(['flash_level' => 'danger','flash_message'=>'Vui long dien day du thong tin!']);
        }

        Config::where('status',1)->where('name','diachi')->update(['description'=>$request->diachi]);
        Config::where('status',1)->where('name','email')->update(['description'=>$request->email]);
        Config::where('status',1)->where('name','copyright')->update(['description'=>$request->copyright]);

        if(!empty($request->file('logo'))){
            $logo = Config::where('status',1)->where('name','logo')->first();
            $path='template/frontend/images/'.$logo->description;
            if(file_exists($path)){
                unlink($path);
            }
            $newdescription=$request->file('logo')->getClientOriginalName();
            $request->file('logo')->move('template/frontend/images/',$newdescription);
            $logo->description = $newdescription;
            $logo->save();
        }

        if(!empty($request->file('favicon'))){
            $favicon = Config::where('status',1)->where('name','favicon')->first();
            $path='template/frontend/images/'.$favicon->description;
            if(file_exists($path)){
                unlink($path);
            }
            $newdescription=$request->file('favicon')->getClientOriginalName();
            $request->file('favicon')->move('template/frontend/images/',$newdescription);
            $favicon->description = $newdescription;
            $favicon->save();
        }
    }

}
