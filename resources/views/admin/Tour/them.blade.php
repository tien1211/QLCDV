@extends('admin.layout.master')

@section('admin_content')


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

<form class="cmxform form-horizontal" enctype="multipart/form-data" method="post" action="{{route('TOUR_XLThem')}}" novalidate="novalidate" >

     @csrf

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                  Thêm Tour Du Lịch
                    <span class="tools pull-right">
                        <a class="fa fa-chevron-down" href="javascript:;"></a>
                        <a class="fa fa-cog" href="javascript:;"></a>
                        <a class="fa fa-times" href="javascript:;"></a>
                     </span>
                </header>
                <div class="panel-body">
                    <div class="form">
                        <form class="cmxform form-horizontal " enctype="multipart/form-data" id="signupForm" method="get" action="" novalidate="novalidate">
                            <div class="form-group ">
                                <label for="firstname" class="control-label col-lg-3">Lịch trình</label>
                                <div class="col-lg-6">

                                        <select class="form-control m-bot15" name="lt_id">
                                             <option value="">Chon Lich Trinh</option>
                                                 @foreach ($LichTrinh as $lt)
                                             <option value="{{$lt->lt_id}}">{{$lt->lt_file}}</option>
                                                  @endforeach


                                        </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="lastname" class="control-label col-lg-3">Hạn đăng ký</label>
                                <div class="col-lg-6">
                                    <input class=" form-control"  name="tour_handk" type="datetime-local">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="username" class="control-label col-lg-3">Ngày bắt đầu</label>
                                <div class="col-lg-6">
                                    <input class="form-control "  name="tour_ngaybd" type="date">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="password" class="control-label col-lg-3">Ngày kết thúc</label>
                                <div class="col-lg-6">
                                    <input class="form-control "  name="tour_ngaykt" type="date">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="confirm_password" class="control-label col-lg-3">Chi phí</label>
                                <div class="col-lg-6">
                                    <input class="form-control "  name="tour_chiphi" type="number">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-3">Số lượng</label>
                                <div class="col-lg-6">
                                    <input class="form-control "  name="tour_soluong" type="number">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-3">Phương tiện</label>
                                <div class="col-lg-6">
                                    <input class="form-control "  name="tour_phuongtien" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-3">Địa điểm</label>
                                <div class="col-lg-6">
                                    <input class="form-control "  name="tour_diadiem" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-3">Trong năm</label>
                                <div class="col-lg-6">
                                    <input class="form-control "  name="tour_trongnam" type="number">
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
