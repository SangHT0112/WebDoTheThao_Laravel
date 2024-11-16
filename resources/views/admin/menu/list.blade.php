@extends('admin.main')

@section('content')
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
                    <a class="btn btn-primary btn-sm" href="/admin/menus/edit/{{$menu->id}}"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm" href="#" onclick="event.preventDefault(); document.getElementById('form-dele').submit()";><i class="fas fa-trash"></i></a>
                    <form id="form-dele" action="{{ route('admin.menus.destroy',$menu->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>

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
                    <a class="btn btn-primary btn-sm" href="/admin/menus/edit/{{$menu->id}}"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm" href="#" onclick="event.preventDefault(); document.getElementById('form-dele').submit()";><i class="fas fa-trash"></i></a>
                    <form id="form-dele" action="{{ route('admin.menus.destroy',$menu->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>

                </td>

            </tr>
        @endif


    @endforeach
    </tbody>
</table>

@endsection
