@extends('admin.layout.master')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm Đơn Vị    
            </header>
            <div class="panel-body">
                <div class="form" >
                    <form class="cmxform form-horizontal" enctype="multipart/form-data" id="signupForm" method="post" action="{{route('DV_XLSua',['id'=> $DonVisua->dv_id])}}" novalidate="novalidate">
                        <div class="form-group" style="mt-3">
                        <div class="flash-message">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                        </div>
                        </div>
                        {{-- Tên đơn vị --}}
                        @csrf
                        <div class="form-group ">
                            <label for="firstname" class="control-label col-lg-3">Tên đơn vị</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="" name="dv_ten" type="text" value="{{$DonVisua->dv_ten}}">
                                    @if($errors->has('dv_ten')) 
                                        <div style="color:red">{{ $errors->first('dv_ten')}}</div>
                                    @endif
                            </div>
                        </div>
                        {{-- Tên đơn vị--}}
                        {{-- Mô tả --}}
                        <div class="form-group ">
                            <label for="firstname" class="control-label col-lg-3">Mô tả đơn vị</label>
                            <div class="col-lg-6">
                                <textarea class="form-control" id="" name="dv_mota" type="text" style="resize: none" rows="8">{{$DonVisua->dv_mota}}</textarea>
                                    @if($errors->has('dv_mota')) 
                                        <div style="color:red">{{ $errors->first('dv_ten')}}</div>
                                    @endif
                            </div>
                        </div>
                        {{-- Mô tả--}}
                        {{-- Đơn vị trực thuộc --}}
                        <div class="form-group">
                            <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Đơn Vị trực thuộc</label>
                            <div class="col-lg-6">
                                <select class="form-control m-bot15" name="dv_tructhuoc_id">
                                    <option value="">Chọn đơn vị...</option>
                                    @foreach ($DonVi as $dv)
                                    @if($DonVisua->dv_tructhuoc_id == $dv->dv_id)
                                    <option selected value='{{$dv->dv_id}}'>{{$dv->dv_ten}}</option>
                                    @else
                                    <option value='{{$dv->dv_id}}'>{{$dv->dv_ten}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @if($errors->has('dv_id')) 
                                    <div style="color:red">{{ $errors->first('dv_id')}}</div>
                                @endif
                            </div>
                        </div>
                        {{-- Đơn vị trực thuộc --}}
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <button class="btn btn-primary" type="submit">Save</button>
                                <a href="{{route('DV_DanhSach')}}"><button class="btn btn-default" type="button">Cancel</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection