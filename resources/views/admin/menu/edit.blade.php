@extends('admin.main')

@section('head')
    <script src="/public/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên Danh Mục</label>
                <input type="text" class="form-control" name="name" value="{{ $menu->name  }}" id="name" placeholder="Enter name">
            </div>

            <div class="form-group">
                <label>Danh Mục</label>
                <select class="form-control" name="parent_id" id="parent_id">
                    <option value="0" {{ $menu->parent_id == 0 ? 'selected' :'' }} >Danh Mục Cha</option>
                    @foreach($menus as $menuParent)
                        <option value="{{$menuParent->id}}"
                            {{ $menu->parent_id == $menuParent->id ? 'selected' :'' }}>
                            {{$menuParent->name}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Mô Tả</label>
                <textarea class="form-control" name="description" {{ $menu->description   }}></textarea>
            </div>

            <div class="form-group">
                <label>Nội Dung Chi Tiết</label>
                <textarea class="form-control" name="content" id="content" {{ $menu->content   }}></textarea>
            </div>

            <div class="form-group">
                <label for="">Kích Hoạt</label>
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" id="active"
                           name="active" {{ $menu->active ==1 ? 'checked=""' : ''}}>
                    <label for="active" class="form-check-label">Có</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="0" type="radio" id="no_active"
                           name="active" {{ $menu->active ==0 ? 'checked=""' : ''}}>
                    <label for="no_active" class="form-check-label">Không</label>
                </div>
            </div>


            <div class="form-group">
                <label for="updated_at">Ngày Cập Nhật</label>
                <input type="datetime-local" class="form-control" name="updated_at" id="updated_at">
            </div>
        </div>

        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>

        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
