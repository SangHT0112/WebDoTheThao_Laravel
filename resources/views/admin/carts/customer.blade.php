@extends('admin.main')

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên Khách Hàng</th>
            <th>Số Điện Thoại</th>
            <th>Email</th>
            <th>Ngày Đặt hàng</th>
            <th>Tình trạng đơn hàng</th>
            <th style="width: 100px">&nbsp;</th>

        </tr>
        </thead>
        <tbody>
        @foreach($customers as $key => $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->created_at }}</td>
                @if($customer->token)
                    <td><i class="status confirmed" style="color: green">Đã xác nhận</i></td>
                @else
                    <td><i class="status unconfirmed" style="color: red">Chưa xác nhận</i></td>

                @endif

                <td>
                    <div class="d-flex justify-content-start">
                    <a class="btn btn-primary btn-sm" href="/admin/customers/view/{{ $customer->id }}">
                        <i class="fas fa-eye"></i>
                    </a>
                    <form action="{{ route('doanhthu.remove', $customer->id) }}" method="POST" style="margin-left: 5px;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $customers->links() !!}
    </div>
@endsection


