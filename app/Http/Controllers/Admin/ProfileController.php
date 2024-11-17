<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.update',[
            'title'=>'Thông tin Admin'
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'sdt' => 'required'
        ],[
            'email.required'=>'Không được để trống email',
            'email.email'=>'Cấu trúc email không hợp lệ',
            'name.required'=>'Không được để trống tên',
            'sdt.required'=>'Không được để trống sđt'
        ]);
        User::where('id','1')->update(['name'=>$request->name,'email'=>$request->email,'sdt'=>$request->sdt]);
        if(isset($request->password)){
            User::where('id','1')->update(['password'=>bcrypt($request->password)]);
        }
        return redirect()->back()->with('success','Cập nhật thành công
');
    }
}
