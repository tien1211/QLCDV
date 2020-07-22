@extends('admin.layout.master')
@section('admin_content')
<!--main content start-->
<?php
    foreach($chitietTour as $ctt){
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
        <thead>
        <tr>
            <th>Giai Đoạn</th>
            <th>Hạn đăng ký</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Chi phí</th>
            <th>Số lượng </th>
            <th>Hình ảnh </th>
        </tr>
        </thead>
                <tr data-expanded="true">
                    <td>{{$tour_giaidoan}}</td>
                    <td>{{date('d/m/Y ',strtotime($tour_handk))}}</td>
                    <td>{{date('d/m/Y ',strtotime($tour_ngaybd))}}</td>
                    <td>{{date('d/m/Y ',strtotime($tour_ngaykt))}}</td>
                    <td>{{number_format($tour_chiphi)}} VNĐ</td>
                    <td>{{$tour_soluong}}</td>
                    <td><img src="upload/tour/{{$tour_hinhanh}}" alt="" style="width:10rem; height:5rem"></td>
                </tr>
        </tbody>
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
            <th>Họ và tên</th>
            <th>Số lượng người tham gia</th>
            <th>Chi phí phải trả</th>
            <th>Tình trạng thu phí</th>
            <th>Thông tin chi tiết</th>
        </tr>
        </thead>
            @foreach ($cdv_dk as $cdv)
                <tr data-expanded="true">
                    <td>{{$cdv->cdv_ten}}</td>
                    <td>{{$cdv->dkt_soluong}}</td>
                    <td>{{number_format($cdv->dkt_soluong*$cdv->tour_chiphi)}} VNĐ</td>
                    <td>{{$cdv->tinh_trang}}</td>
                    <td><a href="{{route('CDV_ChiTiet',['id'=>$cdv->cdv_id])}}"><button type="button" class="btn btn-outline-info">Chi Tiết</button></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection
