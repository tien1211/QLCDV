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
            <form class="form-inline" role="form" action="{{route('TOUR_Timkiem')}}" method="post">
            {{ csrf_field() }}
            {{-- <div class="form-group">
              Từ ngày:
              <input class="form-control "  name="tour_ngaybd" type="date" value="{{$ngaybd}}">
            </div>
            <div class="form-group">
              Đến:
              <input class="form-control "  name="tour_ngaykt" type="date" value="{{$ngaykt}}">
            </div> --}}
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
            <th data-breakpoints="xs">ID</th>
            <th>Lịch Trình Tên</th>
            <th>Lịch Trình File</th>

          </tr>
        </thead>

            @foreach ($LichTrinh as $lt)
            @if ($lt->lt_trangthai == 1)
                <tr data-expanded="true">
                    <td>{{$lt->lt_id}}</td>
                    <td>{{$lt->lt_ten}}</td>
                    <td>{{$lt->lt_file}}</td>
                    <td>
                        <i class='fas fa-pencil-alt'></i><a  href="{{route('LT_Sua',['id'=>$lt->lt_id])}}">Sửa</a>

                        <i class='fas fa-trash-alt'></i><a href="{{route('LT_Xoa',['id'=>$lt->lt_id])}}">Xóa</a>
                    </td>


                </tr>
            @endif
          @endforeach
        </tbody>
    </div>
  </div>
</div>



@endsection
