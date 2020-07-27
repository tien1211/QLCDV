@extends('admin.layout.master')
@section('admin_content')
<!--main content start-->
 <div class="panel panel-default">
    <div class="panel-heading">
      Danh Sách Công Đoàn Viên
    </div>
    <div class="panel-body">
        <div class="position-left">
            <form class="form-inline" role="form" action="{{route('CDV_Timkiem')}}" method="get">
            {{ csrf_field() }}
            <div class="form-group">
              <select onchange="timkiem()" class="form-control m-bot15" name="dv_id">
                <option  value="">Chọn đơn vị...</option>
                @foreach($DonVi as $dv)
                @if($dv->dv_id == $dv_id)
                <option selected value='{{$dv->dv_id}}'>{{$dv->dv_ten}}</option>
                @else
                <option value='{{$dv->dv_id}}'>{{$dv->dv_ten}}</option>
                @endif
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <select onchange="timkiem()" class="form-control m-bot15" name="lnv_id">
                <option value="">Chọn loại nhân viên...</option>
                @foreach($LoaiNhanVien as $lnv)
                @if($lnv->lnv_id == $lnv_id)
                <option selected value='{{$lnv->lnv_id}}'>{{$lnv->lnv_ten}}</option>
                @else
                <option value='{{$lnv->lnv_id}}'>{{$lnv->lnv_ten}}</option>
                @endif
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <select onchange="timkiem()" class="form-control m-bot15" name="cv_id">
                <option value="">Chọn chức vụ...</option>
                @foreach ($ChucVu as $cv)
                @if($cv->cv_id == $cv_id)
                <option selected value='{{$cv->cv_id}}'>{{$cv->cv_ten}}</option>
                @else
                <option  value='{{$cv->cv_id}}'>{{$cv->cv_ten}}</option>
                @endif
                @endforeach
              </select>
            </div>



            <div class="form-group">
                <input type="text" class="form-control" id="tukhoa" name="tukhoa">
            </div>
              
              
                
                <button type="submit" class="btn btn-outline-info" id="search"><i class=" glyphicon glyphicon-search"></i></button>
                <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-outline-info"><i class="glyphicon glyphicon-plus"></i></button>
              
        </form>
        
        </div>
        
        
    </div>
   



<!-- Button to Open the Modal -->


