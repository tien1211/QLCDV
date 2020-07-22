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

    <!-- Breadcrumb Area Start -->
    @include('frontend.layout.poster')

    <!-- Breadcrumb Area End -->



    <!-- Blog Area Start -->
    <div class="roberto-news-area section-padding-100-0">
        <div class="container">
            <div class="row justify-content-center">

<!-- CONTENT -->
                <div class="col-12 col-lg-8">

                    <!-- Single Blog Post Area -->
                    {{-- <div class="single-blog-post d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <a href="#"><img src="frontend/img/bg-img/24.jpg" alt=""></a>
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <a href="#" class="post-author">Jan 02, 2019</a>
                                <a href="#" class="post-tutorial">Event</a>
                            </div>
                            <!-- Post Title -->
                            <a href="#" class="post-title">Cdc Issues Health Alert Notice For Travelers To Usa From Hon</a>
                            <p>A round-the-world trip remains the world’s greatest journey. For two out of every three people, this is the ultimate travel experience, according to recent research...</p>
                            <a href="#" class="btn continue-btn">Read More</a>
                        </div>
                    </div> --}}

                    <!-- Single Blog Post Area -->
                    {{-- <div class="single-blog-post d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="200ms">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <a href="#"><img src="frontend/img/bg-img/25.jpg" alt=""></a>
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <a href="#" class="post-author">Jan 04, 2019</a>
                                <a href="#" class="post-tutorial">Event</a>
                            </div>
                            <!-- Post Title -->
                            <a href="#" class="post-title">How To Boost Your Traffic Of Your Blog And Destroy The Competition</a>
                            <p>Businesses such as GuideMeGreen and the co-op offer a real alternative for people concerned with these issues and with businesses that combine a strong ethical dimension in tandem with making profits...</p>
                            <a href="#" class="btn continue-btn">Read More</a>
                        </div>
                    </div> --}}

                    <!-- Single Blog Post Area -->
                    {{-- <div class="single-blog-post d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="300ms">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <a href="#"><img src="frontend/img/bg-img/26.jpg" alt=""></a>
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <a href="#" class="post-author">Jan 09, 2019</a>
                                <a href="#" class="post-tutorial">Event</a>
                            </div>
                            <!-- Post Title -->
                            <a href="#" class="post-title">Global Travel And Vacations Luxury Travel On A Tight Budget</a>
                            <p>Life is hectic; it’s true. There are so many things that demand your time and attention. Between work, kids, family and household chores, there is precious little time left over for you.</p>
                            <a href="#" class="btn continue-btn">Read More</a>
                        </div>
                    </div> --}}

                    <!-- Single Blog Post Area -->
                    {{-- <div class="single-blog-post d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="400ms">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <a href="#"><img src="frontend/img/bg-img/27.jpg" alt=""></a>
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <a href="#" class="post-author">Jan 22, 2019</a>
                                <a href="#" class="post-tutorial">Event</a>
                            </div>
                            <!-- Post Title -->
                            <a href="#" class="post-title">Will The Democrats Be Able To Reverse The Online Gambling Ban</a>
                            <p>Everyone loves good, old fashioned charcoal grilling. Aside from being cheaper than other grilling methods, it adds a raw, distinctive taste to your sausages, burgers, ribs, and other grilled items.</p>
                            <a href="#" class="btn continue-btn">Read More</a>
                        </div>
                    </div> --}}

                    <!-- Single Blog Post Area -->
                    {{-- <div class="single-blog-post d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="500ms">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <a href="#"><img src="frontend/img/bg-img/28.jpg" alt=""></a>
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <a href="#" class="post-author">Jan 29, 2019</a>
                                <a href="#" class="post-tutorial">Event</a>
                            </div>
                            <!-- Post Title -->
                            <a href="#" class="post-title">Les Houches The Hidden Gem Of The Chamonix Valley</a>
                            <p>Las Vegas has more than 100,000 hotel rooms to choose from. There is something for every budget, and enough entertainment within walking distance to keep anyone occupied for months.</p>
                            <a href="#" class="btn continue-btn">Read More</a>
                        </div>
                    </div> --}}

                    <!-- Pagination -->
                    {{-- <nav class="roberto-pagination wow fadeInUp mb-100" data-wow-delay="600ms">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next <i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </nav> --}}

                    @yield('frontend_content')
                </div>
<!-- CONTENT -->

<!-- MENU -->


                @include('frontend.layout.menu')
<!-- MENU -->


            </div>
        </div>
    </div>
    <!-- Blog Area End -->






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
