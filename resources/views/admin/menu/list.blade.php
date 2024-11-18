@extends('admin.main')

@section('content')
    <ul class="navbar-nav" style="padding: 10px">

        <li class="nav-item">
            <form class="example" action="{{route('admin.menus.search')}}" method="POST" enctype="multipart/form-data">
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
            <th>Name</th>
            <th>Active</th>
            <th>Update</th>
            <th style="width: 100px">&nbsp;</th>


        </tr>
    </thead>

    <tbody>

    @foreach($menus as $k=>$menu)
        @if($menu->parent_id==0)
            <tr>
                <td>{{$menu->id}}</td>
                <td>{{$menu->name}}</td>
                <td>@if($menu->active==1)
                        <span class="btn btn-success btn-xs">YES</span>
                    @else <span class="btn btn-danger btn-xs">NO</span>
                    @endif
                </td>
                <td>{{$menu->updated_at}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{route('admin.menus.edit',$menu->id)}}"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm" href="{{route('admin.menus.destroy',$menu->id)}}" ><i class="fas fa-trash"></i></a>


                </td>

            </tr>
        @endif
        @if($menu->parent_id!=0)
            <tr>
                <td>--{{$menu->id}}</td>
                <td>{{$menu->name}}</td>
                <td>@if($menu->active==1)
                        <span class="btn btn-success btn-xs">YES</span>
                    @else <span class="btn btn-danger btn-xs">NO</span>
                    @endif
                </td>
                <td>{{$menu->updated_at}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{route('admin.menus.edit',$menu->id)}}"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm" href="{{route('admin.menus.destroy',$menu->id)}}" ><i class="fas fa-trash"></i></a>

                </td>

            </tr>
        @endif


    @endforeach
    </tbody>
</table>

@endsection
