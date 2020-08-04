<div class="col-12 col-sm-8 col-md-6 col-lg-4">
    <div class="roberto-sidebar-area pl-md-4">

        

        <!-- Recent Post -->
        <div class="single-widget-area mb-100">
            <h4 class="widget-title mb-30">Tour Mới</h4>

            @foreach($ifo as $tourkhac)
            <div class="single-recent-post d-flex">
                <!-- Thumb -->
                <div class="post-thumb">
                    <a href="{{route('chitiettour',['id'=>$tourkhac->tour_id])}}"><img src="upload/tour/{{$tourkhac->tour_hinhanh}}" alt=""></a>
                </div>
                <!-- Content -->
                <div class="post-content">
                    <!-- Post Meta -->
                    <div class="post-meta">
                        <a href="#" class="post-author">{{date('d-m-Y ',strtotime($tourkhac->tour_handk))}}</a>
                        <a href="#" class="post-tutorial">{{number_format($tourkhac->tour_chiphi)}} VND</a>
                    </div>
                    <a href="{{route('chitiettour',['id'=>$tourkhac->tour_id])}}" class="post-title">{{$tourkhac->lt_ten}} {{date('Y ',strtotime($tourkhac->tour_handk))}}</a>
                </div>
            </div>
            @endforeach
        </div>
    
    


        <div class="single-widget-area mb-100">
            <h4 class="widget-title mb-30">Tour Đã Diễn Ra</h4>

            <!-- Single Recent Post -->
            <div class="single-recent-post d-flex">
                <!-- Thumb -->
                <div class="post-thumb">
                    <a href="single-blog.html"><img src="frontend/img/bg-img/29.jpg" alt=""></a>
                </div>
                <!-- Content -->
                <div class="post-content">
                    <!-- Post Meta -->
                    <div class="post-meta">
                        <a href="#" class="post-author">Jan 29, 2019</a>
                        <a href="#" class="post-tutorial">Event</a>
                    </div>
                    <a href="single-blog.html" class="post-title">Proven Techniques Help You Herbal Breast</a>
                </div>
            </div>

            <!-- Single Recent Post -->
            <div class="single-recent-post d-flex">
                <!-- Thumb -->
                <div class="post-thumb">
                    <a href="single-blog.html"><img src="frontend/img/bg-img/30.jpg" alt=""></a>
                </div>
                <!-- Content -->
                <div class="post-content">
                    <!-- Post Meta -->
                    <div class="post-meta">
                        <a href="#" class="post-author">Jan 29, 2019</a>
                        <a href="#" class="post-tutorial">Event</a>
                    </div>
                    <a href="single-blog.html" class="post-title">Cooking On A George Foreman Grill</a>
                </div>
            </div>

            <!-- Single Recent Post -->
            <div class="single-recent-post d-flex">
                <!-- Thumb -->
                <div class="post-thumb">
                    <a href="single-blog.html"><img src="frontend/img/bg-img/31.jpg" alt=""></a>
                </div>
                <!-- Content -->
                <div class="post-content">
                    <!-- Post Meta -->
                    <div class="post-meta">
                        <a href="#" class="post-author">Jan 29, 2019</a>
                        <a href="#" class="post-tutorial">Event</a>
                    </div>
                    <a href="single-blog.html" class="post-title">Selecting The Right Hotel</a>
                </div>
            </div>

            <!-- Single Recent Post -->
            <div class="single-recent-post d-flex">
                <!-- Thumb -->
                <div class="post-thumb">
                    <a href="single-blog.html"><img src="frontend/img/bg-img/32.jpg" alt=""></a>
                </div>
                <!-- Content -->
                <div class="post-content">
                    <!-- Post Meta -->
                    <div class="post-meta">
                        <a href="#" class="post-author">Jan 29, 2019</a>
                        <a href="#" class="post-tutorial">Event</a>
                    </div>
                    <a href="single-blog.html" class="post-title">Comment Importance Of Human Life</a>
                </div>
            </div>
        </div>

      

    </div>
</div>
