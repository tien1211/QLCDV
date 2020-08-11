@extends('admin.layout.master')
@section('admin_content')
<div class="panel panel-default">
    <header class="panel-heading">
        Thêm Người Tham gia Tour
    </header>
    <?php
    $message = Session::get('message');
    if($message){
        echo '<span class="text-alert">'.$message.'</span>';
        Session::put('message',null);
    }
    ?>
    <div class="panel-body print-error-msg " >
        <ul></ul>
        <div class="form" id="message">
            <form class="cmxform form-horizontal" enctype="multipart/form-data" action="{{route('XLTOUR_DKT',['id'=>$tour_id])}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-3">Tên người đăng ký:</label>
                    <div class="col-lg-4">
                        <input class="form-control "  name="ttndk_ten" type="text">
                    </div>
                    <div class="col-lg-2">
                        <select class="form-control m-bot15" name="ttndk_gt">
                            <option value="">Chọn giới tính</option>
                            <option value="1">Nam</option>
                            <option value="0">Nữ</option>
                        </select>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="lastname" class="control-label col-lg-3">Tuổi:</label>
                    <div class="col-lg-4">
                        <input class="form-control" name="ttndk_tuoi" type="text">
                    </div>
                    <div class="col-lg-2">
                        <select class="form-control" name="ttndk_cv" required>
                            <option value="">Chọn quan hệ</option>
                            <option value="1">Người thân</option>
                            <option value="0">Công đoàn viên</option>
                        </select>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-3">Công đoàn viên đăng ký:</label>
                    <div class="col-lg-6">
                    <input type="text" name="cdv_ten" id="cdv_ten" class="form-control input-lg"/>
                        <div id="countryList"></div>   
                    </div>
                </div>
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-6">
                        <button class="btn btn-primary btn-submit" id="submit" type="submit">Lưu</button>
                        <button class="btn btn-default" type="button">Thoát</button>
                    </div>
                </div>
            </form>
            <br>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
    Danh sách người đăng ký tham gia
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
            <th>STT</th>
            <th>Họ và tên</th>
            <th>Giới tính</th>
            <th>Tuổi</th>
            <th>Quan hệ</th>
            <th>Công đoàn viên đăng ký</th>
            <th>Trạng thái</th>
        </tr>
        </thead> 
            @foreach ($nguoithamgia as $key => $ntg)
                <tr data-expanded="true">
                    <td>{{$key + 1}}</td>
                    <td>{{$ntg->ttndk_ten}}</td>
                    @if($ntg->ttndk_gt == 1)
                        <td>Nam</td>
                    @else
                        <td>Nữ</td>
                    @endif
                    <td>{{$ntg->ttndk_tuoi}}</td>
                    @if($ntg->ttndk_cv == 1)
                        <td>Ngươi thân</td>
                    @else
                        <td>Công đoàn viên</td>
                    @endif
                    <td>{{$ntg->cdv_ten}}</td>
                    @if($ntg->ttndk_trangthai == 1)
                        <td>Đã đăng ký</td>
                    @else
                        <td><a style="color:red">Hủy đăng ký</a></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $('#cdv_ten').keyup(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
        var query = $(this).val(); //lấy gía trị ng dùng gõ
        if(query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
        {
        var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
        $.ajax({
            url:"{{ route('search') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
            method:"POST", // phương thức gửi dữ liệu.
            data:{query:query, _token:_token},
            success:function(data){ //dữ liệu nhận về
                $('#countryList').fadeIn();  
                $('#countryList').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
            }
        });
        }
    });
    $(document).on('click', 'li', function(){  
    $('#cdv_ten').val($(this).text());  
    $('#countryList').fadeOut();  
    });  
});
</script>