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
    <table style="width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
    margin-left: 20px;
    border-collapse: collapse;">
        <tr>
            <td><a style="color: #999; font-weight: bolder;">Giai đoạn: </a><a style="color: #999;">{{$tour_giaidoan}}</a></td>
            <td><a style="color: #999; font-weight: bolder;">Hạn đăng ký: </a><a style="color: #999;">{{date('d/m/Y ',strtotime($tour_handk))}}</a></td>
            <td rowspan="3"><div style="margin:12px;"><img src="upload/tour/{{$tour_hinhanh}}" width="500px" height="230px"></div></td>
        </tr>
        <tr>
            <td><a style="color: #999; font-weight: bolder;">Bắt đầu: </a><a style="color: #999;">{{date('d/m/Y ',strtotime($tour_ngaybd))}}</a></td>
            <td><a style="color: #999; font-weight: bolder;">Kết thúc: </a><a style="color: #999;">{{date('d/m/Y ',strtotime($tour_ngaykt))}}</a></td>
        </tr>
        <tr>
            <td><a style="color: #999; font-weight: bolder;">Chi phí: </a><a style="color: #999;">{{number_format($tour_chiphi)}} VNĐ</a></td>
            <td><a style="color: #999; font-weight: bolder;">Số lượng: </a><a style="color: #999;">{{$tour_soluong}}</a></td>
        </tr>
    </table>
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
            <th>Cập nhật thu phí
            </th>
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
