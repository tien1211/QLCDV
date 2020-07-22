@extends('frontend.layout.master1')

@section('frontend_content')
    <!-- Rooms Area Start -->
    <div class="roberto-rooms-area section-padding-100-0">
        <div class="col-12">
            <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
                
                <h2>{{$datail->LichTrinh->lt_ten}} {{date('Y ',strtotime($datail->tour_handk))}}</h2>
                
            
            </div>
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
                                    
                                    @foreach ($a as $v)
                                    <div class="carousel-item">
                                        <img src="upload/tour/{{$v->at_hinhanh}}" class="d-block w-100" alt="">
                                    </div>
                                    @endforeach
                                </div>
                                <ol class="carousel-indicators">
                                    <li data-target="#room-thumbnail--slide" data-slide-to="0" class="active">
                                        <img src="upload/tour/{{$datail->tour_hinhanh}}" class="d-block w-100" alt="">
                                    </li>
                                    @php
                                        $i =1;
                                    @endphp
                                @foreach ($a as $c)
                                <li data-target="#room-thumbnail--slide" data-slide-to="{{$i}}">
                                    <img src="upload/tour/{{$c->at_hinhanh}}" class="d-block w-100" alt="">
                                    </li>
                                    @php
                                        $i =$i+1;
                                    @endphp
                                @endforeach 
                                </ol>
                            </div>
                        </div>

                        <!-- Room Features -->
                        
                        <div class="room-features-area d-flex flex-wrap mb-50">
                            
                            <h6>Hạn Đăng Ký: <span>{{date('d-m-Y ',strtotime($datail->tour_handk))}}</span></h6>
                            <h6>Ngày Bắt Đầu: <span>{{date('d-m-Y ',strtotime($datail->tour_ngaybd))}}</span></h6>
                            <h6>Ngày Kết Thúc: <span>{{date('d-m-Y ',strtotime($datail->tour_ngaykt))}}</span></h6>
                        <h6>Số lượng: <span>{{$datail->tour_soluong}}</span></h6>
                            
                        </div>

                    <p>{{$datail->LichTrinh->lt_mota}}</p>

                        <ul>
                            <li><i class="fa fa-check"></i> Mauris molestie lectus in irdiet auctor.</li>
                            <li><i class="fa fa-check"></i> Dictum purus at blandit molestie.</li>
                            <li><i class="fa fa-check"></i> Neque non fermentum suscipit.</li>
                            <li><i class="fa fa-check"></i> Donec id dui ac massa malesuada.</li>
                            <li><i class="fa fa-check"></i> In sit amet sapien quis orci maximus.</li>
                            <li><i class="fa fa-check"></i> Vestibulum rutrum diam vel eros tristique.</li>
                        </ul>

                        <p>Every time I hail a cab in New York City or wait for one at the airports, I hope I’ll be lucky enough to get one that’s halfway decent and that the driver actually speaks English. I have spent many anxious moments wondering if I ever get to my destination. Or whether I’d get ripped off. Even if all goes well, I can’t say I can remember many rides in New York cabs that were very pleasant. And given how much they cost by now, going with a limo makes ever more sense.</p>
                    </div>

                    <!-- Room Service -->
                    <div class="room-service mb-50">
                        <h4>Danh Sách Công Đoàn Viên Tham Gia</h4>
                        <table class="table">
                            <thead class="thead-light">
                              <tr>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>John</td>
                                <td>Doe</td>
                                <td>john@example.com</td>
                              </tr>
                              <tr>
                                <td>Mary</td>
                                <td>Moe</td>
                                <td>mary@example.com</td>
                              </tr>
                              <tr>
                                <td>July</td>
                                <td>Dooley</td>
                                <td>july@example.com</td>
                              </tr>
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
                        <form action="#" method="post">
                            <div class="form-group mb-30">
                                <label for="checkInDate">Số Lượng Đăng Ký:</label>
                                {{-- <div class="input-daterange" id="datepicker">
                                    <div class="row no-gutters">
                                        <div class="col-6">
                                            <input type="text" class="input-small form-control" name="checkInDate" id="checkInDate" placeholder="Check In">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="input-small form-control" name="checkOutDate" placeholder="Check Out">
                                        </div>
                                    </div>
                                </div> --}}
                                    <div class="row no-gutters">
                                        <div class="col-12">
                                            <input type="number" min="1" max="20" class="input-small form-control"  placeholder="Số lượng...">
                                        </div>
                                    </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <button type="submit" class="btn roberto-btn w-100">Đăng Ký Tour</button>
                            </div>
                        </form>
                    </div>
                </div>
 <!-- FORM BOOK -->
            </div>
        </div>
    </div>
    <!-- Rooms Area End -->
@endsection