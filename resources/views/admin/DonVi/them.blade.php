@extends('admin.layout.master')
@section('admin_content')
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
                Thêm Đơn Vị
            </header>
            <div class="panel-body">
                <div class="form" >
                    <form class="cmxform form-horizontal" enctype="multipart/form-data" id="formDemo1" method="post" action="{{route('DV_XLThem')}}" novalidate="novalidate">
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
                            <input class=" form-control" id="dv_ten"  name="dv_ten" type="text">
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
                                <textarea class="form-control" id="dv_mota" name="dv_mota" type="text" style="resize: none" rows="8">{{old('dv_mota')}}</textarea>
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
                                <select class="form-control m-bot15"  name="dv_tructhuoc_id" id="dv_tructhuoc_id">
                                    <option value="">Chọn đơn vị...</option>
                                    @foreach ($DonVi as $dv)
                                    <option value='{{$dv->dv_id}}'>{{$dv->dv_ten}}</option>
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
                                <button class="btn btn-primary" onclick="return confirm('Bạn có thật sự muốn thêm không??')" type="submit">Save</button>
                                <a href="{{route('DV_DanhSach')}}"><button class="btn btn-default" type="button">Trở về</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@section('script')
<script>
    $("#formDemo1").validate({
        rules: {
            dv_ten: "required",
            dv_mota: "required",



        },
        messages: {
            dv_ten: "Vui lòng nhập tên đơn vị",
            dv_mota: "Vui lòng nhập mô tả",

        }
    });

    function myFunction(){
        alert('Thêm thành công');
    }
</script>
@endsection
