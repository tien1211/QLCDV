@extends('frontend.layout.master')
@section('frontend_content')
<div class="col-12">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} </p>
        @endif
    @endforeach
</div>
@if(count($tourdk) == 0)
    <h2>Bạn Chưa Đăng Ký Tour Nào...!!!</h2><hr>
@else
<div class="room-service mb-50">
    <h2>Danh Sách Tour Đã Đăng Ký</h2><hr>
    {{-- {{$ifo1}} --}}
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>STT</th>
                <th>Tên Tour</th>
                <th>Chi Phí</th>
                <th>Trạng Thái</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tourdk as $key => $tour)
            <tr>
            <td>{{$key + 1}}</td>
            <td><u><a style="color: steelblue" href="{{route('chitiettour',['id'=>$tour->tour_id])}}">{{$tour->lt_ten}} {{date('Y ',strtotime($tour->tour_handk))}}</a></u></td>
            <td>{{number_format($tour->tour_chiphi * $tour->dkt_soluong)}} VNĐ</td>
            <td>
                @if($now > $tour->tour_handk)
                <a style="color:red">Hết hạn</a>
                </td>
                <td>
                    <a href="{{route('DS_NTG',['id'=>$tour->tour_id])}}" title="Chi tiết" class="post-author"><li class="fas fa-list" style="font-size: 20px"></li></a>&nbsp;&nbsp;&nbsp;
                </td>
                @else
                Còn hạn
                </td>
                <td>
                    <a href="{{route('DS_NTG',['id'=>$tour->tour_id])}}" title="Chi tiết" class="post-author"><li class="fas fa-list" style="font-size: 20px"></li></a>&nbsp;&nbsp;&nbsp;
                    <a href="{{route('HUY_TOUR',['id'=>$tour->dkt_id])}}" title="Xóa" class="post-author" onclick="return confirm('Bạn có chắc muốn xóa không?');"><li class="fas fa-trash-alt" style="font-size: 20px;"></li></a>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
@endsection