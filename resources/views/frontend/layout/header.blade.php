<header class="header-area">
    <!-- Search Form -->
    <div class="search-form d-flex align-items-center">
        <div class="container">
            <form action="{{route('TK_TOUR')}}" method="get">
                <input type="text" name="tu_khoa" id="searchFormInput" placeholder="Điền từ khóa...">
                <button type="submit"><i class="icon_search"></i></button>
            </form>
        </div>
    </div>
    <!-- Top Header Area Start -->
    <div class="top-header-area">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="top-header-content">
                        <a href="#"><i class="icon_phone"></i> <span>(84+) 18001260</span></a>
                        <a href="#"><i class="icon_mail"></i> <span>cskh@vnpt.com</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Header Area End -->

    <!-- Main Header Start -->
    <div class="main-header-area">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="robertoNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="index.html"><img src="upload/logo/.png" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- Menu Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul id="nav">
                                <li class="active"><a href="{{route('trangchu')}}">Trang chủ</a></li>
                                <li class="active"><a href="{{route('tourdadienra')}}">Tour Đã diễn ra</a></li>
                                @if (!isset($auth))
                            <li><a href="{{route('formLogin')}}">Đăng Nhập</a></li>
                                @else
                                <li><a href="#">{{$auth->cdv_username}}</a>
                                    
                                    <ul class="dropdown">
                                        <li><a href="{{route('proFile',['id'=>$auth->cdv_id])}}">Thông tin cá nhân</a></li>
                                        @if ($auth->cdv_quyen == 1)
                                        <li><a href="{{route('admin')}}">Về trang admin</a></li>
                                        @endif
                                        <li><a href="{{route('quanlytour')}}">Quản Lý Tour</a></li>
                                        <li><a href="{{route('formChange',['id'=>$auth->cdv_id])}}">Đổi Mật Khẩu</a></li>
                                        <li><a href="{{route('logout')}}">Đăng xuất</a></li>
                                    </ul>
                                    
                                </li>
                                @endif
                            </ul>
                            <!-- Search -->
                            <div class="search-btn ml-4">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </div>
                            <!-- Book Now -->

                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
