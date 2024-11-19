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
                <label for="menu">Video</label>

                <input type="file" class="form-control" name="video">
                @if($video && file_exists(public_path('template/frontend/images/'.$video->description)))
                    <video width="320" height="240" controls>
                        <source src="{{ url('template/frontend/images/'.$video->description) }}" type="video/mp4">
                        <source src="{{ url('template/frontend/images/'.$video->description) }}" type="video/webm">
                        <source src="{{ url('template/frontend/images/'.$video->description) }}" type="video/ogg">

                    </video>
                    <label>{{ $video->description }}</label>
                @else
                    <p>Video chưa được tải lên hoặc không hợp lệ.</p>
                @endif
            </div>

            <div class="form-group">
                <label>Ghi chú Video
                </label>
                <textarea class="form-control" name="cmt" id="content" rows="8" placeholder="Enter content">
                    {{$video->cmt}}
                </textarea>
            </div>

            <div class="form-group">
                <label>Địa chỉ
                </label>
                <textarea class="form-control" name="diachi" id="content1" rows="8" placeholder="Enter content">
                    {{$diachi->description}}
                </textarea>
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
    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#content1'))
            .catch(error => {
                console.error(error);
            });
    </script>

@endsection

