@extends('frontend.layout.master')
@section('frontend_content')
<div class="row">
    <div class="col-12">
        <!-- Section Heading -->
        <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
            <h3>Thông tin người đăng ký</h3>
        </div>
    </div>
</div>
<form class="form-inline" role="form" action="{{route('xndktour',['id'=>$tour_id])}}" method="post" >
    {{ csrf_field() }}
<div class="col-12">
    <!-- Form -->
    <div class="roberto-contact-form">
            <div class="row">
                <div class="col-12 col-lg-9 wow fadeInUp" data-wow-delay="100ms">
                    <input type="text" required name="ttndk_ten"  class="form-control mb-30" placeholder="Tên người tham gia thứ ">
                </div>
                <div class="col-12 col-lg-3 wow fadeInUp" data-wow-delay="100ms">
                    <select class="form-control" name="ttndk_gt" required>
                    <option value="">Chọn giới tính</option>
                    <option value="1">Nam</option>
                    <option value="0">Nữ</option>
                    </select>
                </div>
                <div class="col-12 col-lg-9 wow fadeInUp" data-wow-delay="100ms">
                    <input type="text" required name="ttndk_tuoi"  class="form-control mb-30" placeholder="Tuổi">
                </div>
                <div class="col-12 col-lg-3 wow fadeInUp" data-wow-delay="100ms">
                    <select class="form-control" name="ttndk_cv" required>
                    <option value="">Chọn quan hệ</option>
                    <option value="1">Người thân</option>
                    <option value="0">Công đoàn viên</option>
                    </select>
                </div>
            </div>
            @if($tour->tour_soluong == 0)
            <input style="color: red;" type="text" class="input-small form-control" value="Số lượng còn lại: {{$tour->tour_soluong}}" disabled>
            <button type="submit" disabled class="btn roberto-btn mt-15" style="float:right;">Hết chổ</button>
            @else
            <input style="color: #000000;" type="text" class="input-small form-control" value="Số lượng còn lại: {{$tour->tour_soluong}}" disabled>
            <button type="submit" class="btn roberto-btn mt-15" style="float:right;">Ghi danh</button>
            @endif
            </form>
            <button class="btn roberto-btn mt-15" href="{{route('chitiettour',['id'=>$tour_id])}}">Quay lại</button>
    </div>
</div>
@if(count($nguoithamgia) == 0)
<div class="row">
    <div class="col-12">
        <!-- Section Heading -->
        <div class="section-heading text-center wow fadeInUp" style="margin-top: 30px;" data-wow-delay="100ms">
            <h3>Bạn chưa đăng ký người tham gia</h3>
        </div>
    </div>
</div>
@else
<div class="row">
    <div class="col-12">
        <!-- Section Heading -->
        <div class="section-heading text-center wow fadeInUp" style="margin-top: 30px;" data-wow-delay="100ms">
            <h3>Danh sách người đã đăng ký</h3>
        </div>
    </div>
</div>
<div class="room-service mb-50">
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>STT</th>
                <th>Người tham gia</th>
                <th>Công đoàn viên đăng ký</th>
                <th>Giới tính</th>
                <th>Tuổi</th>
                <th>Quan hệ</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($nguoithamgia as $key => $dk)
            <tr>
            <td>{{$key + 1}}</td>
            <td>{{$dk->ttndk_ten}}</td>
            <td>{{$dk->cdv_ten}}</td>
            @if($dk->ttndk_gt == 1)
            <td>Nam</td>
            @else
            <td>Nữ</td>
            @endif
            <td>{{$dk->ttndk_tuoi}}</td>
            @if($dk->ttndk_cv == 1)
            <td>Ngươi thân</td>
            @else
            <td>Công đoàn viên</td>
            @endif
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endif
@endsection