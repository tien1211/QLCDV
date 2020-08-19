@extends('admin.layout.master')
@section('admin_content')
<!--main content start-->

{{-- <div class="form-group" style="mt-3">
    <div class="flash-message">
      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" d
        ata-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
      @endforeach
  </div>
  </div> --}}

  @if(Session::has('alert-1'))
  @section('script')
  <script>
    window.onload =  function()
      {
      alert('Thêm thành công');
      };
</script>
  @endsection
  @endif
  @if(Session::has('alert-2'))
  @section('script')
  <script>
    window.onload =  function()
      {
      alert('Sửa thành công');
      };
</script>
  @endsection
    <a class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
  @endif
  @if(Session::has('alert-3'))
  @section('script')
  <script>
    window.onload =  function()
      {
      alert('Xóa thành công');
      };
</script>
  @endsection
    <a class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
  @endif

<div class="panel panel-default">
  {{-- <div id = demo> --}}
    <div class="panel-heading">
      Danh Sách Công Đoàn Viên
    </div>
    @extends('admin.layout.partials.error-message')
    <div class="panel-body">
        <div class="position-left">
            <form  id="content-form" class="form-inline" role="form" action="{{route('CDV_Timkiem')}}" method="get">
            {{ csrf_field() }}
            <div class="form-group">
              <select id="dv" onchange="timkiem()" class="form-control m-bot15" name="dv_id">
                <option  value="">Chọn đơn vị...</option>
                @foreach($DonVi as $dv)
                @if ($dv->dv_trangthai == 1)
                  @if($dv->dv_id == $dv_id)
                  <option selected value='{{$dv->dv_id}}'>{{$dv->dv_ten}}</option>
                  @else
                  <option value='{{$dv->dv_id}}'>{{$dv->dv_ten}}</option>
                  @endif
                @endif

                @endforeach
              </select>
            </div>
            <div class="form-group">
              <select onchange="timkiem()" class="form-control m-bot15" name="lnv_id">
                <option value="">Chọn loại nhân viên...</option>
                @foreach($LoaiNhanVien as $lnv)
                @if ($lnv->lnv_trangthai==1)
                    @if($lnv->lnv_id == $lnv_id)
                    <option selected value='{{$lnv->lnv_id}}'>{{$lnv->lnv_ten}}</option>
                    @else
                    <option value='{{$lnv->lnv_id}}'>{{$lnv->lnv_ten}}</option>
                    @endif
                @endif
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <select onchange="timkiem()" class="form-control m-bot15" name="cv_id">
                <option value="">Chọn chức vụ...</option>
                @foreach ($ChucVu as $cv)
                @if ($cv->cv_trangthai == 1)
                  @if($cv->cv_id == $cv_id)
                  <option selected value='{{$cv->cv_id}}'>{{$cv->cv_ten}}</option>
                  @else
                  <option  value='{{$cv->cv_id}}'>{{$cv->cv_ten}}</option>
                  @endif
                @endif
                @endforeach
              </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="tukhoa" name="tukhoa">
            </div>
                  <button type="submit" class="btn btn-primary" id="search"><i class=" glyphicon glyphicon-search" style="color: aliceblue"></i></button>
                  <a href="{{route('CDV_Them')}}"><button title="Thêm" type="button"  class="btn btn-primary"><i class="glyphicon glyphicon-plus" style="color: aliceblue"></i></button></a>
                  <a href="{{route('CDV_Export')}}" class="btn btn-sm btn-primary float-right">Export</a>
                  <a href="{{route('CDV_CNMHT')}}" class="btn btn-sm btn-primary float-right">Cập nhật mức hổ trợ</a>
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
            <th>Đơn Vị</th>
            <th>Chức vụ</th>
            <th>Loại Nhân Viên</th>
            <th>Họ Tên</th>
            <th>Ngày Sinh</th>
            <th>Giới tính</th>
            <th>Mức hổ trợ</th>
            <th>Chi Tiết</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        {{-- <div class="form-group" style="mt-6">
          <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
              @if(Session::has('alert-' . $msg))
              <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a class="close" d
              ata-dismiss="alert" aria-label="close">&times;</a></p>
              @endif
            @endforeach
        </div>
        </div> --}}
        <tbody>
            @foreach ($CongDoanVien as $key => $cdv)
            @if ($cdv->cdv_trangthai == 1)
                <tr data-expanded="true">
                    <td>{{$key + 1}}</td>
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
                <td>{{number_format($cdv->MucHoTro->mht_phihotro)}} VNĐ</td>
                <td><a  title="Chi tiết" class="glyphicon glyphicon-eye-open" href="{{route('CDV_ChiTiet',['id'=>$cdv->cdv_id])}}"></a></td>
                <td>
                  <i class='fas fa-pencil-alt'></i><a  title="Sửa" class="glyphicon glyphicon-edit" href="{{route('CDV_Sua',['id'=>$cdv->cdv_id])}}"></a>
                  <i class='fas fa-trash-alt'></i><a   title="Xóa" class="glyphicon glyphicon-trash" href="{{route('CDV_Xoa',['id'=>$cdv->cdv_id])}}" onclick="return confirm('Bạn có chắc muốn xóa không?');"></a>
                </td>
            </tr>
            @endif
          @endforeach
        </tbody>
      </table>
      <div class="panel-body">
          <div class="form-group">
            <center>{!! $CongDoanVien->links() !!}</center>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
    function timkiem(){
      document.getElementById('search').click();
    }
</script>





@endsection
