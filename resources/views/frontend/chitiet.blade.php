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
                        <!-- Room Features -->
                        <div class="room-features-area d-flex flex-wrap mb-50">
                            <h6>Hạn Đăng Ký: <span>{{date('d-m-Y ',strtotime($datail->tour_handk))}}</span></h6>
                            <h6><b>Ngày Bắt Đầu: </b><span>{{date('d-m-Y ',strtotime($datail->tour_ngaybd))}}</span></h6>
                            <h6><b>Ngày Kết Thúc:</b> <span>{{date('d-m-Y ',strtotime($datail->tour_ngaykt))}}</span></h6>
                            <h6><b>Số lượng:</b> <span>{{$datail->tour_soluong}}</span></h6>
                        </div>
                    <p>{{$datail->LichTrinh->lt_mota}}</p>
                        <ul>
                            <li><i class="fa fa-check"></i><a href="{{url('upload/lichtrinh/'.$datail->LichTrinh->lt_file)}}"> DownLoad Lịch Trình:  {{$datail->LichTrinh->lt_ten}} {{date('Y ',strtotime($datail->tour_handk))}}</a></li>
                        </ul>
                    </div>
                    <!-- Room Service -->
                    <div class="room-service mb-50">
                        <h4>Danh Sách Công Đoàn Viên Tham Gia</h4>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>STT</th>
                                    <th>Người đăng ký</th>
                                    <th>Số lượng đăng ký</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($cdv_dk as $dk)
                                @if($dk->tttp_id != 3)
                                <tr>
                                <td>{{$i}}</td>
                                <td>{{$dk->cdv_ten}}</td>
                                <td>{{$dk->dkt_soluong}}</td>
                                </tr>
                                @php
                                    $i = $i+1;
                                @endphp
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
                        <div class="form-group" style="mt-6">
                            <div class="flash-message">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} </p>
                                @endif
                            @endforeach
                        </div>
                        </div>
                        @if ($now > $datail->tour_handk)
                                <form action="{{route('dktour',['id'=> $datail->tour_id])}}" method="post">
                                    @csrf
                                        <div class="form-group mb-30">
                                            <label for="checkInDate">Chi phí:</label>
                                                <div class="row no-gutters">
                                                    <div class="col-12">
                                                    <input type="text" class="input-small form-control" id="cost" value="{{number_format($datail->tour_chiphi)}} VND"  name="tour_chiphi" disabled>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="form-group mb-30">
                                            <label for="checkInDate">Số Lượng Đăng Ký:</label>
                                                <div class="row no-gutters">
                                                    <div class="col-12">
                                                        <input type="number" min="1" max="20" onchange="load()"  id="amount" disabled class="input-small form-control" name="dkt_soluong"  placeholder="Số lượng...">
                                                        @if($errors->has('dkt_soluong'))
                                                        <div style="color:red">{{ $errors->first('dkt_soluong')}}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="form-group mb-30">
                                            <label for="checkInDate">Thành Tiền: </label>
                                                <div class="row no-gutters">
                                                    <div class="col-12">
                                                    <input type="text"  class="input-small form-control"  id='payment'  placeholder="Thành tiền" disabled>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" disabled class="btn roberto-btn w-100">HẾT HẠN ĐĂNG KÝ</button>
                                        </div>
                                    </form>
                                </div>
                                {{-- disabled --}}
                            {{-- @endif --}}
                        @elseif(sizeof($temp) != 0)
                        @php
                        foreach($temp as $t){
                            $sl = $t->dkt_soluong;
                        }
                        @endphp
                            <div class="form-group mb-30">
                                <label for="checkInDate">Chi phí:</label>
                                    <div class="row no-gutters">
                                        <div class="col-12">
                                        <input type="text" class="input-small form-control" id="cost" value="{{number_format($datail->tour_chiphi)}} VND"  name="tour_chiphi" disabled>
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group mb-30">
                                
                                    <div class="row no-gutters"><label for="checkInDate">Số Lượng Đăng Ký:</label>
                                        <div class="col-12">
                                            <input type="number" min="1" max="20" disabled class="input-small form-control" name="dkt_soluong"  value="{{$sl}}">
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group mb-30">
                                <label for="checkInDate">Thành Tiền: </label>
                                    <div class="row no-gutters">
                                        <div class="col-12">
                                        <input type="text"  class="input-small form-control" value="{{number_format($datail->tour_chiphi*$sl)}} VND" disabled>
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" disabled class="btn roberto-btn w-100">Đã đăng ký</button>
                            </div>
                            <form action="{{route('cntour',['id'=> $datail->tour_id])}}" method="post">
                                @csrf
                            <div class="form-group mb-30">
                            <label for="checkInDate">Cập nhật thêm người tham gia:</label>
                                <div class="row no-gutters">
                                    <div class="col-12">
                                        <input type="number" min="1" max="100" onchange="load()"  id="amount" class="input-small form-control" name="dkt_soluong"  placeholder="Số lượng...">
                                        <input type="hidden" id="soluong" value="{{$datail->tour_soluong}}">
                                        @if($errors->has('dkt_soluong'))
                                        <div style="color:red">{{ $errors->first('dkt_soluong')}}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-30">
                                <label for="checkInDate">Thành Tiền: </label>
                                    <div class="row no-gutters">
                                        <div class="col-12">
                                        <input type="text"  class="input-small form-control"  id='payment'  placeholder="Thành tiền" disabled>
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" onclick="return confirm('Bạn có chắc muốn đăng ký không?');" class="btn roberto-btn w-100 check_quantity">Cập nhật</button>
                            </div>
                        </form>
                        <form action="{{route('huytour',['id'=> $datail->tour_id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <button type="submit" onclick="return confirm('Bạn có chắc muốn hủy đăng ký không?');" class="btn roberto-btn w-100">Hủy đăng ký</button>
                            </div>
                        </from>
                        @else
                            <form action="{{route('dktour',['id'=> $datail->tour_id])}}" method="post" id="myForm">
                                @csrf
                                    <div class="form-group mb-30">
                                        <label for="checkInDate">Chi phí:</label>
                                            <div class="row no-gutters">
                                                <div class="col-12">
                                                <input type="text" class="input-small form-control" id="cost" value="{{number_format($datail->tour_chiphi)}} VND"  name="tour_chiphi" disabled>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="form-group mb-30">
                                        <label for="checkInDate">Số Lượng Đăng Ký:</label>
                                            <div class="row no-gutters">
                                                <div class="col-12">
                                                    <input type="number" min="1" max="100" onchange="load()"  id="amount" class="input-small form-control" name="dkt_soluong"  placeholder="Số lượng...">
                                                    <input type="hidden" id="soluong" value="{{$datail->tour_soluong}}">
                                                    @if($errors->has('dkt_soluong'))
                                                    <div style="color:red">{{ $errors->first('dkt_soluong')}}</div>
                                                    @endif
                                                </div>
                                            </div>
                                    </div>
                                    <div class="form-group mb-30">
                                        <label for="checkInDate">Thành Tiền: </label>
                                            <div class="row no-gutters">
                                                <div class="col-12">
                                                <input type="text"  class="input-small form-control"  id='payment'  placeholder="Thành tiền" disabled>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" onclick="return confirm('Bạn có chắc muốn đăng ký không?');" class="btn roberto-btn w-100 check_quantity">Đăng Ký Tour</button>
                                    </div>
                                </form>
                            </div>
                        @endif
                        <label for="checkInDate">Các tour khác:</label>
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
                        
                        
                </div>
 <!-- FORM BOOK -->
            </div>
        </div>
    </div>
    <!-- Rooms Area End -->
@endsection
@section('script')
    <script>
        function load(){
            const formatter = new Intl.NumberFormat('vi-VN', {
            //style: 'currency',
            currency: 'VND',
            minimumFractionDigits: 0
            })
            var y = document.getElementById("amount").value;
            var x = {{$datail->tour_chiphi}};
            formatter.format(x);

            formatter.format(10);

            // "$1,234,567,890.00"
            document.getElementById("payment").value = formatter.format(parseInt(x) * parseInt(y)) + " VND";
        }
    </script>
    <script type="text/javascript">
    $('.check_quantity').click(function(){
        var a = document.getElementById("soluong").value;
        var b = document.getElementById("amount").value;
        if(parseInt(b) > parseInt(a)){
            location.reload();
            alert("vượt quá số lượng đăng ký");
        }
    });
    </script>
@endsection
