@extends('admin.layout.master')
@section('admin_content')
<!--main content start-->
{{-- message errorr --}}
<div class="form-group" style="mt-6">
    <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
            <script>
                window.onload = function(){
                    alert('{{Session::get('alert-' . $msg)}}');
                }
            </script>
        @endif
    @endforeach
</div>
</div>
{{-- message errorr --}}



<div class="panel panel-default">
    <div class="panel-heading">
    Hình ảnh liên quan
    </div>
    <div class="panel-body">
        <div class="position-left">
            <form class="form-inline" role="form" enctype="multipart/form-data" action="{{route('Tour_ThemHinh',['id'=>$tour_id])}}" method="post" >
            {{ csrf_field() }}
            <div class="form-group">
                <a style="color: #777; font-weight: bold;">Thêm hình mới: </a>
                <input type="file" class="form-control" name="hinh[]" multiple="true">
            </div>
                <button type="submit" onclick="return confirm('Bạn có thật sự muốn thêm không??')" class="btn btn-outline-info"><i class="glyphicon glyphicon-plus"></i></button>
            </form>
        </div>
    </div>
    <div>
    <form class="form-inline" role="form" enctype="multipart/form-data" action="{{route('Tour_XoaHinh')}}" method="get" >
            {{ csrf_field() }}
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
            <th>Hình ảnh liên quan</th>
            <th><input type="checkbox" id="checkall" onClick="check()" /></th>
          </tr>
        </thead>
        <tbody>
              @foreach ($hinh as $key => $hinh)
                  <tr data-expanded="true">
                      <td>{{$key + 1}}</td>
                      <td><img src="upload/tour/{{$hinh->at_hinhanh}}" width="200px" height="100px"></td>
                      <td><input type="checkbox" name="at_id[]" value="{{$hinh->at_id}}"/></td>
                  </tr>
              @endforeach
        </tbody>
      </table>
      <div class="panel-body">
        <div class="position-right">
          <button type="submit" onclick="return confirm('Bạn có thật sự muốn xóa không??')" class="btn btn-outline-info"><i class=" glyphicon glyphicon-trash"></i></button>
        </div>
      </div>
    </from>
  </div>
</div>
<script>
  function check(){
      checkboxes = document.getElementsByName('at_id[]');
      var t = document.getElementById('checkall').checked;
      for(var i=0, n=checkboxes.length;i<n;i++) {
        checkboxes[i].checked = t;
      }
    }
  </script>
@endsection
