<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Deltamike - Payroll Management System">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="BlackCoders Group Inc.">
        <meta name="robots" content="noindex, nofollow">
        <title>Login | Deltamike PMS</title>
		
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>pages\assets\img\favicon.png">
        <link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\all.min.css">
        <link rel='stylesheet' href="<?php echo base_url();?>pages\assets\css\style-login.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="<?php echo base_url();?>pages/assets/js/html5shiv.min.js"></script>
			<script src="<?php echo base_url();?>pages/assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body class="account-page">
			<!-- Authentication pages -->
			<div class="auth">
				<div class="container">
					
					<div class="auth__inner">
						<div class="auth__media">
							<img src="<?php echo base_url();?>pages\assets\img\Login.svg">
						</div>
						<div class="auth__auth">

							<h1 class="auth__title" style="margin-bottom: 0px;">Access your account</h1>
							<p style="color:#fff;">Fill in your username and password to proceed!</p>

							<?php if($this->session->flashdata("error")!=""){ ?>
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<?php echo $this->session->flashdata("error"); ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
							<?php } ?>

							<form method="post" action="<?php echo base_url(); ?>Login/login_validation">
							<!-- 	<label>Username</label> -->
								<input type="text" 
									   class='form-control alphanumeric 
									   		  <?php if($this->session->flashdata("error")!="") echo "is-invalid" ?>'
									    name="username" 
									    id="username" 
									    required="" 
									    autocomplete="off"
									    placeholder="Username"
									    value='<?php if($this->session->flashdata("error")!="") echo $this->session->flashdata("uname"); ?>'>

								<!-- <label>Password</label> -->
								<input type="password" 
									   class='form-control alphanumeric 
									   		  <?php if($this->session->flashdata("error")!="") echo "is-invalid" ?>'
									   name="password"
									   id="password" 
									   required=""
									   autocomplete="off"
									   placeholder="Password"
									   value='<?php if($this->session->flashdata("error")!="") echo $this->session->flashdata("pword"); ?>'>

								<button type='submit' class="button button__accent" style="margin-top: .9rem;"><i class="fas fa-sign-in-alt"></i> LOGIN</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="<?php echo base_url();?>pages\assets\js\jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="<?php echo base_url();?>pages\assets\js\popper.min.js"></script>
        <script src="<?php echo base_url();?>pages\assets\js\bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="<?php echo base_url();?>pages\assets\js\app.js"></script>
		<script src="<?php echo base_url();?>pages\assets\js\app-login.min.js"></script>
		<script>
			$(document).ready(function() {
				$("#username").focus();
			});		
		</script>
    </body>
</html>