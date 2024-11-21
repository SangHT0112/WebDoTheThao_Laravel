<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function create()
    {
        return view('admin.coupon.add', [
            'title' => 'Thêm Coupon'
        ]);
    }

    public function createpost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'coupon' => 'required',
            'giam' => 'required|numeric|min:1',
            'quantity' => 'required|numeric|min:1',
            'created_at' => 'required'
        ], [
            'name.required' => 'Vui lòng nhập tên Coupon!',
            'coupon.required' => 'Vui lòng nhập mã Coupon!',
            'giam.required' => 'Vui lòng nhập giá giảm!',
            'giam.min' => 'Vui lòng nhập giá giảm tối thiểu là 1!',
            'quantity.required' => 'Vui lòng nhập số lượng!',
            'quantity.min' => 'Vui lòng nhập số lượng tối thiểu là 1!',
            'created_at.required' => 'Vui lòng nhập ngày tạo!'
        ]);
        $giagiam=$request->giam;
        if($request->giam_type === 'percent' && $request->giam >100)
            return redirect()->back()->with('error','Giảm giá phần trăm không thể vượt quá 100!');
        if($request->giam_type === 'percent' && $request->giam <=100)
            $giagiam=$request->giam/100;

        Coupon::create(['name'=>$request->name,
                        'coupon'=>$request->coupon,
                        'giam'=>$giagiam,
                        'quantity'=>$request->quantity,
                        'created_at'=>$request->created_at

            ]);

        return redirect()->back()->with('success','Thêm Coupon Thành Công!');
    }

    public function list()
    {
        return view('admin.coupon.list', [
            'title'=>'Danh Sách Coupon',
            'coupons' => Coupon::paginate(15)
        ]);;
    }

}
