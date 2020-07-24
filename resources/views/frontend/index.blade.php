@extends('frontend.layout.master')
@section('frontend_content')
<div class="col-12">
    <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">

        <h2>Đăng Ký Tour</h2>
    </div>
</div>
@foreach ($Tour as $t)
<div class="single-blog-post d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
    <!-- Post Thumbnail -->

    <div class="post-thumbnail">
    <a href="#"><img src="upload/tour/{{$t->tour_hinhanh}}" alt=""></a>
    </div>
    <!-- Post Content -->
    <div class="post-content">
        <!-- Post Meta -->
        
        @if ($now > $t->tour_handk)
        <div class="post-meta" >
            <a href="#" class="post-author" style="color: red">Hết Hạn đăng kí</a>
        <a href="#" class="post-tutorial">Giá: {{number_format($t->tour_chiphi)}} VND</a>
        </div>
        
        @else
        <div class="post-meta">
            <a href="#" class="post-author">Hạn đăng kí: {{date('d-m-Y ',strtotime($t->tour_handk))}}</a>
        <a href="#" class="post-tutorial">Giá: {{number_format($t->tour_chiphi)}} VND</a>
        </div>
        
        @endif
        <a href="#" class="post-title">{{$t->LichTrinh->lt_ten}} {{date('Y ',strtotime($t->tour_handk))}}</a>
        <p>{{$t->LichTrinh->lt_mota}}</p>
        <a href="{{route('chitiettour',['id'=>$t->tour_id])}}"class="btn continue-btn">Chi Tiết Tour</a>
        <!-- Post Title -->
        
    
    
    
    </div>
</div>
    @endforeach

@endsection
