@extends('frontend.layout.master')
@section('frontend_content')
<div class="room-service mb-50">
    <h4>Danh Sách Tour đã đăng ký</h4>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>STT</th>
                <th>Tên tour</th>
                <th>Giai đoạn</th>
                <th>Chi phí</th>
                <th>Người tham gia</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tourdk as $key => $tour)
            <tr>
            <td>{{$key + 1}}</td>
            <td>{{$tour->lt_ten}} {{date('Y ',strtotime($tour->tour_handk))}}</td>
            <td>{{$tour->giai_doan}}</td>
            <td>{{$tour->tour_chiphi}}</td>
            <td><a href="{{route('DS_NTG',['id'=>$tour->tour_id])}}" class="post-author">Chi tiết</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection