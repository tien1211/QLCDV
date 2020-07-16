        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="" href="index.html">
                        <i class="fa fa-dashboard"></i>
                        <span>Tổ Chức</span>
                    </a>
                        <ul class="sub">
                            <li><a href="{{route('TT_ToChuc')}}">Thông tin tổ chức</a></li>
                        <li><a href="{{route('CN_ToChuc')}}">Cập nhật thông tin tổ chức</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Quản lý công đoàn viên</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{route('CDV_DanhSach')}}">Danh Sách Công Đoàn Viên</a></li>
                    <li><a href="{{route('CDV_Them')}}">Thêm Công Đoàn Viên</a></li>
                        <li><a href="grids.html">Grids</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Quản lý Tour</span>
                    </a>
                    <ul class="sub">
                    <li><a href="{{route('TOUR_DanhSach')}}">Danh Sách Tour</a></li>
						<li><a href="{{route('TOUR_Them')}}">Thêm Tour</a></li>

                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Quản lý Lịch Trình</span>
                    </a>
                    <ul class="sub">
                    <li><a href="{{route('LT_DanhSach')}}">Danh Sách Lịch Trình</a></li>
						<li><a href="{{route('LT_Them')}}">Thêm Lịch Trình</a></li>
                         {{-- <li><a href="{{route('LT_Sua',$LichTrinh->id)}}">Sửa Lịch Trình</a></li> --}}
                        {{-- <li><a href="{{route('TOUR_Xoa',$Tour->id)}}">Xóa Tour</a></li> --}}
                    </ul>
                </li>
            </ul>
        </div>
        <!-- sidebar menu end-->
