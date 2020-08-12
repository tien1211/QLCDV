@extends('frontend.layout.master')
@section('frontend_content')
<div class="room-service mb-50">
    
    <h2>Danh Sách Tour đã hết hạn</h2><hr>

    {{-- {{$ifo1}} --}}
    <table class="table" >
        <thead class="thead-light">
            <tr>
                <th>STT</th>
                <th>Tên tour</th>
                <th>Giai đoạn</th>
                <th>Hạn đăng ký</th>
                <th>Chi phí</th>
                <th>Chi tiết</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deadline as $key => $tour)

            <tr>
            <td>{{$key + 1}}</td>
            <td>{{$tour->lt_ten}} {{date('Y ',strtotime($tour->tour_handk))}}</td>
            <td>{{$tour->giai_doan}}</td>
            <td>{{date('d-m-Y ',strtotime($tour->tour_handk))}}</td>
            <td>{{number_format($tour->tour_chiphi)}} VND</td>
            <td><a href="{{route('chitiettour',['id'=>$tour->tour_id])}}" class="post-author"><button  type="button" class="btn btn-info " style="width: 90px;" >Chi tiết</button> </a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



@endsection
