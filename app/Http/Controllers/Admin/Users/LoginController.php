<?php

namespace App\Http\Controllers\Admin\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function index(){
        return view("admin.users.login",[
            'title' => 'Đăng nhập Admin'
        ]);
    }

    //Request de lay thong tin tu form
    public function store(Request $request){
        $request->validate([
            'email' => 'required|email:filter',
            'password' => 'required',
        ], [
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Địa chỉ email không đúng định dạng.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
        ]);

        // Xử lý đăng nhập sau khi xác thực thành công

        if(Auth::attempt([      //Auth::attempt nhận một mảng thông tin
            'email'=> $request->email,
            'password' => $request->password]))
        {
            return redirect() -> route('admin');
        }
        // Nếu đăng nhập không thành công, trả về trang trước đó với thông báo lỗi
        return redirect()->back()->withErrors([
            'login' => 'Thông tin đăng nhập không chính xác.',
        ])->withInput(); // Giữ lại giá trị input của người dùng
    }
}
