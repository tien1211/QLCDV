@extends('admin.layout.master')

@section('admin_content')

<style>
    ltid.error{
        color: red;
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
                        <form class="cmxform form-horizontal " name="myForm" enctype="multipart/form-data" id="contactForm"  novalidate="novalidate">
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
                               <div id="ltid" ></div>

                                {{-- <div class="col-lg-3">

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
                                    <input class="form-control "  name="tour_chiphi" type="number" id="tour_chiphi">
                                </div>
                            </div>
                            <div class="ltid" ></div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-3">Số lượng</label>
                                <div class="col-lg-6">
                                    <input class="form-control "  name="tour_soluong" type="number" id="tour_soluong">
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-3">Đại lý</label>
                                <div class="col-lg-6">
                                    <input class="form-control "  name="tour_daily" type="text" id="tour_daily">
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-3">Hình ảnh</label>
                                <div class="col-lg-6">
                                    <input class="form-control "  name="tour_hinhanh" type="file" id="tour_hinhanh">
                                </div>
                            </div> --}}

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

<script>
    function myFunction() {
      var x, text;
      var _token = $("input[name='_token']").val();
      // Get the value of the input field with id="numb"
      x = document.getElementById("lt_id").value;
      // If x is Not a Number or less than one or greater than 10
      if ($request->lt_id < 0 ) {
          _token;
        text = "Input not valid";
      } else {
        text = "Input OK";
      }
      document.getElementById("ltid").innerHTML = text;
    }
    </script>



{{-- <script>

      function validateForm() {
        var x = document.forms["myForm"]["lt_id"].value;
      if (x == "") {
        alert("Name must be filled out");
        return false;
      }
    }
    function validateForm() {
        var y = document.forms["myForm"]["tour_handk"].value;
      if (y == "") {
        alert("Name must be filled out");
        return false;
      }
    }
    function validateForm() {
        var z = document.forms["myForm"]["tour_ngaybd"].value;
      if (z == "") {
        alert("Name must be filled out");
        return false;
      }
    }
    function validateForm() {
        var a = document.forms["myForm"]["tour_ngaykt"].value;
      if (a == "") {
        alert("Name must be filled out");
        return false;
      }
    }
    function validateForm() {
        var b = document.forms["myForm"]["tour_chiphi"].value;
      if (b == "") {
        alert("Name must be filled out");
        return false;
      }
    }
    function validateForm() {
        var c = document.forms["myForm"]["tour_soluong"].value;
      if (c == "") {
        alert("Name must be filled out");
        return false;
      }
    }
    function validateForm() {
        var d = document.forms["myForm"]["gd_id"].value;
      if (d == "") {
        alert("Name must be filled out");
        return false;
      }
    }
    function validateForm() {
        var e = document.forms["myForm"]["tour_daily"].value;
      if (e == "") {
        alert("Name must be filled out");
        return false;
      }
    }
    function validateForm() {
        var f = document.forms["myForm"]["tour_hinhanh"].value;
      if (f == "") {
        alert("Name must be filled out");
        return false;
      }
    }
    function validateForm() {
        var g = document.forms["myForm"]["tour_trangthai"].value;
      if (g == "") {
        alert("Name must be filled out");
        return false;
      }
    }



    </script> --}}



{{--}}

   <script type="text/javascript">


    $('#contactForm').on('submit',function(event){

      event.preventDefault();
     //     //console.log('kjk');
        lt_id = $('#lt_id').val();
        // tour_handk = $('#tour_handk').val();
        // tour_ngaybd = $('#tour_ngaybd').val();
        // tour_ngaykt = $('#tour_ngaykt').val();
        // tour_chiphi = $('#tour_chiphi').val();
        // tour_soluong = $('#tour_soluong').val();
        // gd_id = $('#gd_id').val();
        // tour_daily = $('#tour_daily').val();
        // tour_hinhanh = $('#tour_hinhanh').val();
        // tour_trangthai = $('#tour_trangthai').val();

                $.ajax({
         url: "{{route('TOUR_XLThem')}}",
        type:"POST",
        data:{
            "_token": "{{ csrf_token() }}",

        lt_id  : lt_id,
        // tour_handk : tour_handk,
        // tour_ngaybd : tour_ngaybd,
        // tour_ngaykt : tour_ngaykt,
        // tour_chiphi : tour_chiphi,
        // tour_soluong : tour_soluong,
        // gd_id : gd_id,
        // tour_daily : tour_daily,
        // tour_hinhanh : tour_hinhanh,
        // tour_trangthai : tour_trangthai,
        },
        success:function(data){
            console.log(data);

        },
        });

        });

      </script>

      {{-- <script type="text/javascript">


        $(document).ready(function() {
            $(".btn-submit").click(function(e){
                e.preventDefault();


                var _token = $("input[name='_token']").val();
                var lt_id  = $("select[name='lt_id']").val();
                var tour_handk = $("input[name='tour_handk']").val();
                var tour_ngaybd = $("input[name='tour_ngaybd']").val();
                var tour_ngaykt = $("input[name='tour_ngaykt']").val();
                var tour_chiphi = $("input[name='tour_chiphi']").val();
                var tour_soluong = $("input[name='our_soluong']").val();
                var gd_id = $("select[name='gd_id']").val();
                var tour_daily = $("input[name='tour_daily']").val();
                var tour_hinhanh = $("input[name='tour_hinhanh']").val();
                var tour_trangthai = 1;

                $.ajax({
                    url: "{{route('TOUR_XLThem')}}",
                    type:'POST',
                    data: {
                        _token:_token,
                        lt_id  : lt_id,
                        tour_handk : tour_handk,
                        tour_ngaybd : tour_ngaybd,
                        tour_ngaykt : tour_ngaykt,
                        tour_chiphi : tour_chiphi,
                        tour_soluong : tour_soluong,
                        gd_id : gd_id,
                        tour_daily : tour_daily,
                        tour_hinhanh : tour_hinhanh,
                        tour_trangthai : tour_trangthai,
                        },
                    success:function(data) {
                        if($.isEmptyObject(data.error)){
                            alert(data.success);
                        }else{
                            printErrorMsg(data.error);
                        }
                    }
                });


            });


            function printErrorMsg (msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display','block');
                $.each( msg, function( key, value ) {
                    $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                });
            }
        });


    </script> --}}
@endsection
