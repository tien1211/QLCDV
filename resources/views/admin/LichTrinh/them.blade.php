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
                Thêm Lịch Trình
                </header>
                <div class="panel-body">
                    <div class="form">
                        <form class="cmxform form-horizontal " enctype="multipart/form-data" action="{{route('LT_XLThem')}}" id="formDemo1" method="post"  novalidate="novalidate">
                            {{csrf_field()}}

                            <div class="form-group ">
                                <label for="lastname" class="control-label col-lg-3"> Lịch Trình Tên</label>
                                <div class="col-lg-6">
                                <input class=" form-control" value="{{old('lt_ten')}}"  name="lt_ten" id="lt_ten" type="text">
                                    @if($errors->has('lt_ten'))
                                    <div style="color:red">{{ $errors->first('lt_ten')}}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="username" class="control-label col-lg-3">Lịch Trình File</label>
                                <div class="col-lg-6">
                                    <input class="form-control "  name="lt_file" id="lt_file" type="file" accept=".doc,.docx,.pdf" >
                                    @if($errors->has('lt_file'))
                                    <div style="color:red">{{ $errors->first('lt_file')}}</div>
                                    @endif
                                </div>
                            </div>
                            {{-- Mô tả --}}
                            <div class="form-group ">
                                <label for="firstname" class="control-label col-lg-3">Mô tả</label>
                                <div class="col-lg-6">
                                <textarea class="form-control" id="lt_mota" name="lt_mota" type="text" style="resize: none" rows="8">{{old('lt_mota')}}</textarea>
                                        @if($errors->has('lt_mota'))
                                            <div style="color:red">{{ $errors->first('lt_mota')}}</div>
                                        @endif
                                </div>
                            </div>
                            {{-- Mô tả--}}
                            <div class="form-group">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <a href=""> <button class="btn btn-primary" onclick="return confirm('Bạn có thật sự muốn thêm không??')" id="submit" type="submit">Lưu</button></a>
                                    <a href="{{route('LT_DanhSach')}}"><button class="btn btn-default" type="button">Trở về</button></a>
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
    //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
    $("#formDemo1").validate({
        rules: {
            lt_ten: "required",
            lt_file: "required",
            lt_mota: "required",

        },
        messages: {
            lt_ten: "Vui lòng nhập tên Lịch trình",
            lt_file: "Vui lòng chọn file Lịch trình",
            lt_mota: "Vui lòng điền mô tả",
        }
    });


    </script>

@endsection
