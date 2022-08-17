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
					<li><a href="../">Home</a></li>
					<li>Wishlist</li>
				</ul>
			</div>
			<h1>Wishlist page</h1>
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
										Code
									</th>
									<th>
										Add to Cart
									</th>
									<th>
										
									</th>
								</tr>
							</thead>
							<tbody>
								<?php

									$grandtotal =0;
									$customerid = $_SESSION['id'];
									$query = mysqli_query($connection, "SELECT * FROM `wishlist` WHERE customerid='$customerid'");

									while($row=mysqli_fetch_assoc($query)){
										$wishid = $row['id'];
										$code = $row['product_code'];

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
									<strong>&#8358; '.$code.'</strong>
									</td>
									<td>
									<a href="../cart/action.php?add='.$wishid.'"><i style="font-size: 20px" class="ti-shopping-cart"></i></a>
									</td>
									<td class="options">
										<a href="../cart/action.php?removewish='.$wishid.'"><i class="ti-trash"></i></a>
									</td>
								</tr>';
									}
								?>
							</tbody>
						</table>
					<!-- /cart_actions -->
	
		</div>
		<!-- /container -->
		
		
		<!-- /box_cart -->
		
	</main>
	<!--/main-->
	
	<?php include_once'../includes/footer.php'; ?>