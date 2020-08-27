@extends('admin.layout.master')

@section('admin_content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    label.error {
          display: inline-block;
          color:red;
          width: 200px;
      }

  </style>

@if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $err)
            {{$err}}
        @endforeach

    </div>

@endif




    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                Cập Nhật Tour Du Lịch
                    <span class="tools pull-right">
                        <a class="fa fa-chevron-down" href="javascript:;"></a>
                        <a class="fa fa-cog" href="javascript:;"></a>
                        <a class="fa fa-times" href="javascript:;"></a>
                    </span>
                </header>
                <div class="panel-body">
                    <div class="form">
                    <form class="cmxform form-horizontal " enctype="multipart/form-data" id="formDemo1" method="post" action="{{route('TOUR_XLSua',['id'=> $Tour->tour_id])}}" novalidate="novalidate">
                        @csrf
                        <div class="form-group ">
                                <label for="firstname" class="control-label col-lg-3">Lịch trình</label>
                                <div class="col-lg-3">
                                    <select class="form-control m-bot15" name="lt_id" id="lt_id">
                                            <option value="">Chon Lich Trinh</option>
                                                @foreach ($LichTrinh as $lt)
                                            <option
                                            @if ($Tour->lt_id == $lt->lt_id)
                                                {{"selected"}}
                                            @endif
                                            value="{{$lt->lt_id}}">{{$lt->lt_ten}}</option>
                                                @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <select class="form-control m-bot15" name="gd_id" id="gd_id">
                                        <option value="">Giai Đoạn</option>
                                            @foreach ($GiaiDoan as $gd)
                                        <option
                                        @if ($Tour->gd_id == $gd->gd_id)
                                            {{"selected"}}
                                        @endif
                                        value="{{$gd->gd_id}}">{{$gd->giai_doan}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>

                                <?php
                                    $t_handk = $Tour->tour_handk->format('yy-m-d');
                                    $t_ngaybd = $Tour->tour_ngaybd->format('yy-m-d');
                                    $t_ngaykt = $Tour->tour_ngaykt->format('yy-m-d');
                                ?>
                            <div class="form-group ">
                                <label for="lastname" class="control-label col-lg-3">Hạn đăng ký</label>
                                <div class="col-lg-6">

                                 <input class=" form-control" value="{{$t_handk}}" name="tour_handk" type="date" id="tour_handk">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label  class="control-label col-lg-3">Ngày bắt đầu</label>
                                <div class="col-lg-6">

                                <input class="form-control " value="{{$t_ngaybd}}" name="tour_ngaybd" type="date" id="tour_ngaybd">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="password" class="control-label col-lg-3">Ngày kết thúc</label>
                                <div class="col-lg-6">
                                    <input class="form-control "  value="{{$t_ngaykt}}" name="tour_ngaykt" type="date" id="tour_ngaykt">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="confirm_password" class="control-label col-lg-3">Chi phí</label>
                                <div class="col-lg-6">
                                <input class="form-control " value="{{$Tour->tour_chiphi}}"  name="tour_chiphi" type="number" id="tour_chiphi">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-3">Số lượng</label>
                                <div class="col-lg-6">
                                <input class="form-control " value="{{$Tour->tour_soluong}}"  name="tour_soluong" type="number" id="tour_soluong">
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-3">Đại lý</label>
                                <div class="col-lg-6">
                                <input class="form-control" value="{{$Tour->tour_daily}}"  name="tour_daily" type="text" id="tour_daily">
                                </div>
                            </div>


                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-3">Ảnh tour</label>
                                <div class="col-lg-6">
                                  <img alt="" src="upload/tour/{{$Tour->tour_hinhanh}}" style="width: 15rem">
                                  </div>
                              </div>
                              <div class="form-group ">
                                <label for="firstname" class="control-label col-lg-3">Ảnh tour</label>
                                <div class="col-lg-6">
                                    <input class="form-control" id="tour_hinhanh" name="tour_hinhanh" type="file" id="tour_hinhanh">
                                  </div>
                              </div>

                            <div class="form-group">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <button class="btn btn-primary" onclick="return confirm('Bạn có thật sự muốn cập nhật không??')" type="submit">Lưu</button>
                                    <a href="{{route('TOUR_DanhSach')}}"><button class="btn btn-default" type="button">Thoát</button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>

    </form>

@endsection

@section('script')

<script>

    //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
    $("#formDemo1").validate({
        rules: {
            lt_id: "required",
            tour_handk: "required",
            tour_ngaybd: "required",
            tour_ngaykt: "required",
            tour_chiphi: "required",
            tour_soluong: "required",
            gd_id: "required",
            tour_daily: "required",

        },
        messages: {
            lt_id: "Vui lòng chọn lịch trình",
            tour_handk: "Vui lòng chọn hạn đăng ký",
            tour_ngaybd: "Vui lòng chọn ngày bắt đầu",
            tour_ngaykt: "Vui lòng chọn ngày kết thúc",
            tour_chiphi:  "Vui lòng chọn chi phí",
            tour_soluong: "Vui lòng chọn số lượng",
            gd_id: "Vui lòng chọn giai đoạn",
            tour_daily: "Vui lòng chọn đại lý",

        }
    });



    </script>

@endsection

