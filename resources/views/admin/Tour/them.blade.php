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

{{-- @if(session('thongbao'))
    <div class="alert alert-success">
          {{session('thongbao')}}
    </div>

@endif --}}

{{-- <form id="content-form" class="cmxform form-horizontal" enctype="multipart/form-data" method="post" novalidate="novalidate" > --}}

     @csrf

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                  Thêm Tour Du Lịch
                </header>
                <div class="panel-body print-error-msg " >
                    <ul></ul>
                    <div class="form">
                        <form class="cmxform form-horizontal " name="myForm" enctype="multipart/form-data" id="formDemo"  novalidate="novalidate">
                             <div class="form-group ">
                                <label for="firstname" class="control-label col-lg-3">Lịch trình</label>
                                <div class="col-lg-3">

                                        <select class="form-control m-bot15" name="lt_id" id="lt_id">
                                             <option value="">Chon Lich Trinh</option>
                                                 @foreach ($LichTrinh as $lt)
                                             <option value="{{$lt->lt_id}}">{{$lt->lt_ten}}</option>
                                                  @endforeach


                                        </select>
                                </div>
                               <div id="ltid"></div>

                                 <div class="col-lg-3">

                                        <select class="form-control m-bot15" name="gd_id" id="gd_id">
                                             <option value="">Giai Đoạn</option>
                                                 @foreach ($GiaiDoan as $gd)
                                             <option value="{{$gd->gd_id}}">{{$gd->giai_doan}}</option>
                                                  @endforeach


                                        </select>
                                </div>
                            </div>



                            <div class="form-group ">
                                <label for="lastname" class="control-label col-lg-3">Hạn đăng ký</label>
                                <div class="col-lg-6">
                                    <input class=" form-control"  name="tour_handk" type="date" id="tour_handk">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="username" class="control-label col-lg-3">Ngày bắt đầu</label>
                                <div class="col-lg-6">
                                    <input class="form-control "  name="tour_ngaybd" type="date" id="tour_ngaybd">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="password" class="control-label col-lg-3">Ngày kết thúc</label>
                                <div class="col-lg-6">
                                    <input class="form-control "  name="tour_ngaykt" type="date" id="tour_ngaykt">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="confirm_password" class="control-label col-lg-3">Chi phí</label>
                                <div class="col-lg-6">
                                    <input class="form-control " min="1000000" name="tour_chiphi" type="number" id="tour_chiphi">
                                </div>
                             </div>
                            <div class="ltid" ></div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-3">Số lượng</label>
                                <div class="col-lg-6">
                                    <input class="form-control " min="0"  name="tour_soluong" type="number" id="tour_soluong">
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-3">Đại lý</label>
                                <div class="col-lg-6">
                                    <input class="form-control "  name="tour_daily" type="text" id="tour_daily">
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="tour_hinhanh" class="control-label col-lg-3">Hình ảnh</label>
                                <div class="col-lg-6">
                                    <input class="form-control "  name="tour_hinhanh" type="file" id="tour_hinhanh">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <button class="btn btn-primary btn-submit" id="submit" type="submit">Lưu</button>
                                    <button class="btn btn-default" type="button">Thoát</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>


    {{-- </form> --}}

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
            tour_chiphi:  "Vui lòng chọn chi phí",
            tour_soluong: "Vui lòng chọn số lượng",
            gd_id: "Vui lòng chọn giai đoạn",
            tour_daily: "Vui lòng chọn đại lý",
            tour_hinhanh: "Vui lòng chọn hình ảnh",

        }
    });








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
        var file_data = $('#tour_hinhanh').prop('files');
        //let tour_hinhanh = file_data.name;
       //console.log(file_data);
        //var type = file_data.type;
        var form_data = new FormData();
        form_data.append('tour_hinhanh', file_data);
                $.ajax({
         url: "{{route('TOUR_XLThem')}}",
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
        tour_hinhanh : file_data ,

        },
        success:function(data){
          alert(data.thongbao);
          window.history.back(-2);
        },
        });

        });

      </script>


@endsection
