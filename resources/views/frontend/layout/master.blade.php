<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>CÔNG ĐOÀN VIÊN</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="frontend/css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="frontend/css/coin-slider.css" />
<script type="text/javascript" src="frontend/js/cufon-yui.js"></script>
<script type="text/javascript" src="frontend/js/droid_sans_400-droid_sans_700.font.js"></script>
<script type="text/javascript" src="frontend/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="frontend/js/script.js"></script>
<script type="text/javascript" src="frontend/js/coin-slider.min.js"></script>
</head>
<body>
<div class="main">

<!-- HEADER -->
  <div class="header">
    @include('frontend.layout.header')
  </div>

<!-- HEADER --> 


  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        {{-- <div class="article">
          <h2><span>Excellent Solution</span> For Your Business</h2>
          <p class="infopost">Posted <span class="date">on 11 sep 2018</span> by <a href="#">Admin</a> &nbsp;&nbsp;|&nbsp;&nbsp; Filed under <a href="#">templates</a>, <a href="#">internet</a> <a href="#" class="com">Comments <span>11</span></a></p>
          <div class="clr"></div>
          <div class="img"><img src="frontend/images/img1.jpg" width="180" height="205" alt="" class="fl" /></div>
          <div class="post_content">
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. <a href="#">Suspendisse bibendum. Cras id urna.</a> Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu posuere nunc justo tempus leo. Donec mattis, purus nec placerat bibendum, dui pede condimentum odio, ac blandit ante orci ut diam. Cras fringilla magna. Phasellus suscipit, leo a pharetra condimentum, lorem tellus eleifend magna, eget fringilla velit magna id neque. Curabitur vel urna. In tristique orci porttitor ipsum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. Cras id urna. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu posuere nunc justo tempus leo.</p>
            <p><strong>Aenean consequat porttitor adipiscing. Nam pellentesque justo ut tortor congue lobortis. Donec venenatis sagittis fringilla.</strong> Etiam nec libero magna, et dictum velit. Proin mauris mauris, mattis eu elementum eget, commodo in nulla. Mauris posuere venenatis pretium. Maecenas a dui sed lorem aliquam dictum. Nunc urna leo, imperdiet eu bibendum ac, pretium ac massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla facilisi. Quisque condimentum luctus ullamcorper.</p>
            <p class="spec"><a href="#" class="rm">Read more</a></p>
          </div>
          <div class="clr"></div>
        </div>
         <p class="pages"><small>Page 1 of 2</small> <span>1</span> <a href="#">2</a> 
            <a href="#">&raquo;</a></p> --}}
        @yield('frontend_content')
       
      </div>
      
      
<!-- MENU 2 -->
      <div class="sidebar">
            @include('frontend.layout.menu');
      </div>
<!-- MENU 2 -->

      <div class="clr"></div>
    </div>
  </div>

<!-- FOOTER -->
  @include('frontend.layout.footer');

<!-- FOOTER -->

</div>
</body>
</html>
