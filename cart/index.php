<?php include_once'../includes/functions.php'; ?>

<?php

if(isset($_GET['coupon-code'])){
	$coupon = $_GET['coupon-code'];

	$query = mysqli_query($connection, "SELECT * `coupon` WHERE coupon='{$coupon}'");
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
    <link href="../css/cart.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="../css/custom.css" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>

<body>
<script type="text/javascript">
  $(document).ready(function() {

    // Change the item quantity
    $(".itemQty").on('change', function() {
      var $el = $(this).closest('tr');

      var pid = $el.find(".pid").val();
      var qty = $el.find(".itemQty").val();
      location.reload(true);
      $.ajax({
        url: 'changeqty.php',
        method: 'post',
        data: {
          qty: qty,
          pid: pid,
        },
        success: function(response) {
          console.log(response);
        }
      });
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
					<li><a href="../">Home</a></li>
					<li>Cart</li>
				</ul>
			</div>
			<h1>Cart page</h1>
		</div>
		<!-- /page_header -->
		<table class="table table-striped cart-list">
							<thead>
								<tr>
									<th>
										Product
									</th>
									<th>
										Price
									</th>
									<th>
										Quantity
									</th>
									<th>
										Subtotal
									</th>
									<th>
										
									</th>
								</tr>
							</thead>
							<tbody>
								<?php

									$grandtotal =0;
									$customerid = $_SESSION['id'];
									$query = mysqli_query($connection, "SELECT * FROM `cart` WHERE customerid='$customerid'");

									while($row=mysqli_fetch_assoc($query)){
										$cartid = $row['id'];
										$code = $row['product_code'];
										$quantity =$row['quantity'];

										$select = $pdo->prepare("select * from products where code='$code'");
										$select->execute();
										$row1=$select->fetch(PDO::FETCH_OBJ);
										echo '
								<tr>
									<td>
										<div class="thumb_cart">
											<img src="../images/products/'.$row1->image.'" data-src="../images/products/'.$row1->image.'" class="lazy" alt="Image">
										</div>
										<span class="item_cart">'.$row1->name.'</span>
									</td>
									<td>
										<strong>&#8358; '.number_format($row1->price,2).'</strong>
									</td>
									<td>
										<div class="form-group">
											<input type="hidden" class="pid" value="'.$cartid.'">
											<input type="number" value="'.$quantity.'" min="1" class="form-control text-center itemQty" name="quantity_1">
										</div>
									</td>
									<td>
										<strong>&#8358; '.number_format(($row1->price * $quantity),2).'</strong>
									</td>
									<td class="options">
										<a href="action.php?remove='.$cartid.'"><i class="ti-trash"></i></a>
									</td>
								</tr>';
								$grandtotal += ($row1->price * $quantity);
									}
								?>
							</tbody>
						</table>

						<div class="row add_top_30 flex-sm-row-reverse cart_actions">
						<div class="col-sm-4 text-right">
							<button type="button" class="btn_1 gray">Update Cart</button>
						</div>
							<div class="col-sm-8">
							<div class="apply-coupon">
								<form action="" method="get">
									<div class="form-group form-inline">
										<input type="text" name="coupon-code" value="<?php if(!empty($coupon)){echo $coupon;}else{echo '';} ?>" placeholder="Promo code" class="form-control"><button type="submit" class="btn_1 outline">Apply Coupon</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- /cart_actions -->
	
		</div>
		<!-- /container -->
		
		<div class="box_cart">
			<div class="container">
			<div class="row justify-content-end">
				<div class="col-xl-4 col-lg-4 col-md-6">
			<ul>
				<li>
					<span>Subtotal</span> &#8358; <?= number_format($grandtotal,2) ?>
				</li>
				<li>
					<span>Total</span> &#8358; <?= number_format($grandtotal,2) ?>
				</li>
			</ul>
			<a href="../checkout" class="btn_1 full-width cart">Proceed to Checkout</a>
					</div>
				</div>
			</div>
		</div>
		<!-- /box_cart -->
		
	</main>
	<!--/main-->
	<?php include_once'../includes/footer.php'; ?>