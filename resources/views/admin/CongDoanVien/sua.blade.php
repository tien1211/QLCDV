@extends('admin.layout.master')
@section('admin_content')
<div class="row">
  <div class="col-lg-12">

      <section class="panel">
          <header class="panel-heading"  id="cdv_id">
              Thông Tin {{$CongDoanVien->ChucVu->cv_ten}}: {{$CongDoanVien->cdv_ten}}
          </header>
          <div class="panel-body">

              <div class="form" >
              <form class="cmxform form-horizontal" enctype="multipart/form-data" id="signupForm" novalidate="novalidate">
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
                        <input class=" form-control" id="cdv_ngayvaonghanh" value="{{$CongDoanVien->cdv_ngayvaonganh}}" name="cdv_ngayvaonganh" type="date">
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
                              <input class="form-control password" id="password" name="password" type="password" disabled="">
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
                              <input class="form-control password" id="password" name="confirm_password" type="password" disabled="">
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

</script>

<script type="text/javascript">

    $('#signupForm').on('submit',function(event){
        event.preventDefault();

        cdv_id = $('#cdv_id').val();
        dv_id = $('#dv_id ').val();
        cv_id = $('#cv_id').val();
        lnv_id = $('#lnv_id').val();
        mht_id = $('#mht_id').val();
        cdv_ten = $('#cdv_ten').val();
        cdv_ngaysinh = $('#cdv_ngaysinh').val();
        cdv_gioitinh = $('#cdv_gioitinh').val();
        cdv_cmnd = $('#cdv_cmnd').val();
        cdv_nguyenquan = $('#cdv_nguyenquan').val();
        cdv_diachi = $('#cdv_diachi').val();
        cdv_sdt = $('#cdv_sdt').val();
        cdv_email = $('#cdv_email').val();
        cdv_dantoc = $('#cdv_dantoc').val();
        cdv_trinhdo = $('#cdv_trinhdo').val();
        cdv_tongiao = $('#cdv_tongiao').val();
        cdv_ngaythuviec = $('#cdv_ngaythuviec').val();
        cdv_ngayvaonganh = $('#cdv_ngayvaonganh').val();
        cdv_trangthai = $('#cdv_trangthai').val();
        cdv_hinhanh = $('#cdv_hinhanh').val();
        cdv_username = $('#cdv_username').val();
        password = $('#password').val();
        password = $('#cdv_quyen').val();
        $.ajax({
          url: "{{route('CDV_XLSua',['id'=> $CongDoanVien->cdv_id])}}",
          type:"POST",
          data:{
            "_token": "{{ csrf_token() }}",
            cdv_id:cdv_id  ,
            dv_id:dv_id ,
            cv_id :cv_id,
            lnv_id :lnv_id,
            mht_id : mht_id ,
            cdv_ten : cdv_ten,
            cdv_ngaysinh : cdv_ngaysinh,
            cdv_gioitinh : cdv_gioitinh ,
            cdv_cmnd : cdv_cmnd ,
            cdv_nguyenquan : cdv_nguyenquan,
            cdv_diachi : cdv_diachi,
            cdv_sdt : cdv_sdt,
            cdv_email : cdv_email,
            cdv_dantoc : cdv_dantoc,
            cdv_trinhdo : cdv_trinhdo,
            cdv_tongiao : cdv_tongiao,
            cdv_ngaythuviec : cdv_ngaythuviec,
            cdv_ngayvaonganh : cdv_ngayvaonganh,
            cdv_trangthai : cdv_trangthai,
            cdv_hinhanh : cdv_hinhanh,
            cdv_username : cdv_username,
            password : password,
            cdv_quyen : cdv_quyen,
          },
          success:function(response){
            console.log(response);
          },
         });
        });
      </script>

@endsection
