@extends('frontend.layout.master') 
@section('frontend_content')

 <!-- Profile Start -->
   <!-- Blog Area Start -->
   <div class="roberto-news-area section-padding-20-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">

                <div class="roberto-contact-form mt-1 mb-100">
                <center><h2>Thông tin các nhân: {{$auth->cdv_ten}}</h2></center>

                    <!-- Form -->
                    <form action="#" method="post">
                        <div class="row">
                            
                            <div class="col-5 ">
                                <label for=""><h5>Họ Tên:</h5></label>
                            </div>
                            <div class="col-7">
                            {{$profile->cdv_ten}}
                            </div>


                            <div class="col-5 mt-3">
                                <h5>Giới tính:</h5>
                            </div>
                            <div class="col-7 mt-3">
                                
                                @if ($profile->cdv_gioitinh == 1)
                                Nam
                                @else
                                Nữ
                                @endif
                            </div>

                            

                            <div class="col-5 mt-3">
                                <label for=""><h5>Đơn Vị:</h5></label>
                            </div>
                            <div class="col-7 mt-3">
                            {{$profile->DonVi->dv_ten}}
                            </div>

                            <div class="col-5 mt-3">
                                <label for=""><h5>Chức vụ:</h5></label>
                            </div>
                            <div class="col-7 mt-3">
                            {{$profile->ChucVu->cv_ten}}
                            </div>
                            
                            <div class="col-5 mt-3">
                                <label for=""><h5>Loại Nhân Viên:</h5></label>
                            </div>
                            <div class="col-7 mt-3">
                            {{$profile->LoaiNhanVien->lnv_ten}}
                            </div>


                            <div class="col-5 mt-3" >
                                <label for=""><h5>CMND:</h5></label>
                            </div>
                            <div class="col-7 mt-3">
                                {{$profile->cdv_cmnd}}
                            </div>


                            <div class="col-5 mt-3">
                                <label for=""><h5>Số Điện Thoại:</h5></label>
                            </div>
                            <div class="col-7 mt-3">
                                {{$profile->cdv_sdt}}
                            </div>

                            <div class="col-5 mt-3">
                                <label for=""><h5>Ngày Sinh:</h5></label>
                            </div>
                            <div class="col-7 mt-3">
                                {{date('d-m-Y',strtotime($profile->cdv_ngaysinh))}}
                                
                            </div>
                            


                            <div class="col-5 mt-3">
                                <label for=""><h5>Nguyên Quán:</h5></label>
                            </div>
                            <div class="col-7 mt-3">
                            {{$profile->cdv_nguyenquan}}
                            </div>


                            <div class="col-5 mt-3">
                                <label for=""><h5>Địa Chỉ:</h5></label>
                            </div>
                            <div class="col-7 mt-3">
                            {{$profile->cdv_diachi}}
                            </div>
                            
                            <div class="col-5 mt-3">
                                <label for=""><h5>Email:</h5></label>
                            </div>
                            <div class="col-7 mt-3">
                            {{$profile->cdv_email}}
                            </div>




                            <div class="col-5 mt-3">
                                <label for=""><h5>Dân Tộc:</h5></label>
                            </div>
                            <div class="col-7 mt-3">
                            {{$profile->cdv_dantoc}}
                            </div>




                            <div class="col-5 mt-3">
                                <label for=""><h5>Trình Độ:</h5></label>
                            </div>
                            <div class="col-7 mt-3">
                            {{$profile->cdv_trinhdo}}
                            </div>




                            <div class="col-5 mt-3">
                                <label for=""><h5>Tôn Giáo:</h5></label>
                            </div>
                            <div class="col-7 mt-3">
                            {{$profile->cdv_tongiao}}
                            </div>




                            <div class="col-5 mt-3">
                                <label for=""><h5>Ngày Thử Việc:</h5></label>
                            </div>
                            <div class="col-7 mt-3">
                            {{date('d-m-Y',strtotime($profile->cdv_ngaythuviec))}}
                            </div>




                            <div class="col-5 mt-3">
                            <label for=""><h5>Ngày Vào Ngành:</h5></label>
                            </div>
                            <div class="col-7 mt-3">
                                {{date('d-m-Y',strtotime($profile->cdv_ngayvaonganh))}}
                            
                            </div>




                            <div class="col-5 mt-3">
                                <label for=""><h5>Vai Trò:</h5></label>
                            </div>
                            <div class="col-7 mt-3">
                            @if ($profile->cdv_quyen == 1)
                                Admin
                            @else
                                Thường
                            @endif
                            </div>
                            
                            



                            <div class="col-12">
                            <a href="{{route('trangchu')}}" class="btn roberto-btn btn-3 mt-15">Trở Về Trang Chủ</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                <div class="roberto-sidebar-area pl-md-4">

                    <!-- Newsletter -->
                    <div class="single-widget-area mb-100">
                        <div class="newsletter-form">
                            <h5>Newsletter</h5>
                            <p>Subscribe our newsletter gor get notification new updates.</p>

                            <form action="#" method="post">
                                <input type="email" name="nl-email" id="nlEmail" class="form-control" placeholder="Enter your email...">
                                <button type="submit" class="btn roberto-btn w-100">Subscribe</button>
                            </form>
                        </div>
                    </div>

                    <!-- Recent Post -->
                    <div class="single-widget-area mb-100">
                        <h4 class="widget-title mb-30">Recent News</h4>

                        <!-- Single Recent Post -->
                        <div class="single-recent-post d-flex">
                            <!-- Thumb -->
                            <div class="post-thumb">
                                <a href="single-blog.html"><img src="img/bg-img/29.jpg" alt=""></a>
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
                                <a href="single-blog.html"><img src="img/bg-img/30.jpg" alt=""></a>
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
                                <a href="single-blog.html"><img src="img/bg-img/31.jpg" alt=""></a>
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
                                <a href="single-blog.html"><img src="img/bg-img/32.jpg" alt=""></a>
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

                    <!-- Popular Tags -->
                    <div class="single-widget-area mb-100 clearfix">
                        <h4 class="widget-title mb-30">Tags</h4>
                        <!-- Popular Tags -->
                        <ul class="popular-tags">
                            <li><a href="#">Bed,</a></li>
                            <li><a href="#">Hotel,</a></li>
                            <li><a href="#">Travel,</a></li>
                            <li><a href="#">Restaurant,</a></li>
                            <li><a href="#">Sport,</a></li>
                            <li><a href="#">Trip,</a></li>
                            <li><a href="#">Music,</a></li>
                            <li><a href="#">Holiday,</a></li>
                            <li><a href="#">Tourist,</a></li>
                            <li><a href="#">Foody,</a></li>
                            <li><a href="#">Resorts.</a></li>
                        </ul>
                    </div>

                    <!-- Instagram -->
                    <div class="single-widget-area mb-100 clearfix">
                        <h4 class="widget-title mb-30">Instagram</h4>
                        <!-- Instagram Feeds -->
                        <ul class="instagram-feeds">
                            <li><a href="#"><img src="img/bg-img/33.jpg" alt=""></a></li>
                            <li><a href="#"><img src="img/bg-img/34.jpg" alt=""></a></li>
                            <li><a href="#"><img src="img/bg-img/35.jpg" alt=""></a></li>
                            <li><a href="#"><img src="img/bg-img/36.jpg" alt=""></a></li>
                            <li><a href="#"><img src="img/bg-img/37.jpg" alt=""></a></li>
                            <li><a href="#"><img src="img/bg-img/38.jpg" alt=""></a></li>
                        </ul>
                    </div>

                </div>
            </div> --}}
        </div>
    </div>
</div>
<!-- Blog Area End -->
<!-- Profile End -->


    
@endsection
 
 
