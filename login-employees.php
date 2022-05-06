<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login - TechJobs</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Roboto Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&display=swap" rel="stylesheet">


	<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<!-- main css -->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha256-NuCn4IvuZXdBaFKJOAcsU2Q3ZpwbdFisd5dux4jkQ5w=" crossorigin="anonymous" />

	<!--Notify for ajax-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	
	<link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@900&display=swap" rel="stylesheet">
</head>
<body>
<div class="container-fluid login-fluid clear-left clear-right">
	<div class="login-container">
		<!-- login header -->
		<div class="login-header">
			<div class="w-login m-auto">
				<div class="login-logo">
					<h3>
						<!-- <a href="#">Tech<span class="txb-logo">Jobs.</span></a> -->
						<a href="#">
							<span style="font-family: Rounded; font-size: 30px; font-weight: 600; color: #0069d9;">VNUA HR</span>
						</a>
					</h3>
					<span class="login-breadcrumb"><em>/</em> Đăng Nhập</span>
				</div>
				<div class="login-right">
					<a href="./" class="btn btn-return">Return Home</a>
				</div>
			</div>
		</div>
		<!-- (end) login header -->

		<div class="clearfix"></div>

		<div class="padding-top-90"></div>
		
		<!-- login main -->
		<div class="login-main">
			<div class="w-login m-auto">
				<div class="row">
					<!-- login main descriptions -->
					<div class="col-md-6 col-sm-12 col-12 login-main-left">
						<img src="img/banner-login.png">
					</div>
					<!-- login main form -->
					<div class="col-md-6 col-sm-12 col-12 login-main-right">
						
						<form class="login-form">
							<div class="login-main-header">
								<h3>Đăng Nhập</h3>
							</div>
						  <div class="input-div one">
		           		   <div class="div lg-lable">
		           		   		<h5>Username</h5>
		           		   		<input type="text" class="input form-control-lgin" id="inp-user">
		           		   </div>
		           		</div>
		           		<div class="input-div pass">
		           		   <div class="div lg-lable">
		           		    	<h5>Password</h5>
		           		    	<input type="password" class="input form-control-lgin" id="inp-pass">
		            	   </div>
		            	</div>
						  <div class="form-group d-block frm-text">
						    <a href="#" class="fg-login d-inline-block">Quên mật khẩu</a>
						    <a href="./register-employees.php" class="fg-login float-right d-inline-block">Bạn chưa có tài khoản? Đăng ký</a>
						  </div>
						  <button type="button" id="btn-login-employees" class="btn btn-primary float-right btn-login d-block w-100">Đăng Nhập</button>
						<div class="form-group d-block w-100 mt-5">
							<div class="text-or text-center">
								<span>Hoặc</span>
							</div>

							<div class="row">
								<div class="col-sm-6 col-12 pr-7">
									<button class="btn btn-secondary btn-login-facebook btnw w-100 float-left">
									<i class="fa fa-facebook" aria-hidden="true"></i>
									<span>Đăng nhập bằng Facebook</span>
							</button>
								</div>
								<div class="col-sm-6 col-12 pl-7">
									<button class="btn btn-secondary btn-login-google btnw w-100 float-left">
									<i class="fa fa-google" aria-hidden="true"></i>
									<span>Đăng nhập bằng Google</span>
								</button>
								</div>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- (end) login main -->
	</div>
</div>
<footer class="login-footer">
		<div class="w-login m-auto">
			<div class="row">
				<!-- login footer left -->
				<div class="col-md-6 col-sm-12 col-12 login-footer-left">
					<div class="login-copyright">
						<p>Copyright © 2020 <a href="#"> Nguyễn Nam Khánh</a>. All Rights Reserved.</p>
					</div>
				</div>
				<!-- login footer right -->
				<div class="col-md-6 col-sm-12 col-12 login-footer-right">
					<ul>
						<li><a href="#">Terms & Conditions</a></li>
						<li><a href="#">Privacy Policy</a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="js/jquery-3.4.1.slim.min.js"></script> -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
	<!--Notify for ajax-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>