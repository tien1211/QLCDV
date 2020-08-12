@extends('frontend.layout.master1')
@section('frontend_content')
    <!-- Rooms Area Start -->
    <div class="roberto-rooms-area section-padding-100-0">
        <div class="col-12">

        </div>
        <div class="container">
            <div class="row">
<!-- INFO PLACE -->
                <div class="col-12 col-lg-8">
                    <!-- Single Room Details Area -->
                    <div class="single-room-details-area mb-50">
                        <!-- Room Thumbnail Slides -->
                        <div class="room-thumbnail-slides mb-50">
                            <div id="room-thumbnail--slide" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                    <img src="upload/tour/{{$datail->tour_hinhanh}}" class="d-block w-100" alt="">
                                    </div>
                                    @foreach ($a as $img)
                                        @if ($img->at_trangthai == 1  )
                                        <div class="carousel-item">
                                            <img src="upload/tour/{{$img->at_hinhanh}}" class="d-block w-100" alt="">
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                                <ol class="carousel-indicators">
                                    <li data-target="#room-thumbnail--slide" data-slide-to="0" class="active">
                                        <img src="upload/tour/{{$datail->tour_hinhanh}}" class="d-block w-100" alt="">
                                    </li>
                                    @php
                                        $i =1;
                                    @endphp
                                    @foreach ($a as $img1)
                                        @if ($img1->at_trangthai == 1)
                                        <li data-target="#room-thumbnail--slide" data-slide-to="{{$i}}">
                                            <img src="upload/tour/{{$img1->at_hinhanh}}" class="d-block w-100" alt="">
                                            </li>
                                        @endif

                                        @php
                                            $i =$i+1;
                                        @endphp
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                        <hr>
                        <!-- Room Features -->
                       
                    <p>{{$datail->LichTrinh->lt_mota}}</p>
                        <ul>
                            <h5><li style="color: #1cc3b2"><i class="fa fa-download" ></i><a href="{{url('upload/lichtrinh/'.$datail->LichTrinh->lt_file)}}" style="color: #1cc3b2"> DownLoad Lịch Trình:  {{$datail->LichTrinh->lt_ten}} {{date('Y ',strtotime($datail->tour_handk))}}</a></li></h5>
                        </ul>
                    </div>
                    <!-- Room Service -->
                    <div class="room-service mb-50">
                        <h4>Danh Sách Người Tham gia Tham Gia</h4>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>STT</th>
                                    <th>Người tham gia</th>
                                    <th>Công đoàn viên đăng ký</th>
                                    <th>Giới tính</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nguoithamgia as $key => $dk)
                                @if($dk->tttp_id != 2)
                                <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$dk->ttndk_ten}}</td>
                                <td>{{$dk->cdv_ten}}</td>
                                @if($dk->ttndk_gt == 1)
                                <td>Nam</td>
                                @else
                                <td>Nữ</td>
                                @endif
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Room Review -->

                </div>
<!-- INFO PLACE -->
<!-- FORM BOOK -->
                <div class="col-12 col-lg-4">
                    <!-- Hotel Reservation Area -->
                    <div class="hotel-reservation--area mb-100">
                        {{-- MESSAGE ERROR --}}
                        <div class="form-group" style="mt-6">
                            <div class="flash-message">
                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                    @if(Session::has('alert-' . $msg))
                                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} </p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        {{-- MESSAGE ERROR --}}
                                <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
                                    <h4>{{$datail->LichTrinh->lt_ten}} {{date('Y ',strtotime($datail->tour_handk))}}</h4>
                                </div>
                                <div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
                                    <!-- Room Thumbnail -->
                                    <!-- Room Content -->
                                    <div class="room-content">
                                    <h2>{{$datail->lt_ten}}</h2>
                                        <h4>{{number_format($datail->tour_chiphi)}} VNĐ<span>/ Người</span></h4>
                                        <div class="room-feature">
                                            <h6>Ngày Bắt Đầu: <span>{{date('d-m-Y ',strtotime($datail->tour_ngaybd))}}</span></h6>
                                            <br>
                                            <h6>Ngày Kết Thúc: <span>{{date('d-m-Y ',strtotime($datail->tour_ngaykt))}}</span></h6>
                                            <br>
                                            <h6>Hạn Đăng ký:
                                                @if ($now > $datail->tour_handk)
                                                    <div class="post-meta" >
                                                        <a href="#" class="post-author mt-20" style="color: red">Hết hạn đăng kí</a>
                                                    </div>
                                                @elseif($datail->tour_soluong == 0 && $now < $datail->tour_handk)
                                                    <div class="post-meta" >
                                                        <a href="#" class="post-author mt-10" style="color: red">Hết chổ</a>
                                                    </div>
                                                @else
                                                    <div class="post-meta">
                                                        <span>{{date('d-m-Y ',strtotime($datail->tour_handk))}}</span>
                                                    </div>
                                                @endif
                                            </h6>
                                        <h6>Số chỗ còn lại: <span>{{$datail->tour_soluong}}</span></h6>
                                        </div>
                                        <div class="form-group">
                                                @if ($now > $datail->tour_handk)
                                                <a href="{{route('dktour',['id'=>$datail->tour_id])}}" ><button disabled class="btn roberto-btn w-100 check_quantity">Đã Hết Hạn</button></a>
                                                @else
                                                <a href="{{route('dktour',['id'=>$datail->tour_id])}}" ><button class="btn roberto-btn w-100 check_quantity">Đăng Ký Tour</button></a>
                                                @endif
                                        </div>
                                    </div>
                                </div>      
                        {{-- test --}}      
                    </div>
                        {{-- TOUR KHAC --}}
                        <h4> <label for="checkInDate">Các Tour khác:</label></h4><hr>
                        @foreach($tourkhac as $tourkhac)
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
                        {{-- TOUR KHAC --}}
                </div>
 <!-- FORM BOOK -->
            </div>
        </div>
    </div>
    <!-- Rooms Area End -->
@endsection
