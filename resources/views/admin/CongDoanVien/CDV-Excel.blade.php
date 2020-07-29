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
        <th data-breakpoints="xs">id</th>
        <th>Đơn Vị</th>
        <th>Chức Vụ</th>
        <th>Loại Nhân Viên</th>
        <th>Mức Hổ Trợ</th>
        <th>Họ Tên</th>
        <th>Ngày Sinh</th>
        <th>Giới Tính</th>
        <th>CMND</th>
        <th>Nguyên Quán</th>
        <th>Địa Chỉ</th>
        <th>SDT</th>
        <th>Email</th>
        <th>Dân Tộc</th>
        <th>Trình Độ</th>
        <th>Tôn Giáo</th>
        <th>Ngày Thử Việc</th>
        <th>Ngày Vào Ngành</th>
        <th>Tên Đăng Nhập</th>
        <th>Mật Khẩu</th>
        <th>Quyền</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($CongDoanVien as $key => $cdv)
            <tr data-expanded="true">
                <td>{{$cdv->cdv_id}}</td>
                <td>{{$cdv->DonVi->dv_ten}}</td>
                <td>{{$cdv->ChucVu->cv_ten}}</td>
                <td>{{$cdv->LoaiNhanVien->lnv_ten}}</td>
                <td>{{number_format($cdv->MucHoTro->mht_phihotro)}} VNĐ</td>
                <td>{{$cdv->cdv_ten}}</td>
                <td>{{date('d/m/Y',strtotime($cdv->cdv_ngaysinh))}}</td>
                
                @if($cdv->cdv_gioitinh == 1)
                <td>Nam</td>
                @else
                <td>Nữ</td>
                @endif

                <td>{{$cdv->cdv_cmnd}}</td>
                <td>{{$cdv->cdv_nguyenquan}}</td>
                <td>{{$cdv->cdv_diachi}}</td>
                <td>{{$cdv->cdv_sdt}}</td>
                <td>{{$cdv->cdv_email}}</td>
                <td>{{$cdv->cdv_dantoc}}</td>
                <td>{{$cdv->cdv_trinhdo}}</td>
                <td>{{$cdv->cdv_tongiao}}</td>
                <td>{{date('d/m/Y',strtotime($cdv->cdv_ngaythuviec))}}</td>
                <td>{{date('d/m/Y',strtotime($cdv->cdv_ngayvaonganh))}}</td>
                <td>{{$cdv->cdv_username}}</td>
                <td>{{$cdv->password}}</td>

                @if($cdv->cdv_quyen == 1)
                <td>Admin</td>
                @else
                <td>Thường</td>
                @endif
        </tr>
      @endforeach
    </tbody>
  </table>