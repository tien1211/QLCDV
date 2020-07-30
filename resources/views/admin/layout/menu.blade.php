        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li class="sub-menu">
                    <a class="" href="index.html">
                        <i class="fa fa-dashboard"></i>
                        <span >Đơn Vị</span>
                    </a>
                        <ul class="sub">
                            <li><a href="{{route('DV_DanhSach')}}">Danh sách đơn vị</a></li>
                            {{-- <li><a href="{{route('DV_Them')}}">Thêm đơn vị</a></li> --}}
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
                    <li><a href="{{route('CDV_formImp')}}">Import File Danh Sách</a></li>
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

                {{-- <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Quản lý Đăng Ký Tour</span>
                    </a>
                    <ul class="sub">
                    <li><a href="{{route('DK_Tour_DanhSach')}}">Danh Sách Đăng ký Tour</a></li> --}}
						{{-- <li><a href="{{route('LT_Them')}}">Thêm Lịch Trình</a></li> --}}
                         {{-- <li><a href="{{route('LT_Sua',$LichTrinh->id)}}">Sửa Lịch Trình</a></li> --}}
                        {{-- <li><a href="{{route('TOUR_Xoa',$Tour->id)}}">Xóa Tour</a></li> --}}
                    {{-- </ul> --}}
                </li>
            </ul>
        </div>
        <!-- sidebar menu end-->
