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
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                Sửa Lịch Trình Du Lịch
                </header>
                <div class="panel-body">
                    <div class="form">
                        <form class="cmxform form-horizontal " enctype="multipart/form-data" id="formDemo1" method="post" action="{{route('LT_XLSua',['id'=> $LichTrinh->lt_id])}}" novalidate="novalidate">
                        {{ csrf_field() }}
                        <div class="form-group" style="mt-3">
                            <div class="flash-message">
                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" d
                                ata-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                                @endforeach
                            </div>
                        </div>
                <div class="form-group ">
                                <label for="lastname" class="control-label col-lg-3">Lịch Trình Tên</label>
                                <div class="col-lg-6">
                                    <input  class=" form-control"  id="lt_ten" name="lt_ten" value="{{$LichTrinh->lt_ten}}"  type="text">
                                </div>
                                @if($errors->has('lt_ten'))
                                <div style="color:red">{{ $errors->first('lt_ten')}}</div>
                                @endif
                            </div>
                            <div class="form-group ">
                                <label for="username" class="control-label col-lg-3">Lịch Trình File</label>
                                <div class="col-lg-6">
                                    <input value="{{$LichTrinh->lt_file}}" class="form-control "  name="lt_file" id="lt_file" type="file">
                                    <a href="{{url('upload/lichtrinh/'.$LichTrinh->lt_file)}}" name="lt_file_cu">{{$LichTrinh->lt_file}}</a>
                                </div>
                                @if($errors->has('lt_file'))
                                <div style="color:red">{{ $errors->first('lt_file')}}</div>
                                @endif
                            </div>
                            {{-- Mô tả --}}
                            <div class="form-group ">
                                <label for="firstname" class="control-label col-lg-3">Mô tả</label>
                                <div class="col-lg-6">
                                    <textarea class="form-control" id="lt_mota" name="lt_mota" type="text" style="resize: none" rows="8"> {{$LichTrinh->lt_mota}} </textarea>
                                        @if($errors->has('lt_mota'))
                                            <div style="color:red">{{ $errors->first('lt_mota')}}</div>
                                        @endif
                                </div>
                            </div>
                            {{-- Mô tả--}}
                            <div class="form-group">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <button class="btn btn-primary" onclick="return confirm('Bạn có thật sự muốn cập nhật không??')" id="submit" type="submit">Lưu</button>
                                <a href="{{route('LT_DanhSach')}}"><button class="btn btn-default" type="button">Thoát</button></a>
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


