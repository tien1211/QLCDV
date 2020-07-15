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
            <th>Lịch Trình</th>
            <th>Hạn đăng ký</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Chi phí</th>
            <th>Số lượng </th>
            <th>Phương tiện</th>
            <th>Địa điểm</th>
            <th>Trong năm</th>
            <th>Chức năng</th>
          </tr>
        </thead>

            @foreach ($Tour as $t)
            @if ($t->tour_trangthai == 1)
                <tr data-expanded="true">
                    <td>{{$t->tour_id}}</td>
                    <td>{{$t->LichTrinh->lt_file}}</td>
                    <td>{{date('d/m/Y H:i:s',strtotime($t->tour_handk))}}</td>
                    <td>{{date('d/m/Y H:i:s',strtotime($t->tour_ngaybd))}}</td>
                    <td>{{date('d/m/Y H:i:s',strtotime($t->tour_ngaykt))}}</td>
                    <td>{{number_format($t->tour_chiphi)}}</td>
                    <td>{{$t->tour_soluong}}</td>
                    <td>{{$t->tour_phuongtien}}</td>
                    <td>{{$t->tour_diadiem}}</td>
                    <td>{{$t->tour_trongnam}}</td>
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