<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <center><h4 class="modal-title">Thêm Công Đoàn Viên</h4></center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="form" >

          <form class="cmxform form-horizontal" enctype="multipart/form-data" id="signupForm" method="post" action="{{route('CDV_XLThem')}}" novalidate="novalidate">
            @csrf
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
            {{-- Đơn Vị --}}
            <div class="form-group">
              <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Đơn Vị</label>
              <div class="col-lg-6">
                <select class="form-control m-bot15" value="{{old('dv_id')}}" name="dv_id">
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
            {{-- Đơn Vị --}}
           
           
            {{-- Chức vụ --}}
            <div class="form-group">
              <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Chức vụ</label>
              <div class="col-lg-6">
                <select class="form-control m-bot15" value="{{old('cv_id')}}" name="cv_id">
                  <option value="">Chọn chức vụ...</option>
                  @foreach ($ChucVu as $cv)
                  <option value='{{$cv->cv_id}}'>{{$cv->cv_ten}}</option>
                  @endforeach
                </select>
                @if($errors->has('cv_id')) 
                <div style="color:red">{{ $errors->first('cv_id')}}</div>
                @endif
              </div>
            </div>
            {{-- chức vụ --}}
            
            {{-- Loại Nhân viên --}}
            <div class="form-group">
              <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Loại Nhân Viên</label>
              <div class="col-lg-6">
                <select class="form-control m-bot15" value="{{old('lnv_id')}}" name="lnv_id">
                  <option value="">Chọn loại nhân viên...</option>
                  @foreach ($LoaiNhanVien as $lnv)
                  <option value='{{$lnv->lnv_id}}'>{{$lnv->lnv_ten}}</option>
                  @endforeach
                </select>
                @if($errors->has('lnv_id')) 
                <div style="color:red">{{ $errors->first('lnv_id')}}</div>
                @endif
              </div>
            </div>
            {{-- Loại Nhân Viên --}}
            
            
            
            {{-- Họ tên --}}
              
                <div class="form-group ">
                  <label for="firstname" class="control-label col-lg-3">Họ Tên</label>
                  <div class="col-lg-6">
                      <input class=" form-control" id="" value="{{old('cdv_ten')}}" name="cdv_ten" type="text">
                      
                    @if($errors->has('cdv_ten')) 
                    <div style="color:red">{{ $errors->first('cdv_ten')}}</div>
                    @endif
                  </div>
                </div>
              {{-- Họ tên --}}
              
              {{-- Ngày Sinh --}}
                <div class="form-group ">
                  <label for="firstname" class="control-label col-lg-3">Ngày Sinh</label>
                  <div class="col-lg-6">
                      <input class=" form-control" id="" value="{{old('cdv_ngaysinh')}}" name="cdv_ngaysinh" type="date">
                      @if($errors->has('cdv_ngaysinh')) 
                      <div style="color:red">{{ $errors->first('cdv_ngaysinh')}}</div>
                      @endif
                    </div>
                </div>
              {{-- Ngày Sinh --}}

              {{-- Giới Tính --}}

                <div class="form-group">
                  <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Giới tính</label>
                  <div class="col-lg-6">
                      <label class="radio-inline">
                          <input type="radio" id="inlineCheckbox1" name="cdv_gioitinh" value="1"> Nam
                      </label>
                      <label class="radio-inline">
                          <input type="radio" id="inlineCheckbox2" name="cdv_gioitinh" value="0"> Nữ
                      </label>
                      @if($errors->has('cdv_gioitinh')) 
                      <div style="color:red">{{ $errors->first('cdv_gioitinh')}}</div>
                      @endif
                  
                  </div>
                </div>
              {{-- Giới Tính --}}

              {{-- CMND --}}

                <div class="form-group ">
                  <label for="firstname" class="control-label col-lg-3">CMND</label>
                  <div class="col-lg-6">
                      <input class=" form-control" id="" value="{{old('cdv_cmnd')}}" name="cdv_cmnd" type="text">
                      @if($errors->has('cdv_cmnd')) 
                      <div style="color:red">{{ $errors->first('cdv_cmnd')}}</div>
                      @endif
                    </div>
                </div>
              {{-- CMND --}}


              {{-- Nguyên Quán --}}
                <div class="form-group ">
                  <label for="firstname" class="control-label col-lg-3">Nguyên quán</label>
                  <div class="col-lg-6">
                      <input class=" form-control" id="" value="{{old('cdv_nguyenquan')}}" name="cdv_nguyenquan" type="text">
                      @if($errors->has('cdv_nguyenquan')) 
                      <div style="color:red">{{ $errors->first('cdv_nguyenquan')}}</div>
                      @endif
                      
                    </div>
                </div>
              {{-- Nguyên Quán --}}
              

              {{-- Địa Chỉ --}}
                <div class="form-group ">
                  <label for="firstname" class="control-label col-lg-3">Địa Chỉ</label>
                  <div class="col-lg-6">
                      <input class=" form-control" id="" value="{{old('cdv_diachi')}}" name="cdv_diachi" type="text">
                      @if($errors->has('cdv_diachi')) 
                      <div style="color:red">{{ $errors->first('cdv_diachi')}}</div>
                      @endif
                    </div>
                </div>
              {{-- Địa Chỉ --}}

              {{-- Số điện thoại --}}
                <div class="form-group ">
                  <label for="firstname" class="control-label col-lg-3">SĐT</label>
                  <div class="col-lg-6">
                      <input class=" form-control" id="" value="{{old('cdv_sdt')}}" name="cdv_sdt" type="text">
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
                    <input class="form-control " id="email" value="{{old('cdv_email')}}" name="cdv_email" type="email">
                    @if($errors->has('cdv_email')) 
                    <div style="color:red">{{ $errors->first('cdv_email')}}</div>
                    @endif
                </div>
              </div>
            {{-- Email --}}


                {{-- Dân TỘc --}}
              <div class="form-group ">
                <label for="firstname" class="control-label col-lg-3">Dân Tộc</label>
                <div class="col-lg-6">
                    <input class=" form-control" id="" value="{{old('cdv_dantoc')}}" name="cdv_dantoc" type="text">
                    @if($errors->has('cdv_dantoc')) 
                    <div style="color:red">{{ $errors->first('cdv_dantoc')}}</div>
                    @endif
                  </div>
              </div>
              {{-- Dân Tộc --}}


              {{-- Trình Độ --}}
              <div class="form-group ">
                <label for="firstname" class="control-label col-lg-3">Trình Độ</label>
                <div class="col-lg-6">
                    <input class=" form-control" id="" value="{{old('cdv_trinhdo')}}" name="cdv_trinhdo" type="text">
                    @if($errors->has('cdv_trinhdo')) 
                    <div style="color:red">{{ $errors->first('cdv_trinhdo')}}</div>
                    @endif
                  </div>
              </div>
              {{-- Trình Độ --}}


              {{-- Tôn Giáo --}}
              <div class="form-group ">
                <label for="firstname" class="control-label col-lg-3">Tôn Giáo</label>
                <div class="col-lg-6">
                    <input class=" form-control" id="" value="{{old('cdv_tongiao')}}" name="cdv_tongiao" type="text">
                    @if($errors->has('cdv_tongiao')) 
                    <div style="color:red">{{ $errors->first('cdv_tongiao')}}</div>
                    @endif
                
                  </div>
              </div>
              {{-- Tôn Giáo --}}

              {{-- Ngày vào Công Đoàn --}}
              <div class="form-group ">
                <label for="firstname" class="control-label col-lg-3">Ngày Vào Thử Việc</label>
                <div class="col-lg-6">
                    <input class=" form-control" id="" value="{{old('cdv_ngaythuviec')}}" name="cdv_ngaythuviec" type="date">
                    @if($errors->has('cdv_ngaythuviec')) 
                    <div style="color:red">{{ $errors->first('cdv_ngaythuviec')}}</div>
                    @endif
                  </div>
              </div>
              {{-- Ngày vào Công Đoàn --}}

              {{-- Ngày vào ngành --}}
              <div class="form-group ">
                <label for="firstname" class="control-label col-lg-3">Ngày Vào Ngành</label>
                <div class="col-lg-6">
                    <input class=" form-control" value="{{old('cdv_ngayvaonganh')}}" id="" name="cdv_ngayvaonganh" type="date">
                    @if($errors->has('cdv_ngayvaonganh')) 
                    <div style="color:red">{{ $errors->first('cdv_ngayvaonganh')}}</div>
                    @endif
                  </div>
              </div>
              {{-- Ngày vào ngành --}}

              {{-- ảnh đại diện --}}
              <div class="form-group ">
                <label for="confirm_password" class="control-label col-lg-3">Ảnh Đại Diện</label>
                <div class="col-lg-6">
                    <input class="form-control " id="confirm_password" name="cdv_hinhanh" type="file">
                
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
                      <input class="form-control" value="{{old('cdv_username')}}" id="username" name="cdv_username" type="text">
                      
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
                          <input class="form-control " id="password" name="password" type="password">
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
                          <input class="form-control " id="confirm_password" name="confirm_password" type="password">
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
                          <input type="radio" id="inlineCheckbox1" name="cdv_quyen" value="1"> Admin
                      </label>
                      <label class="radio-inline">
                          <input type="radio" id="inlineCheckbox2" name="cdv_quyen" value="0"> Bình Thường
                      </label>
                      @if($errors->has('cdv_quyen')) 
                          <div style="color:red">{{ $errors->first('cdv_quyen')}}</div>
                          @endif 
                    </div>
                </div>
              {{-- Quyền --}}
                  
                  <div class="form-group">
                      <div class="col-lg-offset-3 col-lg-6">
                          <button class="btn btn-primary" type="submit">Save</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </form>
          </div>




      </div>

      <!-- Modal footer -->
      
    </div>
  </div>
