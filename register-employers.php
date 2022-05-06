<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register - TechJobs</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Roboto Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&display=swap" rel="stylesheet">

	<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<!-- main css -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
					<span class="login-breadcrumb"><em>/</em> Register as Employer</span>
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
						
						<form class="login-form reg-form">
							<div class="login-main-header">
								<h3>Đăng Ký Tài Khoản Nhà Tuyển Dụng</h3>
							</div>
						<div class="reg-info">
							<h3>Tài khoản</h3>
						</div>
						  <div class="input-div one">
		           		   <div class="div lg-lable">
		           		   		<h5>Địa Chỉ Email<span class="req">*</span></h5>
		           		   		<input type="text" class="input form-control-lgin" id="inp-email">
		           		   </div>
		           		</div>
		           		<div class="input-div one">
		           		   <div class="div lg-lable">
		           		    	<h5>Mật khẩu<span class="req">*</span></h5>
		           		    	<input type="password" class="input form-control-lgin" id="inp-pass">
		            	   </div>
		            	</div>
		            	<div class="input-div one">
		           		   <div class="div lg-lable">
		           		    	<h5>Nhập Lại Mật khẩu<span class="req">*</span></h5>
		           		    	<input type="password" class="input form-control-lgin" id="inp-repass">
		            	   </div>
		            	</div>
		            	<div class="reg-info">
							<h3>Công ty</h3>
						</div>
						 <div class="input-div one">
		           		   <div class="div lg-lable">
		           		   		<h5>Tên người liên hệ<span class="req">*</span></h5>
		           		   		<input type="text" class="input form-control-lgin" id="inp-name">
		           		   </div>
		           		</div>
		           		 <div class="input-div one">
		           		   <div class="div lg-lable">
		           		   		<h5>Số điện thoại liên hệ<span class="req">*</span></h5>
		           		   		<input type="text" class="input form-control-lgin" id="inp-phone-number">
		           		   </div>
		           		</div>
		           		 <div class="input-div one">
		           		   <div class="div lg-lable">
		           		   		<h5>Tên công ty<span class="req">*</span></h5>
		           		   		<input type="text" class="input form-control-lgin" id="inp-company">
		           		   </div>
		           		</div>
		           		 <div class="input-div one">
		           		   <div class="div lg-lable">
		           		   		<h5>Địa Chỉ Công Ty<span class="req">*</span></h5>
		           		   		<input type="text" class="input form-control-lgin" id="inp-address">
		           		   </div>
		           		</div>
		           		<div class="input-div one">
		           		   <div class="div lg-lable">
		           		   		<h5>Thành phố<span class="req">*</span></h5>
		           		   		<input type="text" class="input form-control-lgin" id="inp-city">
		           		   </div>
		           		</div>
						  <div class="form-group d-block frm-text">
						    <a href="#" class="fg-login d-inline-block"></a>
						    <a href="./login-employers.php" class="fg-login float-right d-inline-block">Bạn đã có tài khoản? Đăng Nhập</a>
						  </div>
						  <button type="button" id="btn-register-employers" class="btn btn-primary float-right btn-login d-block w-100">Đăng Ký Nhà Tuyển Dụng</button>
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