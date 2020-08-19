@extends('frontend.layout.master')
@section('frontend_content')
<div class="col-12">
    <div class="section-heading text-center " data-wow-delay="100ms">
<<<<<<< HEAD
        <h2>Danh Sách Tour</h2>
=======
        <h2>Danh Sách Tour</h2>
>>>>>>> 37b34bbeb5d774b254c87e3f85119eaed45bdfdd
    </div>
</div>

    @foreach ($tour1 as $t)
    <div loading="lazy" class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
        <!-- Room Thumbnail -->

        <div class="room-thumbnail">
            <a href="{{route('chitiettour',['id'=>$t->tour_id])}}"><img src="upload/tour/{{$t->tour_hinhanh}}" alt=""></a>
        </div>
        <!-- Room Content -->
        <div class="room-content">
        <a href="{{route('chitiettour',['id'=>$t->tour_id])}}"><h2>{{$t->lt_ten}}</h2></a>
            <h4>{{number_format($t->tour_chiphi)}} VNĐ<span>/ Người</span></h4>
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
            <h6>Số chỗ còn lại: <span>{{$t->tour_soluong}}</span></h6>
            </div>
            <a href="{{route('chitiettour',['id'=>$t->tour_id])}}" class="btn btn-info">Chi Tiết-></a>
        </div>
    </div>
    @endforeach
        <div class="mb-5" style="margin-left: 60%">{!! $tour1->links() !!}</div>
@endsection
