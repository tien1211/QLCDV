@extends('admin.layout.master')
@section('admin_content')
<!--main content start-->
 <div class="panel panel-default">
    <div class="panel-heading">
      Danh Sách Công Đoàn Viên
    </div>
    <div class="panel-body">
        <div class="position-right">
            <form class="form-inline" role="form" action="{{route('CDV_Timkiem')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <select class="form-control m-bot15" name="lnv_id">
                <option value="">Chọn mức loại nhân viên...</option>
                @foreach ($LoaiNhanVien as $lnv)
                <option value='{{$lnv->lnv_id}}'>{{$lnv->lnv_ten}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <select class="form-control m-bot15" name="cv_id">
                <option value="">Chọn mức chức vụ...</option>
                @foreach ($ChucVu as $cv)
                <option value='{{$cv->cv_id}}'>{{$cv->cv_ten}}</option>
                @endforeach
              </select>
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