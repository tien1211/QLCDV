<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đổi Mật Khẩu</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
					    <input class="input100" type="password" required name="password" id="pass" placeholder="Nhập mật khẩu củ.....">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

                    <div class="wrap-input100 validate-input">
					    <input class="input100" type="password" required name="new_password" id="newpass" placeholder="Nhập mật khẩu mới.....">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input">
						<input class="input100" type="password"    onchange="confirmed_pass()" name="confirm_password" id="repass" required placeholder="Nhập lại mật khẩu.....">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					<p id="message"></p>
					@if(session('error'))
					<div style="color:red; padding: 20px;" role="alert">
					<strong>{{session('error')}}</strong>
					</div>
				  	@endif

					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn" >
							Đổi Mật Khẩu
						</button>
					</div>

					<div class="text-center p-t-45 p-b-4">
						<span class="txt1">
							Forgot
						</span>

						<a href="#" class="txt2 hov1">
							Username / Password?
						</a>
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

    // function checkpass(){
    //     var a = {{$ar->password}}
    //     console.log(a);
    // }
    //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này

    function confirmed_pass(){
        var password = document.getElementById("newpass").value;
        var confirmed_password = document.getElementById("repass").value;
        if(password != confirmed_password){
          document.getElementById("check").innerHTML= "Mật khẩu không khớp";
          document.getElementById("check").style.color = "red";
        }
    }




</script>

</body>
</html>
