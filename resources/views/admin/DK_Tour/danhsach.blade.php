{{-- @extends('admin.layout.master')
@section('admin_content') --}}
<!--main content start-->

 {{-- <div class="panel panel-default">
    <div class="panel-heading">
    Danh Sách Đăng Ký Tour
    </div> --}}
      <?php
    $message = Session::get('message');
    if($message){
      echo '<span class="text-alert">'.$message.'</span>';
      Session::put('message',null);
    }
    ?>
    {{-- <div class="panel-body">
        <div class="position-right">
            <form class="form-inline" role="form" action="{{route('TOUR_Timkiem')}}" method="get">
            {{ csrf_field() }} --}}
            {{-- <div class="form-group">
              Từ ngày:
              <input class="form-control "  name="tour_ngaybd" type="date" value="{{$ngaybd}}">
            </div>
            <div class="form-group">
              Đến:
              <input class="form-control "  name="tour_ngaykt" type="date" value="{{$ngaykt}}">
            </div> --}}
            {{-- <div class="form-group">
              <select class="form-control m-bot15" name="gd_id">
                <option value="">Chọn giai đoạn ...</option>
                @foreach ($GiaiDoan as $gd)
                @if($gd->gd_id == $gd_id)
                <option selected value='{{$gd->gd_id}}'>{{$gd->giai_doan}}</option>
                @else
                <option value='{{$gd->gd_id}}'>{{$gd->giai_doan}}</option>
                @endif
                @endforeach
              </select>
            </div> --}}
              {{-- <button type="submit" class="btn btn-outline-info">Tìm kiếm</button>
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
            <th data-breakpoints="xs">Mã Đăng ký</th>
            <th>Công Đoàn Viên</th>
            <th>Đăng Ký Tour</th>

          </tr>
        </thead>
            @foreach ($DK_Tour as $dk)
                <tr data-expanded="true">
                    <td>{{$dk->dkt_id}}</td>
                    <td>{{$dk->CongDoanVien->cdv_ten}}</td>
                    <td>{{$dk->Tour->LichTrinh->lt_ten}} {{date('Y ',strtotime($dk->Tour->tour_handk))}}</td>

                    <td> --}}
                       {{-- <i class='fas fa-pencil-alt'></i><a  href="{{route('TOUR_Sua',['id'=>$t->tour_id])}}">Sửa</a>
                        <i class='fas fa-trash-alt'></i><a href="{{route('TOUR_Xoa',['id'=>$t->tour_id])}}">Xóa</a> --}}
                        {{-- <a href="{{route('chitietdd',['id'=>$u->dd_id])}}"><button type="button" class="btn btn-success">Chi Tiết</ --}}
                      {{-- </td>
                </tr>
          @endforeach
        </tbody>
    </div>
  </div>
</div>



@endsection --}}
