<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Quản Lý Công Đoàn Viên</title>
    <base href="{{asset('')}}">
    <!-- Favicon -->
    {{-- <link rel="icon" href="frontend/img/core-img/favicon.png"> --}}

    <!-- Stylesheet -->
    <link rel="stylesheet" href="frontend/style.css">
    <link rel="stylesheet" href="frontend/scss/_heading.scss">
    <link rel="stylesheet" href="frontend/scss/_spacing.scss">
    <link rel="stylesheet" href="frontend/scss/_room.scss">
    <link rel="stylesheet" href="frontend/scss/_contact.scss">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- /Preloader -->

    <!-- Header Area Start -->
    @include('frontend.layout.header')
    <!-- Header Area End -->

   @yield('frontend_content')

    <!-- Footer Area Start -->
        @include('frontend.layout.footer')
    <!-- Footer Area End -->




    <!-- **** All JS Files ***** -->
    <!-- jQuery 2.2.4 -->
    <script src="frontend/js/jquery.min.js"></script>
    <!-- Popper -->
    <script src="frontend/js/popper.min.js"></script>
    <!-- Bootstrap -->
    <script src="frontend/js/bootstrap.min.js"></script>
    <!-- All Plugins -->
    <script src="frontend/js/roberto.bundle.js"></script>
    <!-- Active -->
    <script src="frontend/js/default-assets/active.js"></script>


    @yield('script')
</body>

</html>
