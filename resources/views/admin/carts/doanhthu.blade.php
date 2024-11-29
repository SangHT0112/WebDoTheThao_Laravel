@extends('admin.main')

@section('content')
    <form class="" action="{{route('postdoanhthu')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <ul class="navbar-nav" style="padding: 10px; display: block; list-style: none; margin: 0;">
            <li class="nav-item" style="display: inline-flex; margin-right: 20px;">
                <div class="form-group">
                    <label for="created_at">Ngày tạo</label>
                    <input type="datetime-local" class="form-control form-control-sm" name="tungay" style="width: 150px;">
                </div>
            </li>

            <li class="nav-item" style="display: inline-flex;">
                <div class="form-group">
                    <label for="created_at">Ngày tạo</label>
                    <input type="datetime-local" class="form-control form-control-sm" name="denngay" style="width: 150px;">
                </div>
            </li>
            <li class="nav-item" style="display: inline-flex; margin-right: 20px;">
                <div class="form-group">
                    <label for="created_at">Lọc kết quả</label>
                    <button type="submit" class="form-control form-control-sm" style="background-color: #007bff;color: white;border: none;border-radius: 5px;">
                        Xác Nhận
                    </button>
                </div>
            </li>

        </ul>

    </form>
    <div id="myfirstchart" style="height: 250px;"></div>
        <script>
            var doanhthuData = @json($doanhthu);
            var chartData = doanhthuData.map(function(item) {
            return {
            year: item.date,
            value: item.total
        };
        });
            new Morris.Line({
            element: 'myfirstchart',
            data: chartData,
            xkey: 'year',
            ykeys: ['value'],
            labels: ['Doanh Thu'],
            parseTime: false,
            lineColors: ['#0b62a4'],
            hideHover: 'auto',
            xLabelAngle: 60
        });
    </script>

@endsection