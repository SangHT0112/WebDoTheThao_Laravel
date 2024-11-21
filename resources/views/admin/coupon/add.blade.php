
@extends('admin.main')

@section('content')

    <form action="{{route('admin.coupon.postadd')}}" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tên giảm giá
                        </label>
                        <input type="text" name="name" value="" class="form-control" style="width: 1200px">
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">  Mã giảm giá
                        </label>
                        <input type="text" name="coupon"  class="form-control" style="width: 1200px">
                    </div>
                </div>

            </div>
            <div class="row" style="margin-top: 20px">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Giảm</label>
                        <br>
                        <input type="number" name="giam" value="1" min="1" class="quantity" />
                        <select name="giam_type" class="form-control" style="width: auto;height: 35px;border: solid 1px black; display: inline-block; margin-left: 10px;">
                            <option value="percent">%</option>
                            <option value="vnd">VNĐ</option>
                        </select>
                    </div>
                </div>
            </div>


            <div class="row" style="margin-top: 20px">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Số lượng
                        </label>
                        <input type="number" name="quantity" value="1" min="1" step="1" class="quantity" style="margin-left: 20px"/>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label for="created_at">Ngày tạo</label>
                <input type="datetime-local" class="form-control" name="created_at" id="created_at">
            </div>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo coupon
            </button>
        </div>
        @csrf
    </form>
@endsection

