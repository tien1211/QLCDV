@extends('frontend.layout.master')
@section('frontend_content')
<div class="room-service mb-50">
    <h4>Danh Sách người tham gia tour {{$tour->lt_ten}} {{date('Y ',strtotime($tour->tour_handk))}}</h4>
    <form class="form-inline" role="form" enctype="multipart/form-data" action="{{route('XL_XNTTDK',['id'=>$tour->tour_id])}}" method="post" >
        {{ csrf_field() }}
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>STT</th>
                <th>Tên người tham gia</th>
                <th>Giới tính</th>
                <th>CMND</th>
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
            <td>{{$ntg->ttndk_cmnd}}</td>
            <td><input type="checkbox" name="ttndk_id[]" value="{{$ntg->ttndk_id}}"/></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@if ($now > $tour->tour_handk)
<div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms">
    <button type="submit" disabled onclick="return confirm('Bạn có chắc muốn xóa?');" class="btn roberto-btn mt-15">Tour đã diễn ra</button>
</div>
@else
<div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms">
    <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa?');" class="btn roberto-btn mt-15">Xóa</button>
</div>
@endif
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