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

<form class="cmxform form-horizontal" enctype="multipart/form-data" method="post" action="{{route('TOUR_XLSua',['id'=> $Tour->tour_id])}}" novalidate="novalidate" >

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


                        <form class="cmxform form-horizontal " enctype="multipart/form-data" id="signupForm" method="get" action="{{route('TOUR_XLSua',['id'=> $Tour->tour_id])}}" novalidate="novalidate">
                            <div class="form-group ">
                                <label for="firstname" class="control-label col-lg-3">Lịch trình</label>
                                <div class="col-lg-6">

                                        <select class="form-control m-bot15" name="lt_id">
                                             <option value="">Chon Lich Trinh</option>
                                                 @foreach ($LichTrinh as $lt)
                                             <option
                                             @if ($Tour->lt_id == $lt->lt_id)
                                                 {{"selected"}}
                                             @endif
                                             value="{{$lt->lt_id}}">{{$lt->lt_file}}</option>
                                                  @endforeach
                                        </select>
                                        @if($errors->has('lt_id'))
                                        <div style="color:red">{{ $errors->first('lt_id')}}</div>
                                        @endif
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="lastname" class="control-label col-lg-3">Hạn đăng ký</label>

                                <div class="col-lg-6">
                                    {{-- @php
                                        $dt = \Datetime::createFromFormat('d/m/Y H:i:s', $Tour->tour_handk);
                                        $date = $dt->format('d/m/y\TH:i')
                                    @endphp --}}

                                <input  value="" class=" form-control"  name="tour_handk" type="datetime-local">


                                </div>
                                @if($errors->has('tour_handk'))
                                <div style="color:red">{{ $errors->first('tour_handk')}}</div>
                                @endif
                            </div>
                            <div class="form-group ">
                                <label for="username" class="control-label col-lg-3">Ngày bắt đầu</label>
                                <div class="col-lg-6">
                                    <input   value="" class="form-control "  name="tour_ngaybd" type="datetime-local">
                                </div>
                                @if($errors->has('tour_ngaybd'))
                                <div style="color:red">{{ $errors->first('tour_ngaybd')}}</div>
                                @endif
                            </div>
                            <div class="form-group ">
                                <label for="password" class="control-label col-lg-3">Ngày kết thúc</label>
                                <div class="col-lg-6">
                                    <input value="" class="form-control "  name="tour_ngaykt" type="datetime-local">
                                </div>
                                @if($errors->has('tour_ngaykt'))
                                <div style="color:red">{{ $errors->first('tour_ngaykt')}}</div>
                                @endif
                            </div>
                            <div class="form-group ">
                                <label for="confirm_password" class="control-label col-lg-3">Chi phí</label>
                                <div class="col-lg-6">
                                <input  value="{{$Tour->tour_chiphi}}" class="form-control "  name="tour_chiphi" type="number">
                                </div>
                                @if($errors->has('tour_chiphi'))
                                <div style="color:red">{{ $errors->first('tour_chiphi')}}</div>
                                @endif
                            </div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-3">Số lượng</label>
                                <div class="col-lg-6">
                                <input value="{{$Tour->tour_soluong}}" class="form-control "  name="tour_soluongtour_soluong" type="number">
                                </div>
                                @if($errors->has('tour_soluong'))
                                <div style="color:red">{{ $errors->first('tour_soluong')}}</div>
                                @endif
                            </div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-3">Phương tiện</label>
                                <div class="col-lg-6">
                                <input value="{{$Tour->tour_phuongtien}}" class="form-control "  name="tour_phuongtien" type="text">
                                </div>
                                @if($errors->has('tour_phuongtien'))
                                <div style="color:red">{{ $errors->first('tour_phuongtien')}}</div>
                                @endif
                            </div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-3">Địa điểm</label>
                                <div class="col-lg-6">
                                <input value="{{$Tour->tour_diadiem}}" class="form-control "  name="tour_diadiem" type="text">
                                </div>
                                @if($errors->has('tour_diadiem'))
                                <div style="color:red">{{ $errors->first('tour_diadiem')}}</div>
                                @endif
                            </div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-3">Trong năm</label>
                                <div class="col-lg-6">
                                <input value="{{$Tour->tour_trongnam}}" class="form-control "  name="tour_trongnam" type="number">
                                </div>
                                @if($errors->has('tour_trongnam'))
                                <div style="color:red">{{ $errors->first('tour_trongnam')}}</div>
                                @endif
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