</div>






    <div>
      <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
        <thead>
          <tr>
            <th data-breakpoints="xs">STT</th>
            <th>Đơn Vị</th>
            <th>Chức vụ</th>
            <th>Loại Nhân Viên</th>
            <th>Họ Tên</th>
            <th>Ngày Sinh</th>
            <th>Giới tính</th>
            <th>Nguyên quán</th>
            <th>Mức hổ trợ</th>
            <th>Chi Tiết</th>
            <th>Cập Nhật</th>
          </tr>
        </thead>
        <div class="form-group" style="mt-6">
          <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
              @if(Session::has('alert-' . $msg))
              <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="" class="close" d
              ata-dismiss="alert" aria-label="close">&times;</a></p>
              @endif
            @endforeach
        </div>
        </div>
        <tbody>
            @foreach ($CongDoanVien as $key => $cdv)
                
            @if ($cdv->cdv_trangthai == 1)
                <tr data-expanded="true">
                  
                    <td>{{$key + 1}}</td>
                    <td>{{$cdv->DonVi->dv_ten}}</td>
                    <td>{{$cdv->ChucVu->cv_ten}}</td>
                    <td>{{$cdv->LoaiNhanVien->lnv_ten}}</td>
                    <td>{{$cdv->cdv_ten}}</td>
                    <td>{{date('d/m/Y',strtotime($cdv->cdv_ngaysinh))}}</td>
                    @if($cdv->cdv_gioitinh == 1)
                    <td>Nam</td>
                    @else
                    <td>Nữ</td>
                    @endif
                <td>{{$cdv->cdv_nguyenquan}}</td>
                <td>{{number_format($cdv->MucHoTro->mht_phihotro)}} VNĐ</td>
                <td><a href="{{route('CDV_ChiTiet',['id'=>$cdv->cdv_id])}}"><button type="button" class="btn btn-outline-info">Chi Tiết</button></a></td>
                <td>
                  <i class='fas fa-pencil-alt'></i><a href="{{route('CDV_Sua',['id'=>$cdv->cdv_id])}}">Sửa</a>
                  <i class='fas fa-trash-alt'></i><a href="{{route('CDV_Xoa',['id'=>$cdv->cdv_id])}}" onclick="return confirm('Bạn có chắc muốn xóa không?');">Xóa</a>
                </td>
            </tr>
            @endif
          @endforeach
        </tbody>
      </table>
      <div class="panel-body">
        <div class="position-right">
          <div class="form-group">
            <center>{!! $CongDoanVien->links() !!}</center>
          </div>
            <a href="{{route('CDV_CNMHT')}}"><button type="button" class="btn btn-outline-info">Cập nhật mức hổ trợ</button></a>
        </div>
      </div>
    </div>
  </div>
</div>
<!--main content end-->
@endsection

@section('script')
    <script>  
        function timkiem(){
          document.getElementById('search').click();
        }
        
    </script>
@endsection