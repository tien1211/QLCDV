@extends('admin.layout.master')
@section('admin_content')
<!--main content start-->

@if(session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>

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
                @if($lt->lt_id == $lt_id)
                <option selected value='{{$lt->lt_id}}'>{{$lt->lt_ten}}</option>
                @else
                <option value='{{$lt->lt_id}}'>{{$lt->lt_ten}}</option>
                @endif
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <select onchange="timkiem()" class="form-control m-bot15" name="gd_id">
                <option value="">Chọn giai đoạn...</option>
                @foreach ($GiaiDoan as $gd)
                @if($gd->gd_id == $gd_id)
                <option selected value='{{$gd->gd_id}}'>{{$gd->giai_doan}}</option>
                @else
                <option value='{{$gd->gd_id}}'>{{$gd->giai_doan}}</option>
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
            <button type="submit" class="btn btn-outline-info" id="search"><i class=" glyphicon glyphicon-search"></i></button>
            <a href="{{route('TOUR_Them')}}"><button type="button"  class="btn btn-outline-info"><i class="glyphicon glyphicon-plus"></i></button></a>
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
        @extends('admin.layout.partials.complete-message')
        <thead>
          <tr>
            <th data-breakpoints="xs">STT</th>
            <th>Tour</th>
            <th>Giai Đoạn</th>
            <th>Hạn đăng ký</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Chi phí</th>
            <th>Số lượng </th>
            <th>Đại lý</th>
            <th>Chi tiết </th>
            <th>Thao tác</th>
          </tr>
        </thead>
            @foreach ($Tour as $key => $t)
            @if ($t->tour_trangthai == 1)
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
                    {{-- <td>{{$t->tour_hinhanh}}</td> --}}
                    <td><a class="glyphicon glyphicon-eye-open" href="{{route('TOUR_ChiTiet',['id'=>$t->tour_id])}}"></a></td>
                    <td>
                      <a class="glyphicon glyphicon-edit"  href="{{route('TOUR_Sua',['id'=>$t->tour_id])}}"></a>
                      <a class="glyphicon glyphicon-trash" href="{{route('TOUR_Xoa',['id'=>$t->tour_id])}}"></a>
                      </td>
                </tr>
            @endif
          @endforeach
        </tbody>
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
