<?php include_once'../includes/functions.php'; ?>
<?= signup(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>Cart | Allaia</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="../img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="../img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="../img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="../img/apple-touch-icon-144x144-precomposed.png">
	
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="../css/bootstrap.custom.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

	<!-- SPECIFIC CSS -->
    <link href="../css/account.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="../css/custom.css" rel="stylesheet">

</head>

<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
	<div id="page">
		
	<?php include_once'../includes/header.php'; ?>
	<!-- /header -->
	
	<main class="bg_gray">
		
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li>Login/SignUp</li>
				</ul>
		</div>
		<h1>Sign In or Create an Account</h1>
	</div>
	<!-- /page_header -->
			<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-6 col-md-8">
			<?= login() ?>
				<div class="box_account">
					<h3 class="client">Already Client</h3>
					<div class="form_container">
						<!--<div class="divider"><span>Or</span></div>-->
						<form method="post">
						<div class="form-group">
							<input type="email" class="form-control" name="login_email" id="email" placeholder="Email*">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="login_pass" id="password_in" value="" placeholder="Password*">
						</div>
						<div class="clearfix add_bottom_15">
							<div class="float-right"><a id="forgot" href="javascript:void(0);">Lost Password?</a></div>
						</div>
						<div class="text-center"><input type="submit" value="Log In" name="login_submit" class="btn_1 full-width"></div>
						</form>
						<form action="" method="post">
						<div id="forgot_pw">
							<div class="form-group">
								<input type="email" class="form-control" name="email_forgot" id="email_forgot" placeholder="Type your email">
							</div>
							<p>A new password will be sent shortly.</p>
							<div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
						</div>
						</form>
					</div>
					<!-- /form_container -->
				</div>
				<!-- /box_account -->
				<div class="row">
					<div class="col-md-6 d-none d-lg-block">
						<ul class="list_ok">
							<li>Find Locations</li>
							<li>Quality Location check</li>
							<li>Data Protection</li>
						</ul>
					</div>
					<div class="col-md-6 d-none d-lg-block">
						<ul class="list_ok">
							<li>Secure Payments</li>
							<li>H24 Support</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="new_client">New Client</h3> <small class="float-right pt-2">* Required Fields</small>
					<form action="" method="post">
						<div class="form_container">
							<div class="form-group">
								<input type="email" class="form-control" name="reg_email" id="email_2" placeholder="Email*" required>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="reg_password" id="password_in_2" value="" placeholder="Password*" required>
							</div>
							<hr>
							<div class="private box">
								<div class="row no-gutters">
									<div class="col-6 pr-1">
										<div class="form-group">
											<input type="text" class="form-control" name="reg_firstname" placeholder="First Name*" required>
										</div>
									</div>
									<div class="col-6 pl-1">
										<div class="form-group">
											<input type="text" class="form-control" name="reg_lastname" placeholder="Last Name*" required>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<input type="text" class="form-control" name="reg_address" placeholder="Full Address*" required>
										</div>
									</div>
								</div>
								<!-- /row -->
								<div class="row no-gutters">
									<div class="col-6 pr-1">
										<div class="form-group">
											<input type="text" class="form-control" name="reg_city" placeholder="City*" required>
										</div>
									</div>
									<div class="col-6 pl-1">
										<div class="form-group">
											<input type="text" class="form-control" name="reg_postal" placeholder="Postal Code*" required>
										</div>
									</div>
								</div>
								<!-- /row -->
								
								<div class="row no-gutters">
									<div class="col-6 pr-1">
										<div class="form-group">
											<div class="custom-select-form">
												<select class="wide add_bottom_10" name="reg_country" id="country">
														<option value="" disabled selected>Country*</option>
														<option value="Nigeria">Nigeria</option>
														<option value="Europe">Europe</option>
														<option value="United states">United states</option>
														<option value="Asia">Asia</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-6 pl-1">
										<div class="form-group">
											<input type="text" class="form-control" name="reg_phone" placeholder="Telephone *">
										</div>
									</div>
								</div>
								<!-- /row -->
								
							</div>
							<!-- /private -->
							<hr>
							<div class="form-group">
								<label class="container_check">Accept <a href="#0">Terms and conditions</a>
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="text-center"><input type="submit" value="Register" name="reg_submit" class="btn_1 full-width"></div>
						</div>
					</form>
					<!-- /form_container -->
				</div>
				<!-- /box_account -->
			</div>
		</div>
		<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	<!--/main-->
	
<?php include_once'../includes/footer.php'; ?>