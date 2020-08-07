<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đổi Mật Khẩu</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

	<base href="{{asset('')}}">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
			<form class="login100-form validate-form" method="post" action="{{route('changePass',['id'=>$auth->cdv_id])}}">
				@csrf
				<span class="login100-form-title p-b-33">
						ĐỔI MẬT KHẨU
					</span>

					<div class="wrap-input100 validate-input">
					    <input class="input100" id="oldpass"   type="password"  name="old_password" placeholder="Nhập mật khẩu củ.....">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

                    <div class="wrap-input100 validate-input">
					    <input class="input100" id="newpass"  type="password"  name="new_password" placeholder="Nhập mật khẩu mới.....">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input">
						<input class="input100" id="repass"  type="password" name="confirm_password"  placeholder="Nhập lại mật khẩu.....">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					<span id='message'></span>
					
					@if(session('error'))
					<div style="color:red; padding: 20px;" role="alert">
					<strong>{{session('error')}}</strong>
					</div>
					  @endif


					  <div class="flash-message">
						@foreach (['danger', 'warning', 'success', 'info'] as $msg)
						  @if(Session::has('alert-' . $msg))
						  <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} </p>
						  @endif
						@endforeach
					</div>
					  


					<div class="container-login100-form-btn m-t-20">
						<button type="submit" class="login100-form-btn" >
							Đổi Mật Khẩu
						</button>
					</div>

					

					<div class="text-center">
					<a href="{{route('trangchu')}}" class="txt2 hov1">
							Trang chủ
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>



<!--===============================================================================================-->
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/daterangepicker/moment.min.js"></script>
	<script src="login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="login/js/main.js"></script>
<!--===============================================================================================-->


<script>

	$('#newpass, #repass, #oldpass').on('keyup', function () {
		var n = $('#newpass').val().length;
		
	

		if($('#oldpass').val() == "" || $('#newpass').val() == "" || $('#repass').val() ==""){
			$('#message').html("<i class='fas fa-times'>  Không Được Để Trống Mật Khẩu!!</i>").css({'color':'red','font-size':'18px'});
		}
		else if( n > 8 && n < 50)
		{
			$('#message').html("<i class='fas fa-times'> Mật Khẩu Phải Từ 8 Đến 50 Ký Tự!!</i>").css({'color':'red','font-size':'18px'});
		}
		else if ($('#newpass').val() == $('#repass').val()) {
		$('#message').html("<i class='far fa-check-circle'>  Match</i>").css({'color':'green','font-size':'18px'});
		} else 
		$('#message').html("<i class='fas fa-times'>  Mật Khẩu Không Trùng Khớp!!</i>").css({'color':'red','font-size':'18px'});
	
	});


</script>

</body>
</html>
