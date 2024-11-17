<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewController extends Controller
{
    public function create()
    {

        return view('admin.news.add',[
        'title'=>'Thêm Tin Tức',

        ]);
    }

    public function postCreate(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ],[
            'title.required'=>'Vui lòng nhập tiêu đề!',
            'description.required'=>'Vui lòng nhập mô tả!',
            'image.required'=>'Vui lòng thêm ảnh!'
        ]);
    }

    public function list()
    {
        return view('admin.news.list',[
            'title'=>'Danh Sách Tin Tức Mới Nhất'
        ]);
    }
}
