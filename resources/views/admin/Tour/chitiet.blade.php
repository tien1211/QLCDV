@extends('admin.layout.master')
@section('admin_content')
<div class="form-group" style="mt-6">
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a class="close" d
            ata-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
    Thông Tin Tour {{$chitietTour->lt_ten}}  {{date('Y ',strtotime($chitietTour->tour_handk))}}
    </div>
    <table style="width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
    margin-left: 20px;
    border-collapse: collapse;">
        <tr>
            <td><a style="color: #999; font-weight: bolder;">Giai đoạn: </a><a style="color: #999;">{{$chitietTour->giai_doan}}</a></td>
            <td><a style="color: #999; font-weight: bolder;">Hạn đăng ký: </a><a style="color: #999;">{{date('d/m/Y ',strtotime($chitietTour->tour_handk))}}</a></td>
            <td rowspan="4"><div style="margin:12px;"><img src="upload/tour/{{$chitietTour->tour_hinhanh}}" width="500px" height="230px"></div></td>
        </tr>
        <tr>
            <td><a style="color: #999; font-weight: bolder;">Bắt đầu: </a><a style="color: #999;">{{date('d/m/Y ',strtotime($chitietTour->tour_ngaybd))}}</a></td>
            <td><a style="color: #999; font-weight: bolder;">Kết thúc: </a><a style="color: #999;">{{date('d/m/Y ',strtotime($chitietTour->tour_ngaykt))}}</a></td>
        </tr>
        <tr>
            <td><a style="color: #999; font-weight: bolder;">Chi phí: </a><a style="color: #999;">{{number_format($chitietTour->tour_chiphi)}} VNĐ</a></td>
            <td><a style="color: #999; font-weight: bolder;">Số lượng: </a><a style="color: #999;">{{$chitietTour->tour_soluong}}</a></td>
        </tr>
        <tr>
            <td colspan="2">
            <a href="{{route('TOUR_DKT',['id'=>$chitietTour->tour_id])}}"><button type="button"  class="btn btn-outline-info" style="width: 100%">Thêm người tham gia</button></a>
            </td>
        </tr>
    </table>
</div>
@if(count($cdv_dk) == 0)
<div class="panel panel-default">
    <div class="panel-heading">
        Chưa có công đoàn viên đăng ký
    </div>
</div>
@else
<div class="panel panel-default">
    <div class="panel-heading">
    Danh sách Công đoàn viên đăng ký
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
        <tr>
            <th>STT</th>
            <th>Họ và tên</th>
            <th>Số lượng đã đăng ký</th>
            <th>Chi phí</th>
            <th>Mức Hổ Trợ</th>
        </tr>
        </thead>
            @foreach ($cdv_dk as $key => $cdv)
                <tr data-expanded="true">
                    <td>{{$key + 1}}</td>
                    <td>{{$cdv->cdv_ten}}</td>
                    <td>{{$cdv->dkt_soluong}}</td>
                    <td>{{number_format($cdv->dkt_soluong*$cdv->tour_chiphi)}} VNĐ</td>
                    <td>{{number_format($cdv->phihotro)}} VNĐ</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endif
@if(count($nguoithamgia) == 0)
<div class="panel-heading">
   CHƯA CÓ NGƯỜI ĐĂNG KÝ
    </div>
@else
<div class="panel panel-default">
    <div class="panel-heading">
    Danh sách người đã đăng ký tham gia
    </div>
    <div>
    <form class="form-inline" role="form" enctype="multipart/form-data" action="{{route('XLTOUR_XNDK',['id'=>$tour_id])}}" method="post" >
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
                <th>STT</th>
                <th>Họ và tên</th>
                <th>Giới tính</th>
                <th>Tuổi</th>
                <th>Quan hệ</th>
                <th>Công đoàn viên đăng ký</th>
                <th>Trạng thái</th>
                <th><input type="checkbox" id="checkall" onClick="check()" /></th>
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
                            <td><input type="checkbox" name="ttndk_id[]" value="{{$ntg->ttndk_id}}"/></td>
                        @else
                            <td><a style="color:red">Hủy đăng ký</a></td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
<div class="panel-body">
    <div class="position-right">
        <a><button type="submit" class="btn btn-outline-info">Hủy đăng ký</button></a>
    </div>
</div>
    </from>
@endif

<script>
function check(){
    checkboxes = document.getElementsByName('ttndk_id[]');
    var t = document.getElementById('checkall').checked;
    for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = t;
    }
}
</script>
@endsection
