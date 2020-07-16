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
                <option value="">Chọn loại nhân viên...</option>
                @foreach($LoaiNhanVien as $lnv)
                @if($lnv->lnv_id == $lnv_id)
                <option selected value='{{$lnv->lnv_id}}'>{{$lnv->lnv_ten}}</option>
                @else
                <option value='{{$lnv->lnv_id}}'>{{$lnv->lnv_ten}}</option>
                @endif
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <select class="form-control m-bot15" name="cv_id">
              <option value="">Chọn chức vụ...</option>
                @foreach ($ChucVu as $cv)
                @if($cv->cv_id == $cv_id)
                <option selected value='{{$cv->cv_id}}'>{{$cv->cv_ten}}</option>
                @else
                <option value='{{$cv->cv_id}}'>{{$cv->cv_ten}}</option>
                @endif
                @endforeach
              </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="tukhoa" name="tukhoa">
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
          <tr><div class="form-group" style="mt-3">
            <div class="flash-message">
              @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" d
                ata-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
              @endforeach
          </div>
          </div></tr>
          <tr>
            <th data-breakpoints="xs">ID</th>
            <th>Đơn vị</th>
            <th>Chức vụ</th>
            <th>Loại Nhân Viên</th>
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
                    <td>{{$cdv->DonVi->dv_ten}}</td>
                    <td>{{$cdv->ChucVu->cv_ten}}</td>
                    <td>{{$cdv->LoaiNhanVien->lnv_ten}}</td>
                    <td>{{$cdv->cdv_ten}}</td>
                    <td>{{date('d/m/Y',strtotime($cdv->cdv_ngaysinh))}}</td>
                    @if($cdv->cdv_gioitinh == 1)
                    <td>Nam</td>
                    @else
                    <td>Nữ</td>
                    @endif
                <td>{{$cdv->cdv_nguyenquan}}</td>
                <td><a href="{{route('CDV_ChiTiet',['id'=>$cdv->cdv_id])}}"><button type="button" class="btn btn-outline-info">Chi Tiết</button></a></td>
                <td>
                  <i class='fas fa-pencil-alt'></i><a href="{{route('CDV_Sua',['id'=>$cdv->cdv_id])}}">Sửa</a>
                  <i class='fas fa-trash-alt'></i><a href="{{route('CDV_Xoa',['id'=>$cdv->cdv_id])}}" onclick="return confirm('Bạn có chắc muốn xóa không?');">Xóa</a>
                </td>
            </tr>
            @endif
          @endforeach
        </tbody>
        
      </table>
      <center>{!! $CongDoanVien->links() !!}</center>
    </div>
  </div>
</div>


<!--main content end-->
@endsection