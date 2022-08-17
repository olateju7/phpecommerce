<?php include_once'../includes/functions.php'; ?>

<?php

	$searchquery = $_GET['query'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title><?= $searchquery ?> | Allaia</title>

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
    <link href="../css/home_1.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="../css/custom.css" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

</head>

<body>
<div id="page">
		
		<?php include_once'../includes/header.php'; ?>
		<!-- /header -->

		<main>
		
		<div class="container margin_60_35">
			<div class="main_title">
				<h2><?= $searchquery ?></h2>
				<span>Products</span>
			</div>
			<div id="message"></div>
			<div class="row small-gutters">
				<?php
					
					$query2 = mysqli_query($connection, "SELECT * FROM `products` WHERE name LIKE '%$searchquery%' OR category LIKE '%$searchquery%' OR code LIKE '%$searchquery%' OR description LIKE '%$searchquery%' OR brand LIKE '%$searchquery%' OR price LIKE '%$searchquery%' ORDER BY RAND() ");
					while($row=mysqli_fetch_assoc($query2)):
				?>
				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<figure>
							<span class="ribbon off">-5%</span>
							<a href="productdetail/?id=<?= $row['id'] ?>">
								<img class="img-fluid lazy" src="../images/products/<?= $row['image'] ?>" data-src="../images/products/<?= $row['image'] ?>" alt="">
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="../productdetail/?id=<?= $row['id'] ?>">
							<h3><?= $row['name'] ?></h3>
						</a>
						<div class="price_box">
							<span class="new_price">&#8358; <?= number_format($row['price'],2) ?></span>
							<span class="old_price">>&#8358; <?= number_format(($row['price'] * 1.05),2) ?></span>
						</div>
						<ul>
							<li>
							<input type="hidden" name="pcode" class="pcode" value="<?= $row['code'] ?>">
									<button class="tooltip-1 addToWish" id="<?= $row['code'] ?>" data-toggle="tooltip" data-placement="left" title="Add to Wishlist"><i class="ti-heart"></i></button>
							</li>
							<li>
									<input type="hidden" name="pcode" class="pcode" value="<?= $row['code'] ?>">
									<input type="hidden" name="pqty" class="pqty" value="1">
									<button class="tooltip-1 addToCart" id="<?= $row['code'] ?>" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i></button>
							</li>
						</ul>
					</div>
					<!-- /grid_item -->
				</div>
				<?php endwhile; ?>
				<!-- /col -->
			</div>
			<!-- /row -->
		</div>
	</main>

	<?php include_once'../includes/footer.php'; ?>