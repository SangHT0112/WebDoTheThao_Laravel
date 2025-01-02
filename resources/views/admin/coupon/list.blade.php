@extends('admin.main')

@section('content')
    <ul class="navbar-nav" style="padding: 10px">

    </ul>
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên mã Coupon</th>
            <th>Mã Coupon</th>
            <th>Giảm</th>
            <th>Quantity</th>
            <th style="width: 100px">&nbsp;</th>


        </tr>
        </thead>

        <tbody>

        @foreach($coupons as $k=>$coupon)

                <tr>
                    <td>{{$coupon->id}}</td>
                    <td>{{$coupon->name}}</td>
                    <td>{{$coupon->coupon}}</td>
                    @if($coupon->giam < 1)
                        <td>{{$coupon->giam * 100}}%</td>
                    @else  <td>{{ number_format($coupon->giam) }} VNĐ</td>
                    @endif

                    <td>{{$coupon->quantity}}</td>
                    <td>
                        <form method="POST" action="{{route('admin.coupon.delete',['id'=>$coupon->id])}}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                        </button>
                        </form>

                    </td>

                </tr>




        @endforeach
        </tbody>
    </table>

@endsection
