@extends('admin.layout.master')
@section('admin_content')
<!--main content start-->
 <div class="panel panel-default">
    <div class="panel-heading">
      Danh Sách Công Đoàn Viên
    </div>
    <form action="{{route('CDV_Timkiem')}}" method="post" role="form">
    <div class="panel-body" style="float: right">
    {{ csrf_field() }}
      <input type="text"  name="tukhoa" class="form" placeholder=" Search">
      <button type="submit" class="btn btn-outline-info">Tìm kiếm</button>
    </div>
    </form>
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
            <th>Chi Tiết</th>
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
                <td><a href=""><button type="button" class="btn btn-outline-info">Chi Tiết</button></a></td>
                <td>
                  <i class='fas fa-pencil-alt'></i><a href="{{route('CDV_Sua',['id'=>$cdv->cdv_id])}}">Sửa</a>
                  <i class='fas fa-trash-alt'></i><a href="admin/CongDoanVien/CDV_XoaCDV/{{$cdv->cdv_id}}">Xóa</a>
                </td>
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