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
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tourdk as $key => $tour)
            <tr>
            <td>{{$key + 1}}</td>
            <td>{{$tour->lt_ten}} {{date('Y ',strtotime($tour->tour_handk))}}</td>
            <td>{{$tour->giai_doan}}</td>
            <td>{{$tour->tour_chiphi}}</td>
<<<<<<< HEAD
            <td><a href="{{route('DS_NTG',['id'=>$tour->tour_id])}}" class="post-author"><li class="fas fa-list" title="Danh Sách Người Đăng Ký" style="font-size: 20px"></li></a>&nbsp;&nbsp;&nbsp;
                <a href="{{route('DS_NTG',['id'=>$tour->tour_id])}}" class="post-author"><li class="fas fa-trash-alt" title="Hủy Đăng Ký" style="font-size: 20px;"></li></a>
=======
            <td><a href="{{route('DS_NTG',['id'=>$tour->tour_id])}}" class="post-author"><li class="fas fa-list" style="font-size: 20px"></li></a>&nbsp;&nbsp;&nbsp;
                <a href="{{route('huytour',['id'=>$tour->tour_id])}}" class="post-author"><li class="fas fa-trash-alt" style="font-size: 20px;"></li></a>
>>>>>>> bc9075cfc2a3d91d7552e6df2cd27bdf5c366908
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection