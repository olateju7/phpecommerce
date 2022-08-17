
<?php
include_once'../includes/functions.php';

$status =$_GET['status'];
$cusid =$_SESSION['id'];
$custid =$_SESSION['rId'];
$ref =$_GET['ref'];
?>
<?php
if($status== 'success'){
	$query = mysqli_query($connection,"SELECT * FROM cart WHERE customerid ='{$cusid}'");
	foreach($query as $product){
		$pcode =$product['product_code'];

		$qty =$product['quantity'];

		$query2 = mysqli_query($connection, "SELECT stock FROM products WHERE code='{$pcode}'");
			while($row =mysqli_fetch_assoc($query2)){
			$uqty =$row['stock'];
		}
		$remqty = $uqty -$qty;

				$stmt = $connection->prepare("UPDATE products SET stock=? WHERE code='{$pcode}'");
				$stmt->bind_param('s',$remqty);
				if($stmt->execute()){
					$query3 = mysqli_query($connection, "DELETE FROM cart WHERE customerid='{$cusid}'");
				}
	}
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
    <title>Confirm - <?= $ref; ?></title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
	
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="../css/bootstrap.custom.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

	<!-- SPECIFIC CSS -->
    <link href="../css/checkout.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="../css/custom.css" rel="stylesheet">

</head>

<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
	<div id="page">
		
	<?php include_once'../includes/header.php'; ?>
	
	<main class="bg_gray">
		<div class="container">
            <div class="row justify-content-center">
				<div class="col-md-5">
					<div id="confirm">
						<div class="icon icon--order-success svg add_bottom_15">
							<svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
								<g fill="none" stroke="#8EC343" stroke-width="2">
									<circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
									<path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
								</g>
							</svg>
						</div>
					<h2>Order completed!</h2>
					<p>You will receive a confirmation email soon!</p>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
		
	</main>
	<!--/main-->
	
	<?php include_once'../includes/footer.php'; ?>