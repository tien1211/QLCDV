@extends('admin.layout.master')
@section('admin_content')
<!--main content start-->

 <div class="panel panel-default">
    <div class="panel-heading">
    Hình ảnh liên quan
    </div>
    <?php
    $message = Session::get('message');
    if($message){
        echo '<span class="text-alert">'.$message.'</span>';
        Session::put('message',null);
    }
    ?>
    <?php
    foreach($hinh as $h)
    {
        $lt_id = $h->lt_id;
    }
    ?>
    <div class="panel-body">
        <div class="position-right">
            <form class="form-inline" role="form" enctype="multipart/form-data" action="{{route('LT_ThemHinh',['id'=>$lt_id])}}" method="post" >
            {{ csrf_field() }}
            <div class="form-group">
                <a style="color: #777; font-weight: bold;">Thêm hình mới: </a>
                <input type="file" class="form-control" name="hinh[]" multiple="true">
            </div>
                <button type="submit" class="btn btn-outline-info">Thêm</button>
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
            <th>Hình ảnh liên quan</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <div class="form-group" style="mt-6">
          <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
              @if(Session::has('alert-' . $msg))
              <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="" class="close" d
              ata-dismiss="alert" aria-label="close">&times;</a></p>
              @endif
            @endforeach
        </div>
        </div>
            @foreach ($hinh as $key => $hinh)
            @if ($hinh->at_trangthai == 1)
                <tr data-expanded="true">
                    <td>{{$key + 1}}</td>
                    <td><img src="upload/tour/{{$hinh->at_hinhanh}}" width="200px" height="100px"></td>
                    <td>
                        <i class='fas fa-trash-alt'></i><a href="{{route('LT_XoaHinh',['id'=>$hinh->at_id])}} ">Xóa</a>
                    </td>
                </tr>
            @endif
          @endforeach
        </tbody>
    </div>
  </div>
 </div>



@endsection
