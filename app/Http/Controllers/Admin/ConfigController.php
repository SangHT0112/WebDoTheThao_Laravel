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
        $video =Config::where('status',1)->where('name','video')->first();
        $diachi =Config::where('status',1)->where('name','diachi')->first();
        $email =Config::where('status',1)->where('name','email')->first();
        $copyright =Config::where('status',1)->where('name','copyright')->first();
        session(['logo'=>$logo->description]); //ko can thiet
        return view('admin.config.add',[
            'title'=>'Config'
        ],compact('logo','video','diachi','email','copyright'));
    }


    public function update(Request $request)
    {
        if($request->diachi=="" || $request->email=="" || $request->copyright==""  ||empty($request->cmt)){
            return redirect('admin/config')->with(['flash_level' => 'danger','flash_message'=>'Vui lòng điền đầy đủ thông tin
!']);
        }

            Config::where('status', 1)->where('name', 'diachi')->update(['description' => $request->diachi]);
            Config::where('status', 1)->where('name', 'email')->update(['description' => $request->email]);
            Config::where('status', 1)->where('name', 'copyright')->update(['description' => $request->copyright]);
            $cmt = strip_tags($request->cmt);
            Config::where('status', 1)->where('name', 'video')->update(['cmt' => $cmt ]);
            if (!empty($request->file('logo'))) {
                $logo = Config::where('status', 1)->where('name', 'logo')->first();
                $path = 'template/frontend/images/' . $logo->description;
                if (file_exists($path)) {
                    unlink($path);
                }
                $newdescription = $request->file('logo')->getClientOriginalName();
                $request->file('logo')->move('template/frontend/images/', $newdescription);
                $logo->description = $newdescription;
                $logo->save();
            }

            if (!empty($request->file('video'))) {
                $video = Config::where('status', 1)->where('name', 'video')->first();
                $path = 'template/frontend/images/' . $video->description;
                if (file_exists($path)) {
                    unlink($path);
                }
                $newdescription = $request->file('video')->getClientOriginalName();
                $request->file('video')->move('template/frontend/images/', $newdescription);
                $video->description = $newdescription;
                $video->save();
            }
        return redirect()->back()->with('success','Cập nhật thành công');
    }

}
