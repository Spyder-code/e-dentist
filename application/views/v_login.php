<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Login E-Dentist</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url().'assets/login1/images/icons/gigi.png'?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/login1/vendor/bootstrap/css/bootstrap.min.css'?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/login1/fonts/font-awesome-4.7.0/css/font-awesome.min.css'?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/login1/fonts/Linearicons-Free-v1.0.0/icon-font.min.css'?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/login1/vendor/animate/animate.css'?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/login1/vendor/css-hamburgers/hamburgers.min.css'?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/login1/vendor/select2/select2.min.css'?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/login1/css/util.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/login1/css/main.css'?>">
<!--===============================================================================================-->
</head>
<body>
	<style type="text/css">
   .left    { text-align: left;}
   .right   { text-align: right;}
   .center  { text-align: center;}
   .justify { text-align: justify;}
</style>
	<style type="text/css">
   .bg-biru{background-color: #4e73df!important;}
</style>

	
	<div class="limiter">

		<div class="container-login100" style="background-image: url('<?php echo base_url("assets/login1/images/iya.png");?>');">

			<div class="login100 p-t-120 p-b-30 ">
				<style type="text/css">
					h2 {
                   
                   text-shadow: 3px 3px 2px #cccccc;
                       }

				</style>
				<style type="text/css">
				h4 {
                   
                   text-shadow: 3px 2px 2px #cccccc;
                       }

				</style>
				
				<span class=" login100-form-title p-t p-b-45">
					<h2>KLINIK GIGI PROMOTIVE PREVETIVE</h2>
					<h4>JURUSAN KEPERAWATAN GIGI</h4>
					<h4>POLTEKKES KEMENKES SURABAYA</h4>
		</span>

				
			</div>
			<form class="login100-form validate-form" action="<?php echo base_url().'login/auth'?>" method= "post">
					<div class="login100-form-avatar">
						<img src="<?php echo base_url().'assets/login1/images/hm.png'?>" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						<h5><font color="#ff0000"> <?php echo $this->session->flashdata('msg');?></font></h5>
						
					</span>
                    <div class="col-lg-4"></div>
            		<div class="col-lg-4">

					<div class="wrap-input100 validate-input m-b-12" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="NIM/NIP">
						<span class="focus-input100 "></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>


					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10 ">
						<button class="login100-form-btn bg-biru ">
							Login
						</button>
					</div>
				</div>
				<div class="col-lg-4"></div>

				</form>


		</div>
	</div>
	
	
<!--===============================================================================================-->	
	<script src="<?php echo base_url().'assets/login1/vendor/jquery/jquery-3.2.1.min.js'?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url().'assets/login1/vendor/bootstrap/js/popper.js'?>"></script>
	<script src="<?php echo base_url().'assets/login1/vendor/bootstrap/js/bootstrap.min.js'?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url().'assets/login1/vendor/select2/select2.min.js'?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url().'assets/login1/js/main.js'?>"></script>

</body>
</html>