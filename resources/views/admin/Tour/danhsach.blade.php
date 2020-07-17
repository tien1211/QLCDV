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
            <div class="form-group">
              Từ ngày:
              <input class="form-control "  name="tour_ngaybd" type="date" value="{{$ngaybd}}">
            </div>
            <div class="form-group">
              Đến:
              <input class="form-control "  name="tour_ngaykt" type="date" value="{{$ngaykt}}">
            </div>
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
            <th>Tên Tour</th>
            <th>Hạn đăng ký</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Chi phí</th>
            <th>Số lượng </th>
            <th>Giai đoạn</th>
            <th>Đại lý</th>
            <th>Mô tả</th>

          </tr>
        </thead>

            @foreach ($Tour as $t)
            @if ($t->tour_trangthai == 1)
                <tr data-expanded="true">
                    <td>{{$t->tour_id}}</td>
                    <td>{{$t->LichTrinh->lt_ten}}</td>
                    <td>{{date('d/m/Y ',strtotime($t->tour_handk))}}</td>
                    <td>{{date('d/m/Y ',strtotime($t->tour_ngaybd))}}</td>
                    <td>{{date('d/m/Y ',strtotime($t->tour_ngaykt))}}</td>
                    <td>{{number_format($t->tour_chiphi)}}</td>
                    <td>{{$t->tour_soluong}}</td>
                    <td>{{$t->GiaiDoan->giai_doan}}</td>
                    <td>{{$t->tour_daily}}</td>
                    <td>{{$t->tour_mota}}</td>
                    <td>
                       <i class='fas fa-pencil-alt'></i><a  href="{{route('TOUR_Sua',['id'=>$t->tour_id])}}">Sửa</a>

                        <i class='fas fa-trash-alt'></i><a href="{{route('TOUR_Xoa',['id'=>$t->tour_id])}}">Xóa</a>
                      </td>
                </tr>
            @endif
          @endforeach
        </tbody>
    </div>
  </div>
</div>



@endsection
