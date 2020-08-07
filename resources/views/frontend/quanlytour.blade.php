@extends('frontend.layout.master')
@section('frontend_content')
<div class="col-12">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} </p>
        @endif
    @endforeach
</div>
<div class="row">
    <div class="col-12">
        <!-- Section Heading -->
        <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
            <h3>Các Tour bạn đã đăng ký</h3>
        </div>
    </div>
</div>
<div class="room-service mb-50">
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>STT</th>
                <th>Tên tour</th>
                <th>Giai đoạn</th>
                <th>Chi phí</th>
                <th>Trạng thái</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tourdk as $key => $tour)
            <tr>
            <td>{{$key + 1}}</td>
            <td><a href="{{route('chitiettour',['id'=>$tour->tour_id])}}">{{$tour->lt_ten}} {{date('Y ',strtotime($tour->tour_handk))}}</a></td>
            <td>{{$tour->giai_doan}}</td>
            <td>{{$tour->tour_chiphi}}</td>
            <td>
                @if($now > $tour->tour_handk)
                Hết hạn
                @else
                Đang diễn ra
                @endif
            </td>
            <td>
                <a href="{{route('DS_NTG',['id'=>$tour->tour_id])}}" class="post-author"><li class="fas fa-list" style="font-size: 20px"></li></a>&nbsp;&nbsp;&nbsp;
                <a href="{{route('HUY_TOUR',['id'=>$tour->dkt_id])}}" class="post-author"><li class="fas fa-trash-alt" style="font-size: 20px;"></li></a>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection