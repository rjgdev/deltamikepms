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
        <link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="<?php echo base_url();?>pages/assets/js/html5shiv.min.js"></script>
			<script src="<?php echo base_url();?>pages/assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body class="account-page">
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<div class="account-content">
				<div class="container">
				
					<!-- Account Logo -->
					<div class="account-logo">
						<a href="<?php echo base_url(); ?>login"><img src="<?php echo base_url();?>pages\assets\img\logo.png" alt="Deltamike Payroll Management System"></a>
					</div>
					<!-- /Account Logo -->
					
					<div class="account-box">
						<div class="account-wrapper">
							<h3 class="account-title">Login</h3>
							<p class="account-subtitle">Sign in to your account</p>

							<?php if($this->session->flashdata("error")!=""){ ?>
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<?php echo $this->session->flashdata("error"); ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
							<?php } ?>
							<form method="post" action="<?php echo base_url(); ?>Login/login_validation">
								<div>
									<label for="username">Username</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroupPrepend3"><i class="fa fa-user"></i></span>
										</div>
										<input type="text" class='form-control alphanumeric <?php if($this->session->flashdata("error")!="") echo "is-invalid" ?>' name="username" id="username" aria-describedby="inputGroupPrepend3" required="" value='<?php if($this->session->flashdata("error")!="") echo $this->session->flashdata("uname"); ?>'>
									</div>
								</div>

								<div>
									<label for="password">Password</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroupPrepend3"><i class="fa fa-lock"></i></span>
										</div>
										<input type="password" class='form-control alphanumeric <?php if($this->session->flashdata("error")!="") echo "is-invalid" ?>' name="password" id="password" aria-describedby="inputGroupPrepend3" required="" value='<?php if($this->session->flashdata("error")!="") echo $this->session->flashdata("pword"); ?>'>
									</div>
								</div>

								<div class="form-group text-center">
									<button class="btn btn-primary account-btn" type="submit">Login</button>
								</div>
							</form>
							<!-- /Account Form -->
							
						</div>
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
		<script>
			$(document).ready(function() {
				$("#username").focus();
			});		
		</script>
    </body>
</html>