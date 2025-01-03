@extends('admin.main')

@section('head')
    <script src="/public/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="POST">
<div class="card-body">
    <div class="form-group">
        <label for="menu">Tên Menu </label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
    </div>

    <div class="form-group">
        <label>Danh Mục</label>
        <select class="form-control" name="parent_id" id="parent_id">
            <option value="0">Menu Cha</option>
            @foreach($menus as $menu)

                <option value="{{$menu->id}}">{{$menu->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Mô Tả</label>
        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter description"></textarea>
    </div>

    <div class="form-group">
        <label>Nội Dung Chi Tiết</label>
        <textarea class="form-control" name="content" id="content" rows="5" placeholder="Enter content"></textarea>
    </div>



    <div class="form-group">
        <label>Kích Hoạt</label>
        <div class="custom-control custom-radio">
            <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
            <label for="active" class="custom-control-label">Có</label>
        </div>
        <div class="custom-control custom-radio">
            <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" >
            <label for="no_active" class="custom-control-label">Không</label>
        </div>
    </div>

    <div class="form-group">
        <label for="created_at">Ngày tạo</label>
        <input type="datetime-local" class="form-control" name="created_at" id="created_at">
    </div>


</div>

    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Tạo Menu</button>
    </div>

    @csrf
    </form>
@endsection

@section('footer')
    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
