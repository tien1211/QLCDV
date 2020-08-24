@extends('frontend.layout.master')
@section('frontend_content')
<div class="col-12">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} </p>
        @endif
    @endforeach
</div>
<div class="col-12">
@if($errors->has('ttndk_id'))
    <p class="alert alert-danger">{{ $errors->first('ttndk_id')}}</p>
@endif
</div>
<div class="row">
    <div class="col-12">
        <!-- Section Heading -->
        <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
            <h3>Danh Sách người bạn đã đăng ký tour</h3>
            <h3>{{$tour->lt_ten}} {{date('Y ',strtotime($tour->tour_handk))}}</h3>
        </div>
    </div>
</div>
<div class="room-service mb-50" style="margin-bottom: 10px;">
    <form class="form-inline" role="form" enctype="multipart/form-data" action="{{route('XL_XNTTDK',['id'=>$tour->tour_id])}}" method="post" >
        {{ csrf_field() }}
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>STT</th>
                <th>Tên Người Tham Gia</th>
                <th>Giới Tính</th>
                <th>Tuổi</th>
                <th>Quan Hệ</th>
                <th><input type="checkbox" id="checkall" onClick="check()" /></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nguoithamgia as $key => $ntg)
            <tr>
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
            <td><input type="checkbox" name="ttndk_id[]" value="{{$ntg->ttndk_id}}"/></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@if ($now > $tour->tour_handk)
    <button type="submit" disabled class="btn roberto-btn mt-15" style="margin-left: 360px;" >Tour đã diễn ra</button>
    <a href="{{route('quanlytour')}}" class="btn roberto-btn mt-15"  >Quay lại</a>
@else
    <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa?');" class="btn roberto-btn mt-15" style="margin-left: 390px;">Hủy đăng ký</button>
    <a href="{{route('quanlytour')}}" class="btn roberto-btn mt-15"  >Quay lại</a>
@endif
<a href="{{route('export_ttndk')}}" title="Export Danh Sách CĐV" class="btn btn-sm btn-primary float-right">Export</a>
</form>
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