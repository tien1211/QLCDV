@extends('admin.layout.master')
@section('admin_content')
<div class="row">
  <div class="col-lg-12">
      <section class="panel">
          <header class="panel-heading">
              Thêm Công Đoàn Viên
              
          </header>
          <div class="panel-body">
              <div class="form" >
                  <form class="cmxform form-horizontal" enctype="multipart/form-data" id="signupForm" method="get" action="" novalidate="novalidate">
                  {{-- Họ tên --}}
                    <div class="form-group ">
                      <label for="firstname" class="control-label col-lg-3">Họ Tên</label>
                      <div class="col-lg-6">
                          <input class=" form-control" id="" name="cdv_ten" type="text">
                      </div>
                    </div>
                  {{-- Họ tên --}}

                  {{-- Ngày Sinh --}}
                    <div class="form-group ">
                      <label for="firstname" class="control-label col-lg-3">Ngày Sinh</label>
                      <div class="col-lg-6">
                          <input class=" form-control" id="" name="cdv_ngaysinh" type="date">
                      </div>
                    </div>
                  {{-- Ngày Sinh --}}

                  {{-- Giới Tính --}}

                    <div class="form-group">
                      <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Giới tính</label>
                      <div class="col-lg-6">
                          <label class="checkbox-inline">
                              <input type="checkbox" id="inlineCheckbox1" name="cdv_gioitinh" value="1"> Nam
                          </label>
                          <label class="checkbox-inline">
                              <input type="checkbox" id="inlineCheckbox2" name="cdv_gioitinh" value="0"> Nữ
                          </label>
                      </div>
                    </div>
                  {{-- Giới Tính --}}

                  {{-- CMND --}}

                    <div class="form-group ">
                      <label for="firstname" class="control-label col-lg-3">CMND</label>
                      <div class="col-lg-6">
                          <input class=" form-control" id="" name="cdv_CMND" type="text">
                      </div>
                    </div>
                  {{-- CMND --}}


                  {{-- Nguyên Quán --}}
                    <div class="form-group ">
                      <label for="firstname" class="control-label col-lg-3">Nguyên quán</label>
                      <div class="col-lg-6">
                          <input class=" form-control" id="" name="cdv_nguyenquan" type="text">
                      </div>
                    </div>
                  {{-- Nguyên Quán --}}
                  

                  {{-- Địa Chỉ --}}
                    <div class="form-group ">
                      <label for="firstname" class="control-label col-lg-3">Địa Chỉ</label>
                      <div class="col-lg-6">
                          <input class=" form-control" id="" name="cdv_diachi" type="text">
                      </div>
                    </div>

                  {{-- Địa Chỉ --}}

                  {{-- Số điện thoại --}}
                    <div class="form-group ">
                      <label for="firstname" class="control-label col-lg-3">SĐT</label>
                      <div class="col-lg-6">
                          <input class=" form-control" id="" name="cdv_sdt" type="text">
                      </div>
                    </div>
                  {{-- Số điện thoại --}}


                  <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-3">Dân Tộc</label>
                    <div class="col-lg-6">
                        <input class=" form-control" id="" name="cdv_dantoc" type="text">
                    </div>
                  </div>



                  <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-3">Trình Độ</label>
                    <div class="col-lg-6">
                        <input class=" form-control" id="" name="cdv_trinhdo" type="text">
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-3">Tôn Giáo</label>
                    <div class="col-lg-6">
                        <input class=" form-control" id="" name="cdv_tongiao" type="text">
                    </div>
                  </div>
                  {{-- Email --}}
                    <div class="form-group ">
                      <label for="email" class="control-label col-lg-3">Email</label>
                      <div class="col-lg-6">
                          <input class="form-control " id="email" name="cdv_email" type="email">
                      </div>
                    </div>

                  {{-- Email --}}
                  
                  {{-- Chức vụ --}}
                  <div class="form-group">
                    <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Chức vụ</label>
                    <div class="col-lg-6">
                      <select class="form-control m-bot15">
                        @foreach ($ChucVu as $cv)
                        <option>Chọn mức chức vụ...</option>
                        <option value='{{$cv->cv_id}}'>{{$cv->cv_ten}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  {{-- chức vụ --}}


                  {{-- Loại Nhân viên --}}
                  <div class="form-group">
                    <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Loại Nhân Viên</label>
                    <div class="col-lg-6">
                      <select class="form-control m-bot15">
                        @foreach ($LoaiNhanVien as $lnv)
                        <option>Chọn mức loại nhân viên...</option>
                        <option value='{{$lnv->lnv_id}}'>{{$lnv->lnv_ten}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  {{-- Loại Nhân Viên --}}

                  {{-- Mức Hổ Trợ --}}
                  <div class="form-group">
                    <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Mức Hổ trợ</label>
                    <div class="col-lg-6">
                      <select class="form-control m-bot15">
                      @foreach ($MucHoTro as $mht)
                      <option>Chọn mức hổ trợ...</option>
                      <option value='{{$mht->mht_id}}'>{{$mht->mht_nam}}</option>
                      @endforeach
                    </select>

                        
                    </div>
                  </div>
                  {{-- Mức Hổ Trợ --}}

                  <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-3">Ngày Vào Công Đoàn</label>
                    <div class="col-lg-6">
                        <input class=" form-control" id="" name="cdv_ngayvaocd" type="date">
                    </div>
                  </div>


                  <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-3">Ngày Vào Ngành</label>
                    <div class="col-lg-6">
                        <input class=" form-control" id="" name="cdv_ngayvaonganh" type="date">
                    </div>
                  </div>

                      <div class="form-group ">
                          <label for="username" class="control-label col-lg-3">Username</label>
                          <div class="col-lg-6">
                              <input class="form-control " id="username" name="tk_tendangnhap" type="text">
                          </div>
                      </div>
                      <div class="form-group ">
                          <label for="password" class="control-label col-lg-3">Password</label>
                          <div class="col-lg-6">
                              <input class="form-control " id="password" name="tk_password" type="password">
                          </div>
                      </div>
                      <div class="form-group ">
                          <label for="confirm_password" class="control-label col-lg-3">Confirm Password</label>
                          <div class="col-lg-6">
                              <input class="form-control " id="confirm_password" name="confirm_password" type="password">
                          </div>
                      </div>
                      
                      <div class="form-group ">
                        <label for="confirm_password" class="control-label col-lg-3">Ảnh Đại Diện</label>
                        <div class="col-lg-6">
                            <input class="form-control " id="confirm_password" name="cdv_hinhanh" type="file">
                        </div>
                    </div>

                      <div class="form-group">
                          <div class="col-lg-offset-3 col-lg-6">
                              <button class="btn btn-primary" type="submit">Save</button>
                              <button class="btn btn-default" type="button">Cancel</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </section>
  </div>
</div>
@endsection