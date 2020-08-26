        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li class="sub-menu">
                    <a class="" href="index.html">
                        <i class="icon-sitemap"></i>
                        <span >Đơn Vị</span>
                    </a>
                        <ul class="sub">
                            <li><a href="{{route('DV_DanhSach')}}">Danh sách đơn vị</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="icon-user"></i>
                        <span>Quản lý công đoàn viên</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{route('CDV_DanhSach')}}">Danh Sách Công Đoàn Viên</a></li>
                       
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-car"></i>
                        <span>Quản lý Tour</span>
                    </a>
                    <ul class="sub">
                    <li><a href="{{route('TOUR_DanhSach')}}">Danh Sách Tour</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-calendar-o"></i>
                        <span>Quản lý Lịch Trình</span>
                    </a>
                    <ul class="sub">
                    <li><a href="{{route('LT_DanhSach')}}">Danh Sách Lịch Trình</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- sidebar menu end-->
