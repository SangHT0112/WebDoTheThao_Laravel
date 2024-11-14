@extends('admin.main')

@section('content')

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">


            <div class="form-group">
                <label for="menu">Logo</label>

                <input type="file"  class="form-control" name="logo"><label>{{$logo->description}}</label>
                <img src="{{url('template/frontend/images/'.$logo->description)}}" style="width: 80px;height: 40px;float: left">

                <div >

                </div>
                <input type="hidden"  >

            </div>


            <div class="form-group">
                <label for="menu">Favicon</label>
                <input type="file"  class="form-control" name="favicon"><label>{{$favicon->description}}</label>
                <img src="{{url('template/frontend/images/'.$favicon->description)}}" style="width: 80px;height: 40px;float: left">

                <input type="hidden" name="" id="">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu"> Địa chỉ
                        </label>
                        <input type="text" name="diachi" value="{{ $diachi->description }}" class="form-control" style="width: 1379px">
                    </div>
                </div>

            </div>



            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu"> Email
                        </label>
                        <input type="text" name="email" value="{{$email->description}}" class="form-control" style="width: 1379px">
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu"> Copyright
                        </label>
                        <input type="text" name="copyright" value="{{$copyright->description}}" class="form-control" style="width: 1379px">
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

