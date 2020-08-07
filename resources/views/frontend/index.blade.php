@extends('frontend.layout.master')
@section('frontend_content')
<div class="col-12">
    <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
        <h2>Đăng Ký Tour</h2>
    </div>
</div>
{{-- @foreach ($tour1 as $t)
<div class="single-blog-post d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">

    <div class="post-thumbnail">
    <a href="{{route('chitiettour',['id'=>$t->tour_id])}}"><img src="upload/tour/{{$t->tour_hinhanh}}" alt=""></a>
    </div>

    <div class="post-content" style="">

        <a href="{{route('chitiettour',['id'=>$t->tour_id])}}" class="post-title">{{$t->lt_ten}} {{date('Y ',strtotime($t->tour_handk))}}</a>

        @if ($now > $t->tour_handk)
        <div class="post-meta" >
            <a href="#" class="post-author" style="color: red">Hết hạn đăng kí</a>
        <a href="#" class="post-tutorial">Giá: {{number_format($t->tour_chiphi)}} VND</a>
        </div>
        @elseif($t->tour_soluong == 0 && $now < $t->tour_handk)
        <div class="post-meta" >
            <a href="#" class="post-author" style="color: red">Hết chổ</a>
        <a href="#" class="post-tutorial">Giá: {{number_format($t->tour_chiphi)}} VND</a>
        </div>
        @else
        <div class="post-meta">
            <a href="#" class="post-author">Hạn ĐK: {{date('d-m-Y ',strtotime($t->tour_handk))}}</a>
        <a href="#" class="post-tutorial">Giá: {{number_format($t->tour_chiphi)}} VND</a>
        </div>
        @endif

        <div class="post-meta">
            <a href="#" class="post-author">Ngày BĐ: {{date('d-m-Y ',strtotime($t->tour_ngaybd))}}</a>
        <a href="#" class="post-tutorial">Ngày KT: {{date('d-m-Y ',strtotime($t->tour_ngaykt))}}</a>
        </div>
        <a href="{{route('chitiettour',['id'=>$t->tour_id])}}"class="btn continue-btn" ><button class="btn btn-info">Chi Tiết</button></a>

    </div>
</div>
    @endforeach --}}
    @foreach ($tour1 as $t)
    <div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
        <!-- Room Thumbnail -->

        <div class="room-thumbnail">
            <img src="upload/tour/{{$t->tour_hinhanh}}" alt="">
        </div>
        <!-- Room Content -->
        <div class="room-content">
        <h2>{{$t->lt_ten}}</h2>
            <h4>{{number_format($t->tour_chiphi)}} <span>/ Người</span></h4>
            <div class="room-feature">
                <h6>Ngày Bắt Đầu: <span>{{date('d-m-Y ',strtotime($t->tour_ngaybd))}}</span></h6>
                <h6>Ngày Kết Thúc: <span>{{date('d-m-Y ',strtotime($t->tour_ngaykt))}}</span></h6>
                <h6>Hạn Đăng ký:

                    @if ($now > $t->tour_handk)
                        <div class="post-meta" >
                            <a href="#" class="post-author" style="color: red">Hết hạn đăng kí</a>

                        </div>
                    @elseif($t->tour_soluong == 0 && $now < $t->tour_handk)
                        <div class="post-meta" >
                            <a href="#" class="post-author" style="color: red">Hết chổ</a>

                        </div>
                    @else
                        <div class="post-meta">
                            <span>{{date('d-m-Y ',strtotime($t->tour_handk))}}</span>

                        </div>
                    @endif
                </h6>








                <h6>Số chỗ còn lại: <span>40</span></h6>
            </div>
            <a href="{{route('chitiettour',['id'=>$t->tour_id])}}" class="btn view-detail-btn">Chi Tiết <i class="fa fa-long-arrow-right" style="margin-left: 7px" aria-hidden="true"></i></a>
        </div>

    </div>

    @endforeach


@endsection
