<div class="col-12 col-sm-8 col-md-6 col-lg-4">
    <div class="roberto-sidebar-area pl-md-4">
        <!-- Recent Post -->
        <div class="single-widget-area mb-100">
            <h4 class="widget-title mb-30">Tour Mới</h4>

            @foreach($ifo as $info)
            @if ($now < $info->tour_ngaykt )
                
            
            <div class="single-recent-post d-flex">
                <!-- Thumb -->
                <div class="post-thumb">
                    <a href="{{route('chitiettour',['id'=>$info->tour_id])}}"><img src="upload/tour/{{$info->tour_hinhanh}}" alt=""></a>
                </div>
                <!-- Content -->
                <div class="post-content">
                    <!-- Post Meta -->
                    <div class="post-meta">
                        <a href="#" class="post-author"  style="color:#ffce1e"><b>NEW</b></a>
                        <a href="#" class="post-tutorial">{{number_format($info->tour_chiphi)}} VND</a>
                    </div>
                    <a href="{{route('chitiettour',['id'=>$info->tour_id])}}" class="post-title">{{$info->lt_ten}} {{date('Y ',strtotime($info->tour_handk))}}</a>
                </div>
            </div>
            @endif
            @endforeach
        </div>

        
        <div class="single-widget-area mb-100">
            <h4 class="widget-title mb-30">Tour Đã Diễn Ra</h4>

           
            @foreach($ifo1 as $info1)
            
                    <div class="single-recent-post d-flex">
                        <!-- Thumb -->
                        <div class="post-thumb">
                            <a href="{{route('chitiettour',['id'=>$info1->tour_id])}}"><img src="upload/tour/{{$info1->tour_hinhanh}}" alt=""></a>
                        </div>
                        <!-- Content -->
                        <div class="post-content">
                            <!-- Post Meta -->
                            <a href="{{route('chitiettour',['id'=>$info1->tour_id])}}" style="color: red" class="post-title">Đã Diễn Ra</a>
                            <a href="{{route('chitiettour',['id'=>$info1->tour_id])}}" class="post-title">{{$info1->lt_ten}} {{date('Y ',strtotime($info1->tour_handk))}}</a>
                        </div>
                    </div>
                
            @endforeach
            
        </div>
      

    </div>
</div>
