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
                    <input type="text" name="ttndk_ten"  class="form-control mb-30" placeholder="Tên người tham gia" required>
                </div>
                <div class="col-12 col-lg-3 wow fadeInUp" data-wow-delay="100ms" style="color: black">
                <select class="form-control" name="ttndk_gt">
                    <option value="">Chọn giới tính</option>
                    <option value="1">Nam</option>
                    <option value="0">Nữ</option>
                    </select>
                    @if($errors->has('ttndk_gt'))
                        <div style="color:red">{{ $errors->first('ttndk_gt')}}</div>
                    @endif
                </div>
                <div class="col-12 col-lg-9 wow fadeInUp" data-wow-delay="100ms">
                    <input type="number" required name="ttndk_tuoi" min="1"  class="form-control mb-30" placeholder="Tuổi">
                </div>
                <div class="col-12 col-lg-3 wow fadeInUp" data-wow-delay="100ms" style="color: #000000;">
                    <select class="form-control" name="ttndk_cv">
                    <option value="">Chọn quan hệ</option>
                    <option value="1">Người thân</option>
                    <option value="0">Công đoàn viên</option>
                    </select>
                    @if($errors->has('ttndk_cv'))
                        <div style="color:red">{{ $errors->first('ttndk_cv')}}</div>
                    @endif
                </div>
            </div>
            @if($tour->tour_soluong <= 0)
            <input style="color: red;" type="text" class="input-small form-control" value="Số lượng còn lại: {{$tour->tour_soluong}}" disabled>
            <button disabled class="btn roberto-btn mt-15" style="margin-left: 390px;">Hết chổ</button>
            <a href="{{route('chitiettour',['id'=>$tour_id])}}" class="btn roberto-btn mt-15"  >Quay lại</a>
            @else
            <input style="color: #000000;" type="text" class="input-small form-control" value="Số lượng còn lại: {{$tour->tour_soluong}}" disabled>
            <button type="submit" class="btn roberto-btn mt-15" onclick="return confirm('Bạn có muốn đăng ký không??')" style="margin-left: 390px;">Ghi danh</button>
            <a href="{{route('DS_NTG',['id'=>$tour_id])}}" class="btn roberto-btn mt-15"  >Quay lại</a>
            @endif
            </form>
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
        {{-- <a href="{{route('export_ttndk',['id'=>$id])}}" title="Export Danh Sách CĐV" class="btn btn-sm btn-primary float-right">Export</a> --}}
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
