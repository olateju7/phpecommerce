<?php include_once'../includes/functions.php'; ?>

<?php
if(empty($_SESSION['email'])){
	echo '<script>window.location.href = "../login?ReturnUrl=account";</script>';
}

$userid = $_SESSION['rId'];

$query = mysqli_query($connection, "SELECT * FROM customer_info WHERE id='{$userid}' ");

while($row=mysqli_fetch_assoc($query)){
	$address = $row['address'];
	$country =$row['country'];
	$city =$row['city'];
	$phone =$row['phone'];
	$postal=$row['postal'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>Account | Allaia</title>

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
    <link href="../css/checkout.css" rel="stylesheet">
	<link href="../css/error_track.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="../css/custom.css" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

</head>

<body>

	<div id="page">
		
	<?php include_once'../includes/header.php'; ?>
	<!-- /header -->
	
	<main class="bg_gray">
	
		
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li>Account</li>
				</ul>
		</div>
		<h1><?= $_SESSION['firstname']. ' '. $_SESSION['lastname'] ?></h1>
			
	</div>
	<!-- /page_header -->
			<div class="row">
				<div id="profile" class="col-lg-6 col-md-6">
					<div class="step first">
						<h3>1. Profile Information</h3>
						<form action="" method="post">
							<div class="row m-4">
								<div class="col-md-6">
									<div class="form-group">
										<label for="firstname">First Name:</label>
										<input type="text" name="re_firstname" class="form-control" value="<?= $_SESSION['firstname'] ?>" id="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="lastname">Last Name:</label>
										<input type="text" name="re_lastname" class="form-control" value="<?= $_SESSION['lastname'] ?>" id="">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="email">Email:</label>
										<input type="text" name="re_email" class="form-control" value="<?= $_SESSION['email'] ?>" id="">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="address">Address:</label>
										<input type="text" name="re_address" class="form-control" value="<?= $address ?>" id="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="city">City:</label>
										<input type="text" name="re_city" class="form-control" value="<?= $city ?>" id="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="postal">Postal Code:</label>
										<input type="text" name="re_postal" class="form-control" value="<?= $postal ?>" id="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="country">Country:</label>
										<input type="text" name="re_country" class="form-control" value="<?= $country ?>" id="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="phone">Telephone:</label>
										<input type="text" name="re_phone" class="form-control" value="<?= $phone ?>" id="">
									</div>
								</div>
								<hr>
								<input type="submit" name="re_submit" class="btn_1 text_center full_width" value="SUBMIT">
							</div>
						</form>
					</div>
				</div>
				<div id="track-order" class="col-lg-6 col-md-6">
					<div class="step last">
					<h3>2. Track Order</h3>
						<div id="track_order">
							<div class="container">
								<div class="row justify-content-center text-center">
									<div class="col-xl-7 col-lg-9">
										<img src="../img/track_order.svg" alt="" class="img-fluid add_bottom_15" width="200" height="177">
										<p>Quick Tracking Order</p>
										<form method="get" action="../admin/invoice-noprint.php">
											<div class="search_bar">
												<input type="text" name="ref" class="form-control" placeholder="Reference No" required>
												<input type="submit" value="Search">
											</div>
										</form>
									</div>
								</div>
								<!-- /row -->
							</div>
							<!-- /container -->
						</div>
					</div>
				</div>
			</div>
			<!-- /row -->
			<div id="orders" class="row">
				<div class="col-12">
					<div class="step middle">
						<h3>3. MY ORDERS</h3>
						<div style="overflow-x:auto;" >
							<table id="ordertable" class="table table-striped">
									<thead>
										<tr>
											<th>Reference Number</th>
											<th>Customer Email</th>
											<th>Total Price</th>
											<th>Transaction Date</th>
											<th>Delivery Method</th>
											<th>Payment Method</th>
											<th>Status</th>
											<th>Receipt</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$customerid =$_SESSION['rId'];
										$select=$pdo->prepare("select * from tbl_order where customerid= '$customerid' group by reference_no order by id desc");
										$select->execute();
							
										while($row=$select->fetch(PDO::FETCH_OBJ)  ){
											echo'
											<tr>
												<th>'.$row->reference_no.'</th>
												<th>'.$row->customer_email.'</th>
												<th>&#8358;'.number_format($row->total_price,2).'</th>
												<th>'.$row->date.'</th>
												<th>'.$row->method.'</th>
												<th>'.$row->paymentmethod.'</th>
												<th>'.$row->status.'</th>
												<th><a href="invoice-noprint.php?ref='.$row->reference_no.'"><button id='.$row->id.' class="btn btn-info changestatus" ><span class="glyphicon glyphicon-print" style="color:#ffffff" data-toggle="tooltip"  title="Generate Receipt"></span></button></a></th>
											</tr>';
										}
										?>
									</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /container -->
	</main>
	<!--/main-->


	<?php include_once'../includes/footer.php'; ?>