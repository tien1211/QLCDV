@extends('admin.layout.master')

@section('admin_content')


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

@if(session('thongbao'))
    <div class="alert alert-success">
        {{session('thongbao')}}
    </div>

@endif

<form class="cmxform form-horizontal" enctype="multipart/form-data" method="post" action="{{route('TOUR_XLSua',['id'=> $Tour->tour_id])}}" novalidate="novalidate" >

    @csrf

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
                        <form class="cmxform form-horizontal " enctype="multipart/form-data" id="formDemo" method="get" action="" novalidate="novalidate">
                            <div class="form-group ">
                                <label for="firstname" class="control-label col-lg-3">Lịch trình</label>
                                <div class="col-lg-3">
                                    <select class="form-control m-bot15" name="lt_id">
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
                                    <select class="form-control m-bot15" name="gd_id">
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

                                 <input class=" form-control" value="{{$t_handk}}" name="tour_handk" type="date">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label  class="control-label col-lg-3">Ngày bắt đầu</label>
                                <div class="col-lg-6">

                                <input class="form-control " value="{{$t_ngaybd}}" name="tour_ngaybd" type="date">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="password" class="control-label col-lg-3">Ngày kết thúc</label>
                                <div class="col-lg-6">
                                    <input class="form-control "  value="{{$t_ngaykt}}" name="tour_ngaykt" type="date">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="confirm_password" class="control-label col-lg-3">Chi phí</label>
                                <div class="col-lg-6">
                                <input class="form-control " value="{{$Tour->tour_chiphi}}"  name="tour_chiphi" type="number">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-3">Số lượng</label>
                                <div class="col-lg-6">
                                <input class="form-control " value="{{$Tour->tour_soluong}}"  name="tour_soluong" type="number">
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-3">Đại lý</label>
                                <div class="col-lg-6">
                                <input class="form-control" value="{{$Tour->tour_daily}}"  name="tour_daily" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-3">Hình ảnh</label>
                                <div class="col-lg-6">
                                <input class="form-control" value="{{$Tour->tour_hinhanh}}"  name="tour_hinhanh" type="file">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <button class="btn btn-primary" type="submit">Lưu</button>
                                    <button class="btn btn-default" type="button">Thoát</button>
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

<script type="text/javascript">





    //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
    $("#formDemo").validate({
        rules: {
            lt_id: "required",
            tour_handk: "required",
            tour_ngaybd: "required",
            tour_ngaykt: "required",
            tour_chiphi: "required",
            tour_soluong: "required",
            gd_id: "required",
            tour_daily: "required",
            tour_hinhanh: "required",
        },
        messages: {
            lt_id: "Vui lòng chọn lịch trình",
            tour_handk: "Vui lòng chọn hạn đăng ký",
            tour_ngaybd: "Vui lòng chọn ngày bắt đầu",
            tour_ngaykt: "Vui lòng chọn ngày kết thúc",
            tour_chiphi: {
                required: "Vui lòng chọn chi phí",
                minlength : "Chi phí phải lớn hơn hoặc bằng 1.000.000"
            },
            tour_soluong:{
                required: "Vui lòng chọn số lượng",
                min: "Số lượng phải lớn hơn 0"
        },
            gd_id: "Vui lòng chọn giai đoạn",
            tour_daily: "Vui lòng chọn đại lý",
            tour_hinhanh: "Vui lòng chọn hình ảnh",

        }
    });
});

</script>


   <script type="text/javascript">


    $('#formDemo').on('submit',function(event){

      event.preventDefault();

        lt_id = $('#lt_id').val();
        tour_handk = $('#tour_handk').val();
        tour_ngaybd = $('#tour_ngaybd').val();
        tour_ngaykt = $('#tour_ngaykt').val();
        tour_chiphi = $('#tour_chiphi').val();
        tour_soluong = $('#tour_soluong').val();
        gd_id = $('#gd_id').val();
        tour_daily = $('#tour_daily').val();
        tour_hinhanh = $('#tour_hinhanh').val();


                $.ajax({
         url: "{{route('TOUR_XLSua',['id'=>'tour_id'])}}",
        type:"POST",
        data:{
            "_token": "{{ csrf_token() }}",

        lt_id  : lt_id,
        tour_handk : tour_handk,
        tour_ngaybd : tour_ngaybd,
        tour_ngaykt : tour_ngaykt,
        tour_chiphi : tour_chiphi,
        tour_soluong : tour_soluong,
        gd_id : gd_id,
        tour_daily : tour_daily,
        tour_hinhanh : tour_hinhanh,

        },
        success:function(data){
          alert(data.thongbao);
        },
        });

        });

      </script>


@endsection

