@extends('frontend.layout.master')
@section('frontend_content')
@foreach ($Tour as $t)
<div class="single-blog-post d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
    <!-- Post Thumbnail -->

    <div class="post-thumbnail">
    <a href="#"><img src="upload/tour/{{$t->tour_hinhanh}}" alt=""></a>
    </div>
    <!-- Post Content -->
    <div class="post-content">
        <!-- Post Meta -->
        <div class="post-meta">
            <a href="#" class="post-author">Hạn đăng kí: {{date('d-m-Y ',strtotime($t->tour_handk))}}</a>
        <a href="#" class="post-tutorial">Giá: {{number_format($t->tour_chiphi)}} VND</a>
        </div>
        <!-- Post Title -->
    <a href="#" class="post-title">{{$t->tour_ten}}</a>
    <p>{{$t->LichTrinh->lt_mota}}</p>
        <a href="#" class="btn continue-btn">Đặt Tour</a>
    </div>
</div>
    @endforeach

@endsection
