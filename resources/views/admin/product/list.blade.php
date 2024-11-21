@extends('admin.main')

@section('content')
    <ul class="navbar-nav" style="padding: 10px">

        <li class="nav-item">
            <form class="example" action="{{route('admin.products.search')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <button type="submit" style="border: solid 1px blue;border-radius: 15%"><i class="fa fa-search"></i></button>
                <input type="text" placeholder="Search.." name="search" style="border: solid 1px blue;">

            </form>
        </li>


    </ul>
<table class="table">
    <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên Sản Phẩm</th>
            <th>Danh Mục</th>
            <th>Giá Gốc</th>
            <th>Giá Sale</th>
            <th>Trạng thái</th>
            <th>Cập nhật</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
    </thead>

    <tbody>
    @foreach($products as $searchs)
        <tr>
            <td>{{$searchs->id}}</td>
            <td>{{$searchs->name}}</td>
            <td>{{$searchs->menu->name}}</td>
            <td>{{$searchs->price}}</td>
            <td>{{$searchs->price_sale}}</td>
            <td>@if($searchs->active==1)
                    <span class="btn btn-success btn-xs">YES</span>
                @else <span class="btn btn-danger btn-xs">NO</span>
                @endif
            </td>
            <td>{{$searchs->updated_at}}</td>
            <td><a class="btn btn-primary btn-sm" href="{{route('admin.products.edit',$searchs->id)}}"><i class="fas fa-edit"></i></a>
                <form action="{{ route('admin.products.destroy', $searchs->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" >
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{!! $products->links() !!}
@endsection
