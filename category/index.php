<?php include_once'../includes/functions.php'; ?>

<?php

	$catid = $_GET['cat'];

	$getcat = mysqli_query($connection, "SELECT * FROM product_category WHERE id='{$catid}'");

	while($row= mysqli_fetch_array($getcat)){
		$category = $row['category'];
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
    <title><?= $category ?> | Allaia</title>

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
				<h2><?= $category ?></h2>
				<span>Products</span>
			</div>
			<div id="message"></div>
			<div class="row small-gutters">
				<?php
					
					$query2 = mysqli_query($connection, "SELECT * FROM `products` WHERE category='{$category}' ORDER BY RAND() LIMIT 8 ");
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
		<!-- /container -->
		<?php

		$query5 = mysqli_query($connection, "SELECT * FROM `products` WHERE category='{$category}' ORDER BY RAND() LIMIT 1 ");

		if(mysqli_num_rows($query5) ==0){
			echo '<h1 class="text-center">No product in this Category</h1>';
		}else{
					while($row=mysqli_fetch_assoc($query5)){
		echo'<div class="featured lazy" data-bg="url(../images/products/'.$row['image'].')">
			<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
				<div class="container margin_60">
					<div class="row justify-content-center justify-content-md-start">
						<div class="col-lg-6 wow" data-wow-offset="150">
							<h3>'.$row['name'].'</h3>
							<p></p>
							<div class="feat_text_block">
								<div class="price_box">
									<span class="new_price">&#8358; '.number_format($row['price'],2).'</span>
									<span class="old_price">&#8358; '. number_format(($row['price'] * 1.05),2).'</span>
								</div>
								<a class="btn_1" href="../productdetail/?id='. $row['id'].'" role="button">Shop Now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>';
					}
				}
		?>

		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Featured</h2>
				<span>Products</span>
			</div>
			<div id="product-slide" class="owl-carousel owl-theme products_carousel">
			<?php
					
					$query2 = mysqli_query($connection, "SELECT * FROM `products` WHERE category='{$category}' ORDER BY RAND()");
					while($row=mysqli_fetch_assoc($query2)):
				?>
				<div class="item">
					<div class="grid_item">
						<figure>
							<a href="../productdetail/?id=<?= $row['id'] ?>">
								<img class="owl-lazy" src="../images/products/<?= $row['image'] ?>" data-src="../images/products/<?= $row['image'] ?>" alt="">
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="../productdetail/?id=<?= $row['id'] ?>">
							<h3><?= $row['name'] ?></h3>
						</a>
						<div class="price_box">
							<span class="new_price">&#8358;<?= number_format($row['price'],2) ?></span>
							<span class="old_price">&#8358;<?= number_format(($row['price'] *1.05),2) ?></span>
						</div>
						<ul>
							<li>
									<input type="hidden" name="pcode" value="<?= $row['code'] ?>">
									<button type="submit" class="tooltip-1 addToWish" id="<?= $row['code'] ?>" data-toggle="tooltip" data-placement="left" title="Add to Wishlist"><i class="ti-heart"></i></button>
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
				<!-- /item -->
			</div>
			<!-- /products_carousel -->
		</div>
		<!-- /container -->
		<!-- /container -->
	</main>

	<?php include_once'../includes/footer.php'; ?>