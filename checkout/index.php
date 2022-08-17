<?php include_once'../includes/functions.php'; ?>

<?php
if(empty($_SESSION['email'])){
	echo '<script>window.location.href = "../login?ReturnUrl=Checkout";</script>';
}

if(isset($_GET['coupon-code'])){
	$coupon = $_GET['coupon-code'];

	$query = mysqli_query($connection, "SELECT * `coupon` WHERE coupon='{$coupon}'");
}
if(isset($_GET['meth'])) {
	$meth = $_GET['meth'];
}else {
	$meth = "delivery";
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
    <title>Checkout | Allaia</title>

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

    <!-- YOUR CUSTOM CSS -->
    <link href="../css/custom.css" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

</head>

<body>
<script type="text/javascript">
		function addCookies() {
		var date = new Date();
		var fieldvalue = $("#houseno").val();
		date.setTime(date.getTime()+ (7*24*60*60*1000));
		var expires = "expires=" + date.toGMTString();
		document.cookie = "houseno=" + fieldvalue + ";" + expires + ";path=/";
}
	</script>
<script>
	$(document).ready(function(){
      $('input[name="pay_type"]').click(function(){
		var inputValue = $(this).attr("value");
          document.location.href = '?meth='+inputValue;
      });
	});
	</script>
	<div id="page">
		
	<?php include_once'../includes/header.php'; ?>
	<!-- /header -->
	
	<main class="bg_gray">
	
		
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li>Checkout</li>
				</ul>
		</div>
		<h1>Checkout</h1>
			
	</div>
	<!-- /page_header -->
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="step first">
						<h3>1. Order Summary</h3>
						<div class="box_general summary">
						<ul>
							<?php
							$subtotal =0;
							$customerid = $_SESSION['id'];
							$query = mysqli_query($connection, "SELECT * FROM `cart` WHERE customerid='$customerid'");

							while($row=mysqli_fetch_assoc($query)){
							$cartid = $row['id'];
							$code = $row['product_code'];
							$quantity =$row['quantity'];

							$select = $pdo->prepare("select * from products where code='$code'");
							$select->execute();
							$row1=$select->fetch(PDO::FETCH_OBJ);
							echo'<li class="clearfix"><em>'. $quantity.'x '. $row1->name.'</em>  <span>&#8358;'. number_format(($row1->price * $quantity),2).'</span></li>
							 ';
							 $subtotal+=($row1->price * $quantity);
							}
								?>
						</ul>
						<div class="total clearfix">SUBTOTAL <span>&#8358;<?= number_format($subtotal,2) ?></span></div>
					</div>
					</div>
					<!-- /step -->
				</div>
				<div class="col-lg-4 col-md-6">
				<div class="step middle payments">
						<h3>2. Shipping Method</h3>
						<div class="form-group">
							<label class="container_radio">Delivery to your DoorStep
								<input type="radio" name="pay_type" value="delivery" <?php if($meth=="delivery"){echo 'checked';} ?>>
								<span class="checkmark"></span>
							</label>
							<label class="container_radio">Pick up from Store
								<input type="radio" name="pay_type" value="pickup" <?php if($meth=="pickup"){echo 'checked';} ?>>
								<span class="checkmark"></span>
							</label>
						</div>
						<?php
						if($meth =="delivery"){
							echo'
						<div class="delivery box">
							<h4>Delivery Address</h4>
							<div class="row no-gutters">
								<div class="col-12">
									<div class="form-group">
										<input type="text" name="houseno" onchange="addCookies()" value="'.$_SESSION['address'].'" placeholder="House Address" id="houseno" class="form-control">
									</div>
									
								</div>
							</div>
						</div>';
						}else{
							echo'
						<div class="pickup box">
							<h4>Pickup Station</h4>
							<div class="row no-gutters">
								<div class="col-12">
									<div class="form-group">
										<input type="text" name="city" placeholder="Odunlink Pharmacy, Beside Bovas Gas Station, Idere Road, Igboora, Oyo State, Nigeria." id="" class="form-control" readonly>
									</div>
								</div>
							</div>
						</div>';
						}
						?>
					</div>
					<!-- /step -->
					
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="step last">
						<h3>3. Payment Method</h3>
					<div class="box_general summary">
						<ul>
							<li class="clearfix"><em><strong>Subtotal</strong></em>  <span>&#8358;<?= number_format($subtotal,2) ?></span></li>
							
						</ul>
						<div class="total clearfix">TOTAL <span>&#8358;<?= number_format($subtotal,2) ?></span></div>
						
						<?php
							if($meth =="delivery"){
								echo'
							<a href="verify.php?method=cod" class="btn_1 full-width outline">Cash on Delivery</a>';
							}else{
								echo'
							<a href="verify.php?method=cop" class="btn_1 full-width outline">Cash on Pickup</a>';
							}
							?>
						<form id="paymentForm">
							<input type="hidden" value="<?= $_SESSION['email'] ?>" id="email-address" required />
							<input type="hidden" id="amount" value="<?= $subtotal ?>" required />
							<input type="hidden" value="<?= $_SESSION['firstname'] ?>" id="first-name" />
							<input type="hidden" value="<?= $_SESSION['lastname'] ?>" id="last-name" />
							<button type="submit" onclick="payWithPaystack()" class="btn_1 full-width">Pay Online with PayStack&#174;</button>
						</form>
					</div>
					<!-- /box_general -->
					</div>
					<!-- /step -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	<!--/main-->

	<script src="https://js.paystack.co/v1/inline.js"></script> 
	<script type="text/javascript">
	const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false);
function payWithPaystack(e) {
  e.preventDefault();
  let handler = PaystackPop.setup({
    key: 'pk_test_1494870a0d41b76ab5172b3b2de694556d6ff773', // Replace with your public key
    email: document.getElementById("email-address").value,
    amount: document.getElementById("amount").value  * 100,
    ref: 'ODL'+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    currency: 'NGN',
	// label: "Optional string that replaces customer email"
    onClose: function(){
		windows.location = "payment?transaction=call";
      alert('Window closed.');
    },
    callback: function(response){
      let message = 'Payment complete! Reference: ' + response.reference;
      alert(message);
	  window.location = "verify.php?paymeth=paystack&meth=<?= $meth ?>&reference=" + response.reference;
    }
  });
  handler.openIframe();
}
</script>


	<?php include_once'../includes/footer.php'; ?>