@extends('admin.layout.master')
@section('admin_content')
<!--main content start-->



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
    <div class="panel-heading">
    Danh Sách Tour
    </div>

    <div class="panel-body">
        <div class="position-left">
            <form class="form-inline" role="form" action="{{route('TOUR_Timkiem')}}" method="get">
            {{ csrf_field() }}
            <div class="form-group">
              <select onchange="timkiem()" class="form-control m-bot15" name="lt_id">
                <option value="">Chọn lịch trình...</option>
                @foreach ($LichTrinh as $lt)
                  @if ($lt->lt_trangthai == 1)
                    @if($lt->lt_id == $lt_id)
                    <option selected value='{{$lt->lt_id}}'>{{$lt->lt_ten}}</option>
                    @else
                    <option value='{{$lt->lt_id}}'>{{$lt->lt_ten}}</option>
                    @endif
                  @endif
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <select onchange="timkiem()" class="form-control m-bot15" name="gd_id">
                <option value="">Chọn giai đoạn...</option>
                @foreach ($GiaiDoan as $gd)
                  @if ($gd->gd_trangthai == 1)
                    @if($gd->gd_id == $gd_id)
                    <option selected value='{{$gd->gd_id}}'>{{$gd->giai_doan}}</option>
                    @else
                    <option value='{{$gd->gd_id}}'>{{$gd->giai_doan}}</option>
                    @endif
                  @endif
                @endforeach
              </select>
            </div>
            <div class="form-group">
              Từ ngày:
              <input onchange="timkiem()" class="form-control "  name="tour_ngaybd" type="date" value="{{$ngaybd}}">
            </div>
            <div class="form-group">
              Đến:
              <input onchange="timkiem()" class="form-control "  name="tour_ngaykt" type="date" value="{{$ngaykt}}">
            </div>
            <button type="submit" class="btn btn-primary" title="Tìm" id="search"><i class=" glyphicon glyphicon-search" style="color: aliceblue" ></i></button>
            <a href="{{route('TOUR_Them')}}"><button title="Thêm" type="button"  class="btn btn-primary"><i class="glyphicon glyphicon-plus" style="color: aliceblue"></i></button></a>
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
            <th>Tour</th>
            <th>Giai Đoạn</th>
            <th>Hạn Đăng Ký</th>
            <th>Ngày Bắt Đầu</th>
            <th>Ngày Kết Thúc</th>
            <th>Chi Phí</th>
            <th>Số Lượng </th>
            <th>Đại Lý</th>
            <th>Chi Tiết </th>
            <th>Thao Tác</th>
          </tr>
        </thead>

        <tbody>

            @foreach ($Tour as $key => $t)
                <tr data-expanded="true">
                    <td>{{$key + 1}}</td>
                    <td>{{$t->LichTrinh->lt_ten}}  {{date('Y ',strtotime($t->tour_handk))}}</td>
                    <td>{{$t->GiaiDoan->giai_doan}}</td>
                    <td>{{date('d/m/Y ',strtotime($t->tour_handk))}}</td>
                    <td>{{date('d/m/Y ',strtotime($t->tour_ngaybd))}}</td>
                    <td>{{date('d/m/Y ',strtotime($t->tour_ngaykt))}}</td>
                    <td>{{number_format($t->tour_chiphi)}}</td>
                    <td>{{$t->tour_soluong}}</td>
                    <td>{{$t->tour_daily}}</td>
                    <td><a  class="glyphicon glyphicon-eye-open" title="Chi Tiết" href="{{route('TOUR_ChiTiet',['id'=>$t->tour_id])}}"></a></td>
                    <td>
                    <a  class="glyphicon glyphicon-edit" title="Sửa" href="{{route('TOUR_Sua',['id'=>$t->tour_id])}}"></a>
                    <a  class="glyphicon glyphicon-trash" title="Xóa" href="{{route('TOUR_Xoa',['id'=>$t->tour_id])}}" onclick="return confirm('Bạn có chắc muốn xóa không?');"></a>
                    </td>
                </tr>
          @endforeach
        </tbody>

      </table>
      <center>{!!$Tour->links()!!}</center>
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
