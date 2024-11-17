@extends('admin.main')

@section('content')

    <form action="{{route('admin.news.postCreate')}}" method="POST" enctype="multipart/form-data">
        <div class="card-body">


            <div class="form-group">
                <label for="menu">Ảnh</label>
                <input type="file"  class="form-control" id="upload" name="image">
                <div id="image_show">

                </div>
                <input type="hidden" name="thumb" id="thumb">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu"> Tiêu đề
                        </label>
                        <input type="text" name="title" value="" class="form-control" style="width: 1192px">
                    </div>
                </div>

            </div>



            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu"> Mô tả
                        </label>
                        <input type="text" name="description" value="" class="form-control" style="width: 1192px">
                    </div>
                </div>

            </div>





            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="status" checked="">
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="status" >
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

            <div class="form-group">
                <label for="created_at">Ngày tạo</label>
                <input type="datetime-local" class="form-control" name="created_at" id="created_at">
            </div>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm tin tức
            </button>
        </div>
        @csrf
    </form>
@endsection

