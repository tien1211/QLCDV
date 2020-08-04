@extends('frontend.layout.master')
@section('frontend_content')
<div class="col-12">
    <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
        <h2>Đăng Ký Tour</h2>
    </div>
</div>
@foreach ($tour1 as $t)
<div class="single-blog-post d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
    <!-- Post Thumbnail -->
    <div class="post-thumbnail">
    <a href="{{route('chitiettour',['id'=>$t->tour_id])}}"><img src="upload/tour/{{$t->tour_hinhanh}}" alt=""></a>
    </div>
    <!-- Post Content -->
    <div class="post-content" style="">
        <!-- Post Meta -->
        <a href="{{route('chitiettour',['id'=>$t->tour_id])}}" class="post-title">{{$t->lt_ten}} {{date('Y ',strtotime($t->tour_handk))}}</a>
        <p>{{$t->lt_mota}}</p>
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
            <a href="#" class="post-author">Hạn đăng kí: {{date('d-m-Y ',strtotime($t->tour_handk))}}</a>
        <a href="#" class="post-tutorial">Giá: {{number_format($t->tour_chiphi)}} VND</a>
        </div>
        @endif
        <a href="{{route('chitiettour',['id'=>$t->tour_id])}}"class="btn continue-btn" ><button class="btn btn-info">Chi Tiết</button></a>
        <!-- Post Title -->
    </div>
</div>
    @endforeach
@endsection
