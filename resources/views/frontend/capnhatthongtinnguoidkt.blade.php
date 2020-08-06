@extends('frontend.layout.master')
@section('frontend_content')
<div class="row">
    <div class="col-12">
        <!-- Section Heading -->
        <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
            <h3>Thông tin người tham gia</h3>
        </div>
    </div>
</div>
<form class="form-inline" role="form" action="{{route('XL_CNTTDK',['id'=>$tour_id])}}" method="post" >
    {{ csrf_field() }}
    <input type="hidden" name="dkt_soluong" value="{{$soluong}}">
@for($i = 0 ; $i < $soluong; $i++)
<div class="row">
    <div class="col-12">
        <!-- Form -->
        <div class="roberto-contact-form">
                <div class="row">
                    <div class="col-12 col-lg-9 wow fadeInUp" data-wow-delay="100ms">
                        <input type="text" required name="ttndk_ten[{{$i}}]"  class="form-control mb-30" placeholder="Tên người tham gia thứ {{$i + 1}}">
                    </div>
                    <div class="col-12 col-lg-3 wow fadeInUp" data-wow-delay="100ms">
                        <select class="form-control" name="ttndk_gt[{{$i}}]" required>
                        <option value="">Chọn giới tính...</option>
                        <option value="1">Nam</option>
                        <option value="0">Nữ</option>
                        </select>
                    </div>
                    <div class="col-12 wow fadeInUp" data-wow-delay="100ms">
                        <input type="text" name="ttndk_cmnd[{{$i}}]" class="form-control mb-30" placeholder="Số chứng minh nhân dân">
                    </div>
                </div>
        </div>
    </div>
</div>
@endfor
<div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms">
    <button type="submit" class="btn roberto-btn mt-15">Đăng ký</button>
</div>
</form>
@endsection