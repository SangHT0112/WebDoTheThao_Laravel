@extends('admin.main')

@section('content')

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu"> Tên người dùng
                        </label>
                        <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" style="width: 1200px">
                    </div>
                </div>

            </div>



            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu"> SDT
                        </label>
                        <input type="text" name="sdt" value="{{Auth::user()->sdt}}" class="form-control" style="width: 1200px">
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu"> Email
                        </label>
                        <input type="text" name="email" value="{{Auth::user()->email}}" class="form-control" style="width: 1200px">
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu"> Mật khẩu
                        </label>
                        <input type="text" name="password" value="" class="form-control" style="width: 1200px">
                        <i style="color: red;font-size: 12px">*Khi cần thay đổi mật khẩu thì hãy điền vào
                        </i>
                    </div>
                </div>

            </div>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật thông tin

            </button>
        </div>
        @csrf
    </form>
@endsection

