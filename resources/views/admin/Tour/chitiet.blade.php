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
        </tr>
        </thead>
                <tr data-expanded="true">
                    <td>{{$tour_giaidoan}}</td>
                    <td>{{$tour_handk}}</td>
                    <td>{{$tour_ngaybd}}</td>
                    <td>{{$tour_ngaykt}}</td>
                    <td>{{$tour_chiphi}}</td>
                    <td>{{$tour_soluong}}</td>
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
            <th>Giai Đoạn</th>
            <th>Hạn đăng ký</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Chi phí</th>
            <th>Số lượng </th>
        </tr>
        </thead>
                <tr data-expanded="true">
                    <td>{{$tour_giaidoan}}</td>
                    <td>{{$tour_handk}}</td>
                    <td>{{$tour_ngaybd}}</td>
                    <td>{{$tour_ngaykt}}</td>
                    <td>{{$tour_chiphi}}</td>
                    <td>{{$tour_soluong}}</td>
                </tr>
        </tbody>
    </table>
    </div>
</div>
@endsection
