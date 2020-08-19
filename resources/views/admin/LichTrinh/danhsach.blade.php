@extends('admin.layout.master')
@section('admin_content')
<!--main content start-->
{{-- <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" d
    ata-dismiss="alert" aria-label="close">&times;</a></p>
    @endif
    @endforeach
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
  <div class="panel-heading">
    Danh Sách Lịch Trình
  </div>
  <div class="panel-body">
    <div class="position-left">
        <form class="form-inline" role="form" action="{{route('LT_Timkiem')}}" method="get">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" class="form-control" id="tukhoa" placeholder="từ khóa tìm kiếm" name="tukhoa" style="font-size: 45px;">
        </div>
        <button type="submit" class="btn btn-primary" id="search"><i class=" glyphicon glyphicon-search" style="color: aliceblue"></i></button>
        <a href="{{route('LT_Them')}}"><button title="Thêm" type="button"  class="btn btn-primary"><i class="glyphicon glyphicon-plus" style="color: aliceblue" ></i></button></a>
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
            <th>Lịch Trình Tên</th>
            <th>Lịch Trình File</th>
            <th>Hình Ảnh Liên Quan</th>
            <th>Thao Tác</th>
          </tr>
        </thead>
          @foreach ($LichTrinh as $key => $lt)
                <tr data-expanded="true">
                    <td>{{$key + 1}}</td>
                    <td>{{$lt->lt_ten}}</td>
                    <td><a href="{{url('upload/lichtrinh/'.$lt->lt_file)}}">{{$lt->lt_file}}</a></td>
                    <td><a href="{{route('LT_HinhAnh',['id'=>$lt->lt_id])}}"><button title="Danh Sách Hình" type="button" class="btn btn-outline-info">danh sách hình</button></a></td>
                    <td>
                        <a class="glyphicon glyphicon-edit" title="Sửa" href="{{route('LT_Sua',['id'=>$lt->lt_id])}}"></a>
                        <a class="glyphicon glyphicon-trash" title="Xóa" href="{{route('LT_Xoa',['id'=>$lt->lt_id])}} "></a>
                    </td>
                </tr>
          @endforeach
        </tbody>
    </div>
  </div>
</div>
@endsection
