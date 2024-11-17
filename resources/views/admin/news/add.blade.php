@extends('admin.main')

@section('content')

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">


            <div class="form-group">
                <label for="menu">Hình ảnh</label>

                <input type="file"  class="form-control" name="image"><label></label>
                <img src="" style="width: 80px;height: 40px;float: left">

                <div>

                </div>
                <input type="hidden"  >

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

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật cấu hình
            </button>
        </div>
        @csrf
    </form>
@endsection

