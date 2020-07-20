<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Vietpro Shop - Home</title>
    <base href="{{asset('')}}">
	<link rel="stylesheet" href="frontend/css/bootstrap.min.css">
	<link rel="stylesheet" href="frontend/css/home.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script type="text/javascript" src="frontend/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript">
		$(function() {
			var pull        = $('#pull');
			menu        = $('nav ul');
			menuHeight  = menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});
		});

		$(window).resize(function(){
			var w = $(window).width();
			if(w > 320 && menu.is(':hidden')) {
				menu.removeAttr('style');
			}
		});
	</script>
</head>
<body>


	<!-- header -->
	@include('frontend.layout.header')<!-- /header -->
	<!-- endheader -->

	<!-- main -->
	<section id="body">
		<div class="container">
			<div class="row">
				@include('frontend.layout.menu')

				<div id="main" class="col-md-9">
					<!-- main -->


                    <!-- phan slide la cac hieu ung chuyen dong su dung jquey -->

                    {{---------------------- SLIDE ---------------------}}
					<div id="slider">
						<div id="demo" class="carousel slide" data-ride="carousel">

							<!-- Indicators -->
							<ul class="carousel-indicators">
								<li data-target="#demo" data-slide-to="0" class="active"></li>
								<li data-target="#demo" data-slide-to="1"></li>
								<li data-target="#demo" data-slide-to="2"></li>
							</ul>

							<!-- The slideshow -->
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="img/home/slide-1.png" alt="Los Angeles" >
								</div>
								<div class="carousel-item">
									<img src="img/home/slide-2.png" alt="Chicago">
								</div>
								<div class="carousel-item">
									<img src="img/home/slide-3.png" alt="New York" >
								</div>
							</div>
{{--
							<!-- Left and right controls -->
							<a class="carousel-control-prev" href="#demo" data-slide="prev">
								<span class="carousel-control-prev-icon"></span>
							</a>
							<a class="carousel-control-next" href="#demo" data-slide="next">
								<span class="carousel-control-next-icon"></span>
							</a>
						</div>
					</div> --}}
                    {{---------------------- SLIDE ---------------------}}

					<div id="wrap-inner">
						{{-- <div class="products">
							<h3>sản phẩm nổi bật</h3>
							<div class="product-list row">
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img src="img/home/product-1.png" class="img-thumbnail"></a>
									<p><a href="#">iPhone 6S Plus 64G</a></p>
									<p class="price">10.000.000</p>
									<div class="marsk">
										<a href="#">Xem chi tiết</a>
									</div>
								</div>
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img src="img/home/product-2.png" class="img-thumbnail"></a>
									<p><a href="#">iPhone 6S Plus 64G</a></p>
									<p class="price">10.000.000</p>
									<div class="marsk">
										<a href="#">Xem chi tiết</a>
									</div>
								</div>
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img src="img/home/product-3.png" class="img-thumbnail"></a>
									<p><a href="#">iPhone 6S Plus 64G</a></p>
									<p class="price">10.000.000</p>
									<div class="marsk">
										<a href="#">Xem chi tiết</a>
									</div>
								</div>
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img src="img/home/product-4.png" class="img-thumbnail"></a>
									<p><a href="#">iPhone 6S Plus 64G</a></p>
									<p class="price">10.000.000</p>
									<div class="marsk">
										<a href="#">Xem chi tiết</a>
									</div>
								</div>
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img src="img/home/product-1.png" class="img-thumbnail"></a>
									<p><a href="#">iPhone 6S Plus 64G</a></p>
									<p class="price">10.000.000</p>
									<div class="marsk">
										<a href="#">Xem chi tiết</a>
									</div>
								</div>
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img src="img/home/product-4.png" class="img-thumbnail"></a>
									<p><a href="#">iPhone 6S Plus 64G</a></p>
									<p class="price">10.000.000</p>
									<div class="marsk">
										<a href="#">Xem chi tiết</a>
									</div>
								</div>
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img src="img/home/product-3.png" class="img-thumbnail"></a>
									<p><a href="#">iPhone 6S Plus 64G</a></p>
									<p class="price">10.000.000</p>
									<div class="marsk">
										<a href="#">Xem chi tiết</a>
									</div>
								</div>
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img src="img/home/product-2.png" class="img-thumbnail"></a>
									<p><a href="#">iPhone 6S Plus 64G</a></p>
									<p class="price">10.000.000</p>
									<div class="marsk">
										<a href="#">Xem chi tiết</a>
									</div>
								</div>
							</div>
                        </div> --}}



                        @yield('frontend_content')
					</div>




					<!-- end main -->
				</div>
			</div>
		</div>
	</section>
	<!-- endmain -->



	<!-- footer -->
	<footer id="footer">
		@include('frontend.layout.footer')
	</footer>
	<!-- endfooter -->

</body>
</html>
