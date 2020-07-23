@extends('admin.layout.master')
@section('admin_content')
<!--main content start-->

 <div class="panel panel-default">
    <div class="panel-heading">
    Danh Sách Tour
    </div>
    <?php
    $message = Session::get('message');
    if($message){
      echo '<span class="text-alert">'.$message.'</span>';
      Session::put('message',null);
    }
    ?>
    <div class="panel-body">
        <div class="position-right">
            <form class="form-inline" role="form" action="{{route('LT_Timkiem')}}" method="get">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" class="form-control" id="tukhoa" placeholder="từ khóa tìm kiếm" name="tukhoa">
            </div>
              <button type="submit" class="btn btn-outline-info">Tìm kiếm</button>
        </form>
        </div>
    </div>
    <div>
      <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
        <thead>
          <tr>
            <th data-breakpoints="xs">STT</th>
            <th>Lịch Trình Tên</th>
            <th>Lịch Trình File</th>
            <th>Hình ảnh liên quan</th>
            <th>Cập Nhật</th>
          </tr>
        </thead>

            @foreach ($LichTrinh as $key => $lt)
            @if ($lt->lt_trangthai == 1)
                <tr data-expanded="true">
                    <td>{{$key + 1}}</td>
                    <td>{{$lt->lt_ten}}</td>
                    <td><a href="{{url('upload/lichtrinh/'.$lt->lt_file)}}">{{$lt->lt_file}}</a></td>
                    <td><a href="{{route('LT_HinhAnh',['id'=>$lt->lt_id])}}"><button type="button" class="btn btn-outline-info">danh sách hình</button></a></td>
                    <td>
                        <i class='fas fa-pencil-alt'></i><a  href="{{route('LT_Sua',['id'=>$lt->lt_id])}}">Sửa</a>
                        <i class='fas fa-trash-alt'></i><a href="{{route('LT_Xoa',['id'=>$lt->lt_id])}} ">Xóa</a>
                    </td>
                </tr>
            @endif
          @endforeach
        </tbody>
    </div>
  </div>
 </div>



@endsection
