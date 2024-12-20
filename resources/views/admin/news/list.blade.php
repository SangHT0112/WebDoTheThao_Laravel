@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tiêu đề</th>
            <th>Mô tả</th>
            <th>Ảnh</th>
            <th>Cập nhật</th>
            <th>Trạng thái</th>
            <th>Quảng cáo</th>
            <th style="width: 100px">&nbsp;</th>


        </tr>
        </thead>

        <tbody>

        @foreach($new as $news)
            <tr>
            <td>{{$news->id}}</td>
                <td>{{$news->title}}</td>
                <td>{{$news->description}}</td>
                <td><a href="{{asset('storage/'.$news->imgs)}}" target="_blank">
                        <img src="{{asset('storage/'.$news->imgs)}}" height="40px">
                    </a>
                </td>
                <td>{{$news->updated_at}}</td>
                <td>
                    @if($news->status == 1)
                        <span class="btn btn-success btn-xs">YES</span>
                    @else
                        <span class="btn btn-danger btn-xs">NO</span>
                    @endif
                </td>
                <td>
                    @if($news->qc == 1)
                        <span class="btn btn-success btn-xs">YES</span>
                    @else
                        <span class="btn btn-danger btn-xs">NO</span>
                    @endif
                </td>
                <td>
                    <div class="d-flex justify-content-start">

                        <a class="btn btn-primary btn-sm" href="{{ route('admin.news.edit', ['id' => $news->id]) }}">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form action="{{ route('admin.news.destroy', $news->id) }}" method="POST" style="margin-left: 5px;">
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

@endsection
