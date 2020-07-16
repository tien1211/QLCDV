@extends('admin.layout.master')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 style="text-align: center; color: #32323a; display: inline-block">Công Đoàn Bưu Chính Viễn Thông Việt Nam</h4>
        </div>
        <?php 
          $message = Session::get('message');
          if($message){
              echo '<span class="text-alert">'.$message.'</span>';
              Session::put('message',null);
          }
          ?>
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
            <th>Đơn vị</th>
            <th>Mô tả</th>
            <th>Trực thuộc</th>
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
                <td><a href=""><button type="button" class="btn btn-outline-info">Dang sách công đoàn viên</button></a></td>
                <td>
                  <i class='fas fa-pencil-alt'></i><a href="{{route('DV_Sua',['id'=>$dv->dv_id])}}">Sửa</a>
                  <i class='fas fa-trash-alt'></i><a href="{{route('DV_Xoa',['id'=>$dv->dv_id])}}" onclick="return confirm('Bạn có chắc muốn xóa không?');">Xóa</a>
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