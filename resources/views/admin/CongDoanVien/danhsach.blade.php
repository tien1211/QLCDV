@extends('admin.layout.master')
@section('admin_content')
<!--main content start-->

 <div class="panel panel-default">
    <div class="panel-heading">
     Danh Sách Công Đoàn Viên
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
            <th>Chức vụ</th>
            <th>Loại Nhân Viên</th>
            <th>Mức Hổ Trợ</th>
            <th>Họ Tên</th>
            <th>Ngày Sinh</th>
            <th>Giới tính</th>
            <th>Nguyên quán</th>
            <th>Cập Nhật</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($CongDoanVien as $cdv)
                
            @if ($cdv->cdv_trangthai == 1)
                <tr data-expanded="true">
                    <td>{{$cdv->cdv_id}}</td>
                    <td>{{$cdv->ChucVu->cv_ten}}</td>
                    <td>{{$cdv->LoaiNhanVien->lnv_ten}}</td>
                    <td>{{$cdv->MucHoTro->mht_nam}}</td>
                    <td>{{$cdv->cdv_ten}}</td>
                    <td>{{date('d/m/Y',strtotime($cdv->cdv_ngaysinh))}}</td>
                    @if($cdv->cdv_gioitinh == 1)
                    <td>Nam</td>
                    @else
                    <td>Nữ</td>
                    @endif
                <td>{{$cdv->cdv_nguyenquan}}</td>
                <td></td>
            </tr>
             @endif
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>


<!--main content end-->
@endsection