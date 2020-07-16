@extends('admin.layout.master')

@section('admin_content')


{{-- @if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $err)
            {{$err}}
        @endforeach

    </div>

@endif --}}

{{-- @if(session('thongbao'))
    <div class="alert alert-success">
          {{session('thongbao')}}
    </div>

@endif --}}


<form class="cmxform form-horizontal" enctype="multipart/form-data" method="post" action="{{route('LT_XLSua',['id'=> $LichTrinh->lt_id])}}" novalidate="novalidate" >

     @csrf

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                  Sửa Lịch Trình Du Lịch
                    <span class="tools pull-right">
                        <a class="fa fa-chevron-down" href="javascript:;"></a>
                        <a class="fa fa-cog" href="javascript:;"></a>
                        <a class="fa fa-times" href="javascript:;"></a>
                     </span>
                </header>

                <div class="panel-body">
                    <div class="form">


                        <form class="cmxform form-horizontal " enctype="multipart/form-data" id="signupForm" method="get" action="{{route('LT_XLSua',['id'=> $LichTrinh->lt_id])}}" novalidate="novalidate">
                            {{-- <div class="form-group ">
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
                            </div> --}}


                            <div class="form-group ">
                                <label for="lastname" class="control-label col-lg-3">Lịch Trình Tên</label>
                                <div class="col-lg-6">
                                    <input  class=" form-control"  name="lt_ten" value="{{$LichTrinh->lt_ten}}"  type="text">
                                </div>
                                @if($errors->has('lt_ten'))
                                <div style="color:red">{{ $errors->first('lt_ten')}}</div>
                                @endif
                            </div>


                            <div class="form-group ">
                                <label for="username" class="control-label col-lg-3">Lịch Trình File</label>
                                <div class="col-lg-6">
                                    <input   value="{{$LichTrinh->lt_file}}" class="form-control "  name="lt_file" type="text">
                                </div>
                                @if($errors->has('lt_file'))
                                <div style="color:red">{{ $errors->first('lt_file')}}</div>
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
