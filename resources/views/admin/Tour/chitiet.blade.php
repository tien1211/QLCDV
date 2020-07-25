@extends('admin.layout.master')
@section('admin_content')
<!--main content start-->
<?php
    foreach($chitietTour as $ctt){
        $tour_id = $ctt->tour_id;
        $tour_ten = $ctt->lt_ten;
        $tour_handk = $ctt->tour_handk;
        $tour_giaidoan = $ctt->giai_doan;
        $tour_ngaybd = $ctt->tour_ngaybd;
        $tour_ngaykt = $ctt->tour_ngaykt;
        $tour_chiphi = $ctt->tour_chiphi;
        $tour_soluong = $ctt->tour_soluong;
        $tour_hinhanh = $ctt->tour_hinhanh;
    }
?>
<div class="panel panel-default">
    <div class="panel-heading">
    Thông Tin Tour {{$tour_ten}}  {{date('Y ',strtotime($tour_handk))}}
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
        <tr>
            <td><a style="color: #777; font-weight: bolder;">Giai đoạn: </a>{{$tour_giaidoan}}</td>
            <td><a style="color: #777; font-weight: bolder;">Hạn đăng ký: </a>{{date('d/m/Y ',strtotime($tour_handk))}}</td>
            <td><a style="color: #777; font-weight: bolder;">Ngày bắt đầu: </a>{{date('d/m/Y ',strtotime($tour_ngaybd))}}</td>
            <td><a style="color: #777; font-weight: bolder;">Ngày kết thúc: </a>{{date('d/m/Y ',strtotime($tour_ngaykt))}}</td>
            <td><a style="color: #777; font-weight: bolder;">Chi phí: </a>{{number_format($tour_chiphi)}} VNĐ</td>
            <td><a style="color: #777; font-weight: bolder;">Số lượng: </a>{{$tour_soluong}}</td>
        </tr>
        <tr>
            <td colspan="6"><img src="upload/tour/{{$tour_hinhanh}}" width="100%" height="500px"></td>
        </tr>
    </table>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
    Danh sách tham gia
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
            <th>Số lượng người tham gia</th>
            <th>Chi phí phải trả</th>
            <th>Tình trạng thu phí</th>
            <th>Cập nhật thu phí</th>
        </tr>
        </thead> 
            @foreach ($cdv_dk as $key => $cdv)
                <form class="form-inline" role="form" action="{{route('TOUR_XLThuPhi',['id'=>$tour_id])}}" method="post">
                    {{ csrf_field() }}
                <tr data-expanded="true">
                    <td>{{$key + 1}}</td>
                    <td>{{$cdv->cdv_ten}}</td>
                    <td>{{$cdv->dkt_soluong}}</td>
                    <td>{{number_format($cdv->dkt_soluong*$cdv->tour_chiphi)}} VNĐ</td>
                    <td>
                    <input type="hidden" value="{{$cdv->cdv_id}}" name="cdv_id">
                    <select class="form-control m-bot15" name="tttp_id">
                        @foreach($TinhTrangThuPhi as $tp)
                        @if($cdv->tttp_id == $tp->tttp_id)
                        <option selected value='{{$tp->tttp_id}}'>{{$tp->tinh_trang}}</option>
                        @else
                        <option value='{{$tp->tttp_id}}'>{{$tp->tinh_trang}}</option>
                        @endif
                        @endforeach
                    </select>
                    </td>
                    <td><a><button type="submit" class="btn btn-outline-info">Cập nhật</button></a></td>
                </tr>
                </form>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection
