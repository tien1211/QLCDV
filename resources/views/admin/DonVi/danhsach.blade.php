@extends('admin.layout.master')
@section('admin_content')
<div class="form-group" style="mt-6">


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


</div>
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 style="text-align: center; color: #32323a; display: inline-block">Công Đoàn Bưu Chính Viễn Thông Việt Nam</h4>
        </div>
        <div class="panel-body">
          <div class="position-left">
          <form class="form-inline" role="form" action="{{route('DV_Timkiem')}}" method="get">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" class="form-control" id="tukhoa" placeholder="từ khóa tìm kiếm" name="tukhoa" value="{{$tukhoa}}" style="width: 550px;">
            </div>
            <button type="submit" class="btn btn-primary" title="Tìm kiếm" id="search"><i class=" glyphicon glyphicon-search" style="color: aliceblue"></i></button>
            <a href="{{route('DV_Them')}}"><button title="Thêm" type="button"  class="btn btn-primary"><i class="glyphicon glyphicon-plus" style="color: aliceblue"></i></button></a>
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
            <th>Đơn Vị</th>
            <th>Mô Tả</th>
            <th>Trực Thuộc</th>
            <th>Chi Tiết</th>
            <th>Cập Nhật</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($DonVi as $dv)
              @if ($dv->dv_trangthai == 1)
                <tr data-expanded="true">
                    <td>{{$dv->dv_id}}</td>
                    <td>{{$dv->dv_ten}}</td>
                    <td>{{$dv->dv_mota}}</td>
                    <td>{{$dv->dv_tt}}</td>
                <td><a title="Danh Sách Công Đoàn Viên" href="{{route('CDV_DSDV',['id'=>$dv->dv_id])}}"><button type="button" class="btn btn-outline-info">Dang sách công đoàn viên</button></a></td>
                <td>
                  <a class="glyphicon glyphicon-edit"  title="Sửa" href="{{route('DV_Sua',['id'=>$dv->dv_id])}}"></a>
                  <a class="glyphicon glyphicon-trash"  title="Xóa" href="{{route('DV_Xoa',['id'=>$dv->dv_id])}}" onclick="return confirm('Bạn có chắc muốn xóa không?');"></a>
                </td>
            </tr>
            @endif
          @endforeach
        </tbody>
      </table>
    </div>
	</div>
</div>
@endsection


