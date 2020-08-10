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
          <header class="panel-heading"  id="cdv_id">
              Thông Tin {{$CongDoanVien->ChucVu->cv_ten}}: {{$CongDoanVien->cdv_ten}}
          </header>
          <div class="panel-body">

              <div class="form" >
              <form class="cmxform form-horizontal"method="post" action="{{route('CDV_XLSua',['id'=>$CongDoanVien->cdv_id])}}" enctype="multipart/form-data" id="formDemo1" novalidate="novalidate">
                @csrf

                {{-- Mức Đơn vị --}}
                <div class="form-group" >
                  <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Đơn Vị</label>
                  <div class="col-lg-6">
                    <select class="form-control m-bot15" name="dv_id" id="dv_id">
                      <option value="">Chọn Đơn Vị...</option>
                    @foreach ($DonVi as $dv)
                    <option
                    @if ($CongDoanVien->dv_id  == $dv->dv_id)
                        {{"selected"}}
                      @endif
                    value='{{$dv->dv_id}}'>{{$dv->dv_ten}}</option>
                    @endforeach
                  </select>
                  @if($errors->has('dv_id'))
                    <div style="color:red">{{ $errors->first('dv_id')}}</div>
                    @endif
                  </div>
                </div>
                {{-- Mức Đơn vị --}}


                {{-- Chức vụ --}}
                <div class="form-group" >
                  <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Chức vụ</label>
                  <div class="col-lg-6">
                    <select class="form-control m-bot15" name="cv_id" id="cv_id">
                      <option value="">Chọn mức chức vụ...</option>
                      @foreach ($ChucVu as $cv)
                      <option
                      @if ($CongDoanVien->cv_id  == $cv->cv_id)
                        {{"selected"}}
                      @endif
                      value='{{$cv->cv_id}}'>{{$cv->cv_ten}}</option>
                      @endforeach
                    </select>
                    @if($errors->has('cv_id'))
                    <div style="color:red">{{ $errors->first('cv_id')}}</div>
                    @endif
                  </div>
                </div>
                {{-- chức vụ --}}

                {{-- Loại Nhân viên --}}
                <div class="form-group" >
                  <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Loại Nhân Viên</label>
                  <div class="col-lg-6">
                    <select class="form-control m-bot15" name="lnv_id" id="lnv_id">
                      <option value="">Chọn mức loại nhân viên...</option>
                      @foreach ($LoaiNhanVien as $lnv)
                      <option
                      @if ($CongDoanVien->lnv_id  == $lnv->lnv_id)
                        {{"selected"}}
                      @endif
                      value='{{$lnv->lnv_id}}'>{{$lnv->lnv_ten}}</option>
                      @endforeach
                    </select>
                    @if($errors->has('lnv_id'))
                    <div style="color:red">{{ $errors->first('lnv_id')}}</div>
                    @endif
                  </div>
                </div>
                {{-- Loại Nhân Viên --}}



                {{-- Họ tên --}}
                  @csrf
                    <div class="form-group " >
                      <label for="firstname" class="control-label col-lg-3">Họ Tên</label>
                      <div class="col-lg-6">
                          <input class=" form-control"  value="{{$CongDoanVien->cdv_ten}}" name="cdv_ten" type="text" id="cdv_ten">

                        @if($errors->has('cdv_ten'))
                        <div style="color:red">{{ $errors->first('cdv_ten')}}</div>
                        @endif
                      </div>
                    </div>
                  {{-- Họ tên --}}

                  {{-- Ngày Sinh --}}
                    <div class="form-group " >
                      <label for="firstname" class="control-label col-lg-3">Ngày Sinh</label>
                      <div class="col-lg-6">

                      <input class=" form-control" id="cdv_ngaysinh" value="{{$CongDoanVien->cdv_ngaysinh}}" name="cdv_ngaysinh" type="date">


                      @if($errors->has('cdv_ngaysinh'))
                          <div style="color:red">{{ $errors->first('cdv_ngaysinh')}}</div>
                          @endif
                        </div>
                    </div>
                  {{-- Ngày Sinh --}}

                  {{-- Giới Tính --}}

                    <div class="form-group" >
                      <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Giới tính</label>
                      <div class="col-lg-6">
                          <label class="radio-inline">
                              <input type="radio" id="cdv_gioitinh" name="cdv_gioitinh" value="1" @if($CongDoanVien->cdv_gioitinh == 1)
                              checked
                             @endif> Nam
                          </label>
                          <label class="radio-inline">
                              <input type="radio" id="cdv_gioitinh" name="cdv_gioitinh" value="0"  @if($CongDoanVien->cdv_gioitinh == 0)
                              checked
                             @endif> Nữ
                          </label>
                          @if($errors->has('cdv_gioitinh'))
                          <div style="color:red">{{ $errors->first('cdv_gioitinh')}}</div>
                          @endif

                      </div>
                    </div>
                  {{-- Giới Tính --}}

                  {{-- CMND --}}

                    <div class="form-group " >
                      <label for="firstname" class="control-label col-lg-3">CMND</label>
                      <div class="col-lg-6">
                      <input class=" form-control" id="cdv_cmnd" value="{{$CongDoanVien->cdv_cmnd}}" name="cdv_cmnd" type="text">
                          @if($errors->has('cdv_cmnd'))
                          <div style="color:red">{{ $errors->first('cdv_cmnd')}}</div>
                          @endif
                        </div>
                    </div>
                  {{-- CMND --}}


                  {{-- Nguyên Quán --}}
                    <div class="form-group " >
                      <label for="firstname" class="control-label col-lg-3">Nguyên quán</label>
                      <div class="col-lg-6">
                      <input class=" form-control" id="cdv_nguyenquan" value="{{$CongDoanVien->cdv_nguyenquan}}" name="cdv_nguyenquan" type="text">
                          @if($errors->has('cdv_nguyenquan'))
                          <div style="color:red">{{ $errors->first('cdv_nguyenquan')}}</div>
                          @endif

                        </div>
                    </div>
                  {{-- Nguyên Quán --}}


                  {{-- Địa Chỉ --}}
                    <div class="form-group " >
                      <label for="firstname" class="control-label col-lg-3">Địa Chỉ</label>
                      <div class="col-lg-6">
                      <input class=" form-control" id="cdv_diachi" value="{{$CongDoanVien->cdv_diachi}}" name="cdv_diachi" type="text">
                          @if($errors->has('cdv_diachi'))
                          <div style="color:red">{{ $errors->first('cdv_diachi')}}</div>
                          @endif
                        </div>
                    </div>

                  {{-- Địa Chỉ --}}

                  {{-- Số điện thoại --}}
                    <div class="form-group " >
                      <label for="firstname" class="control-label col-lg-3">SĐT</label>
                      <div class="col-lg-6">
                      <input class=" form-control" id="cdv_sdt" value="{{$CongDoanVien->cdv_sdt}}" name="cdv_sdt" type="text">
                          @if($errors->has('cdv_sdt'))
                          <div style="color:red">{{ $errors->first('cdv_sdt')}}</div>
                          @endif
                      </div>
                    </div>
                  {{-- Số điện thoại --}}


                  {{-- Email --}}
                  <div class="form-group ">
                    <label for="email" class="control-label col-lg-3">Email</label>
                    <div class="col-lg-6">
                    <input class="form-control "  id="cdv_email" value="{{$CongDoanVien->cdv_email}}" name="cdv_email" type="email">
                        @if($errors->has('cdv_email'))
                        <div style="color:red">{{ $errors->first('cdv_email')}}</div>
                        @endif
                    </div>
                  </div>

                {{-- Email --}}


                    {{-- Dân TỘc --}}
                  <div class="form-group " >
                    <label for="firstname" class="control-label col-lg-3">Dân Tộc</label>
                    <div class="col-lg-6">
                    <input class=" form-control" id="cdv_dantoc" value="{{$CongDoanVien->cdv_dantoc}}" name="cdv_dantoc" type="text">
                        @if($errors->has('cdv_dantoc'))
                        <div style="color:red">{{ $errors->first('cdv_dantoc')}}</div>
                        @endif
                      </div>
                  </div>
                  {{-- Dân Tộc --}}

                  {{-- Trình Độ --}}
                  <div class="form-group " >
                    <label for="firstname" class="control-label col-lg-3">Trình Độ</label>
                    <div class="col-lg-6">
                        <input class=" form-control" id="cdv_trinhdo" value="{{$CongDoanVien->cdv_trinhdo}}" name="cdv_trinhdo" type="text">
                        @if($errors->has('cdv_trinhdo'))
                        <div style="color:red">{{ $errors->first('cdv_trinhdo')}}</div>
                        @endif
                      </div>
                  </div>
                  {{-- Trình Độ --}}


                  {{-- Tôn Giáo --}}
                  <div class="form-group " >
                    <label for="firstname" class="control-label col-lg-3">Tôn Giáo</label>
                    <div class="col-lg-6">
                        <input class=" form-control" id="cdv_tongiao" value="{{$CongDoanVien->cdv_tongiao}}" name="cdv_tongiao" type="text">
                        @if($errors->has('cdv_tongiao'))
                        <div style="color:red">{{ $errors->first('cdv_tongiao')}}</div>
                        @endif

                      </div>
                  </div>
                  {{-- Tôn Giáo --}}

                  {{-- Ngày vào thử việc --}}
                  <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-3">Ngày Vào Công Đoàn</label>
                    <div class="col-lg-6">
                        <input class=" form-control" id="cdv_ngaythuviec" value="{{$CongDoanVien->cdv_ngaythuviec}}" name="cdv_ngaythuviec" type="date">
                        @if($errors->has('cdv_ngaythuviec'))
                        <div style="color:red">{{ $errors->first('cdv_ngaythuviec')}}</div>
                        @endif
                      </div>
                  </div>
                  {{-- Ngày vào thử việc --}}

                  {{-- Ngày vào ngành --}}
                  <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-3">Ngày Vào Ngành</label>
                    <div class="col-lg-6">
                        <input class=" form-control" id="cdv_ngayvaonganh" value="{{$CongDoanVien->cdv_ngayvaonganh}}" name="cdv_ngayvaonganh" type="date">
                        @if($errors->has('cdv_ngayvaonganh'))
                        <div style="color:red">{{ $errors->first('cdv_ngayvaonganh')}}</div>
                        @endif
                      </div>
                  </div>
                  {{-- Ngày vào ngành --}}



                  {{-- ảnh đại diện --}}

                  <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-3">Ảnh Đại Diện</label>
                    <div class="col-lg-6">
                      <img alt="" src="upload/cdv/{{$CongDoanVien->cdv_hinhanh}}" style="width: 15rem">
                      </div>
                  </div>
                  <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-3">Ảnh Đại Diện</label>
                    <div class="col-lg-6">
                        <input class="form-control " id="cdv_hinhanh" name="cdv_hinhanh" type="file">

                        @if($errors->has('cdv_hinhanh'))
                        <div style="color:red">{{ $errors->first('cdv_hinhanh')}}</div>
                        @endif
                      </div>
                  </div>
                  {{-- ảnh đại diện --}}


                  {{-- Tên đăng nhập --}}
                      <div class="form-group ">
                          <label for="username" class="control-label col-lg-3">Username</label>
                          <div class="col-lg-6">
                          <input class="form-control " id="cdv_username" value="{{$CongDoanVien->cdv_username}}"  name="tk_tendangnhap" type="text" disabled>

                              @if($errors->has('cdv_username'))
                              <div style="color:red">{{ $errors->first('cdv_username')}}</div>
                              @endif
                            </div>
                      </div>

                   {{-- Tên Đăng nhập    --}}

                   {{-- Mật khẩu --}}

                      <div class="form-group ">
                          <label for="password" class="control-label col-lg-3">Password</label>
                          <div class="col-lg-6">
                            <h5><input type="checkbox" id="changepassword" name="changepassword"> Đổi mật khẩu:</h5>
                              <input class="form-control password" id="cdv_password" name="password" type="password" disabled="">
                              @if($errors->has('password'))
                              <div style="color:red">{{ $errors->first('password')}}</div>
                              @endif
                            </div>
                      </div>
                      {{-- Mật khẩu --}}

                      {{-- Xác nhận mật khảu --}}
                      <div class="form-group ">
                          <label for="confirm_password" class="control-label col-lg-3">Confirm Password</label>
                          <div class="col-lg-6">
                              <input class="form-control password" id="cdv_password" name="confirm_password" type="password" disabled="">
                              @if($errors->has('confirm_password'))
                              <div style="color:red">{{ $errors->first('confirm_password')}}</div>
                              @endif
                          </div>
                      </div>
                      {{-- Xác nhận mật khẩu --}}


                      {{-- Quyền --}}

                    <div class="form-group">
                      <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Quyền</label>
                      <div class="col-lg-6">
                          <label class="radio-inline">
                              <input type="radio" id="cdv_quyen" name="cdv_quyen" value="1" @if($CongDoanVien->cdv_quyen == 1)
                              checked
                             @endif> Admin
                          </label>
                          <label class="radio-inline">
                              <input type="radio" id="cdv_quyen" name="cdv_quyen" value="0" @if($CongDoanVien->cdv_quyen == 0)
                              checked
                             @endif> Bình Thường
                          </label>
                          @if($errors->has('cdv_quyen'))
                              <div style="color:red">{{ $errors->first('cdv_quyen')}}</div>
                              @endif
                        </div>
                    </div>
                  {{-- Quyền --}}

                      <div class="form-group">
                          <div class="col-lg-offset-3 col-lg-6">
                              <button class="btn btn-primary" type="submit" onclick="return confirm('Bạn có chắc muốn cập nhật không?');">Update</button>
                          <a href="{{route('CDV_DanhSach')}}"><button class="btn btn-default" type="button">Cancel</button></a>
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
<script type="text/javascript">
    $(document).ready(function(){
        $("#changepassword").change(function(){
            if($(this).is(":checked")){
                $(".password").removeAttr('disabled');
            }else{
                $(".password").attr('disabled','');
            }
        });
    });



    $("#formDemo1").validate({
        rules: {
            dv_id: "required",
            cv_id: "required",
            lnv_id: "required",
            // mht_id: "required",
            cdv_ten: "required",
            cdv_ngaysinh: "required",
            cdv_gioitinh: "required",
            cdv_cmnd: "required",
            cdv_nguyenquan: "required",
            cdv_diachi: "required",
            cdv_sdt: "required",
            cdv_email: "required",
            cdv_dantoc: "required",
            cdv_trinhdo: "required",
            cdv_tongiao: "required",
            cdv_ngaythuviec: "required",
            cdv_ngayvaonganh: "required",
            // cdv_trangthai: "required",
            cdv_hinhanh: "required",
            cdv_username: "required",
            cdv_password: "required",
            cdv_confirmpassword: "required",
            cdv_quyen: "required",
        },
        messages: {
            dv_id: "Vui lòng chọn đơn vị",
            cv_id: "Vui lòng chọn chức vụ",
            lnv_id: "Vui lòng chọn loại nhân viên",
            // mht_id: "Vui lòng nhâp",
            cdv_ten: "Vui lòng nhập tên công đoàn viên",
            cdv_ngaysinh: "Vui lòng nhập ngày sinh",
            cdv_gioitinh: "Vui lòng chọn giới tính",
            cdv_cmnd: "Vui lòng nhập CMND",
            cdv_nguyenquan: "Vui lòng chọn nguyên quán",
            cdv_diachi: "Vui lòng nhập địa chỉ",
            cdv_sdt: "Vui lòng nhập SĐT",
            cdv_email: "Vui lòng nhập Email",
            cdv_dantoc: "Vui lòng nhập dân tộc",
            cdv_trinhdo: "Vui lòng nhập trình độ",
            cdv_tongiao: "Vui lòng nhập tôn giáo",
            cdv_ngaythuviec: "Vui lòng nhập ngày thử việc",
            cdv_ngayvaonganh: "Vui lòng nhập ngày vào nghành",
            // cdv_trangthai: "",
            cdv_hinhanh: "Vui lòng chọn hình ảnh",
            cdv_username: "Vui lòng nhập username",
            cdv_password: "Vui lòng nhập password",
            cdv_confirmpassword: "Vui lòng nhập lại password",
            cdv_quyen: "Vui lòng chọn quyền",
        }
    });



    // $.ajaxSetup({
    //   headers: {
    //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //   }
    // });
    //     //xử lý khi có sự kiện click
    //     $('#formDemo1').on('submit', function (e) {
    //         //Lấy ra files
    //         e.preventDefault();
    //         var dv_id = $('#dv_id').val();
    //         var  cv_id = $('#cv_id').val();
    //         var lnv_id = $('#lnv_id').val();
    //         var cdv_ten = $('#cdv_ten').val();

    //         var cdv_ngaysinh = $('#cdv_ngaysinh').val();
    //         var cdv_gioitinh = $('#cdv_gioitinh').val();
    //         var cdv_cmnd = $('#cdv_cmnd ').val();
    //         var cdv_nguyenquan = $('#cdv_nguyenquan').val();
    //         var cdv_diachi = $('#cdv_diachi').val();
    //         var cdv_sdt = $('#cdv_sdt ').val();
    //         var cdv_email = $('#cdv_email ').val();
    //         var cdv_dantoc = $('#cdv_dantoc').val();

    //         var cdv_trinhdo = $('#cdv_trinhdo').val();
    //         var cdv_tongiao = $('#cdv_tongiao ').val();
    //         var cdv_ngaythuviec = $('#cdv_ngaythuviec').val();
    //         var cdv_ngayvaonganh = $('#cdv_ngayvaonganh').val();
    //         var cdv_username = $('#cdv_username').val();
    //         var cdv_password = $('#cdv_password').val();
    //         var cdv_quyen = $('#cdv_quyen').val();

    //         var file_data = $('#cdv_hinhanh').prop('files')[0];
    //         //console.log(file_data);
    //         var type ="";
    //         //lấy ra kiểu file
    //         if(file_data){
    //             type = file_data.type;
    //         }


    //         //Xét kiểu file được upload
    //         var match = ["image/gif", "image/png", "image/jpg",];
    //         //kiểm tra kiểu file
    //         if (type == match[0] || type == match[1] || type == match[2] || !file_data) {
    //             //khởi tạo đối tượng form data
    //             var form_data = new FormData();

    //             form_data.append(' dv_id',  dv_id);
    //             form_data.append('cv_id', cv_id);
    //             form_data.append('lnv_id', lnv_id);
    //             form_data.append('cdv_ten', cdv_ten);
    //             form_data.append('cdv_ngaysinh', cdv_ngaysinh);
    //             form_data.append('cdv_gioitinh', cdv_gioitinh);
    //             form_data.append('cdv_cmnd', cdv_cmnd);
    //             form_data.append('cdv_nguyenquan', cdv_nguyenquan);
    //             form_data.append('cdv_diachi', cdv_diachi);
    //             form_data.append('cdv_sdt', cdv_sdt);
    //             form_data.append('cdv_email', cdv_email);
    //             form_data.append('cdv_dantoc', cdv_dantoc);
    //             form_data.append('cdv_trinhdo', cdv_trinhdo);
    //             form_data.append('cdv_tongiao', cdv_tongiao);
    //             form_data.append('cdv_ngaythuviec', cdv_ngaythuviec);
    //             form_data.append('cdv_ngayvaonganh', cdv_ngayvaonganh);
    //             form_data.append('cdv_username', cdv_username);
    //             form_data.append('cdv_password', cdv_password);
    //             form_data.append('cdv_quyen', cdv_quyen);

    //             form_data.append('cdv_hinhanh', file_data);

    //             //sử dụng ajax post
    //             $.ajax({
    //                 url: "{{route('CDV_XLSua',['id'=>$CongDoanVien->cdv_id])}}", // gửi đến file upload.php
    //                 dataType: 'text',
    //                 cache: false,
    //                 contentType: false,
    //                 processData: false,
    //                 data:form_data,
    //                 type: 'post',
    //                 success: function (res) {
    //                     $('.status').text(res);
    //                     $('#cdv_hinhanh').val('');
    //                 window.location =" {{route('CDV_DanhSach')}}";


    //                 }
    //             });
    //         }

    //         return false;
    //     });
</script>


@endsection
