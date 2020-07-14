@extends('admin.layout.master')
@section('admin_content')
<!--main content start-->

 <div class="panel panel-default">
    <div class="panel-heading">
     Danh Sách Tour
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
            <th>Lịch Trình</th>
            <th>Hạn đăng ký</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Chi phí</th>
            <th>Số lượng </th>
            <th>Phương tiện</th>
            <th>Địa điểm</th>
            <th>Trong năm</th>
          </tr>
        </thead>

            @foreach ($Tour as $t)

                <tr data-expanded="true">
                    <td>{{$t->tour_id}}</td>
                    <td>{{$t->LichTrinh->lt_id}}</td>
                    <td>{{date('d/m/Y H:i:s',strtotime($t->tour_handk))}}</td>
                    <td>{{date('d/m/Y H:i:s',strtotime($t->tour_ngaybd))}}</td>
                    <td>{{date('d/m/Y H:i:s',strtotime($t->tour_ngaykt))}}</td>
                    <td>{{number_format($t->tour_chiphi)}}</td>
                    <td>{{$t->tour_soluong}}</td>
                    <td>{{$t->tour_phuongtien}}</td>
                    <td>{{$t->tour_diadiem}}</td>
                    <td>{{$t->tour_trongnam}}</td>


          @endforeach
        </tbody>
    </div>
  </div>
</div>



@endsection
