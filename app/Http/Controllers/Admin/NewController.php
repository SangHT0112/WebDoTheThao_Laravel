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
            'description' => 'required'
        ],[
            'title.required'=>'Vui lòng nhập tiêu đề!',
            'description.required'=>'Vui lòng nhập mô tả!',
        ]);
        try{
            $id='';
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $nameimage = $request->file('image')->getClientOriginalName();
                $path='uploads/'.date("Y/m/d");
                $request->file('image')->storeAs('public/'.$path,$nameimage);
                $id=$path.'/'.$nameimage;
            }
        News::create([
            'status'=>(int)$request->status,
            'title'=>(string)$request->title,
            'description'=>(string)$request->description,
            'qc'=>(int)$request->qc,
            'imgs'=>$id
        ]);

        return redirect()->back()->with('success','Thêm Tin Tức Thành Công');}
        catch (\Exception $exception){
            return redirect()->back()->with('erorr','Thêm Tin Tức Không Thành Công');
        }
    }

    public function list()
    {
        $new=News::orderByDesc('id')->paginate(20);
        return view('admin.news.list',[
            'title'=>'Danh Sách Tin Tức Mới Nhất',
            'new'=>$new
        ]);
    }

    public function edit(News $id)
    {
        return view('admin.news.edit',[
            'title'=>'Chỉnh Sửa Tin Tức     '.($id->title),
            'news'=>$id
        ]);
    }

    public function update(News $id,Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',

        ],[
            'title.required'=>'Tiêu đề không được để trống!',
            'description.required'=>'Mô tả không được để trống!',

        ]);
        try{
        $id->update(["title"=>$request->title , "description"=>$request->description ,"status"=>$request->status,"qc"=>$request->qc]);

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $nameimage = $request->file('image')->getClientOriginalName();
            $path='uploads/'.date("Y/m/d");
            $request->file('image')->storeAs('public/'.$path,$nameimage);
            $id->update(["imgs"=>$path.'/'.$nameimage]);
        }

        return redirect()->back()->with('success','Cập Nhật Tin Tức Thành Công');}
        catch (\Exception $exception){
            return redirect()->back()->with('erorr','Cập Nhật Tin Tức Không Thành Công');
        }
    }

    public function destroy(News $id)
    {
        if($id) {
            $id->delete();
            return redirect()->back()->with('success',"Xóa Tin Tức Thành Công!");
        }
        else
            return redirect()->back()->with('error',"Xóa Tin Tức Không Thành Công!");
    }
}
