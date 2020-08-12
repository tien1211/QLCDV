<!--header start-->
<header class="header fixed-top clearfix">
    <!--logo start-->
    <div class="brand">
    <a href="{{route('admin')}}" class="logo">
            QLCDV
        </a>
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars"></div>
        </div>
    </div>
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
        </ul>
        <!--  notification end -->
    </div>
    <div class="top-nav clearfix">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">
            <!-- user login dropdown start-->
            <li class="dropdown">
                @if (isset($auth))
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="upload/cdv/{{$auth->cdv_hinhanh}}">
                <span class="username">{{$auth->cdv_username}}</span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                <li><a href="{{route('trangchu')}}"><i class=" fa fa-suitcase"></i>Trở về trang chủ</a></li>
                <li><a href="{{route('logout')}}"><i class="fa fa-key"></i> Log Out</a></li>
                </ul>
                @else
                Không có cho vào nha!!
                @endif
            </li>
            <!-- user login dropdown end -->
        </ul>
        <!--search & user info end-->
    </div>
    </header>
    <!--header end-->