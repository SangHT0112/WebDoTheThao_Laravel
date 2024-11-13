@extends('admin.main')

@section('content')
    <form action="" method="POST">
        <div class="card-body">


            <div class="form-group">
                <label for="menu">Logo</label>
                <input type="file"  class="form-control" id="upload">
                <div id="image_show">

                </div>
                <input type="hidden" name="thumb" id="thumb">
            </div>


            <div class="form-group">
                <label for="menu">Favicon</label>
                <input type="file"  class="form-control" id="upload">
                <div id="image_show">

                </div>
                <input type="hidden" name="thumb" id="thumb">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu"> Địa chỉ
                        </label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" style="width: 1379px">
                    </div>
                </div>

            </div>



            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu"> Email
                        </label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" style="width: 1379px">
                    </div>
                </div>

            </div>



        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật cấu hình
            </button>
        </div>
        @csrf
    </form>
@endsection

