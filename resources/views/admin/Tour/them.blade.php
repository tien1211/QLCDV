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

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


    @csrf

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Tour Du Lịch
                </header>
                <div class="panel-body print-error-msg " >
                    <ul></ul>
                    <div class="form" id="message">
                        <form class="cmxform form-horizontal" enctype="multipart/form-data" action="{{route('TOUR_XLThem')}}" id="formDemo1" method="post" novalidate="novalidate">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                                        <input class="form-control " step="50000" min="1000000" name="tour_chiphi" type="number" id="tour_chiphi">
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
                                <div class="class"></div>
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <button class="btn btn-primary btn-submit" id="submit" type="submit">Lưu</button>
                                        <button class="btn btn-default" type="button">Thoát</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <br>
                    </div>
                </div>
            </section>
        </div>
    </div>
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
    
    </script>

@endsection
