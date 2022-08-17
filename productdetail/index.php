<?php include_once'../includes/functions.php'; ?>

<?php
$id =$_GET['id'];
$query = mysqli_query($connection, "SELECT * FROM `products` WHERE id='{$id}'");

while($row=mysqli_fetch_assoc($query)){
	$name = $row['name'];
	$code = $row['code'];
	$description = $row['description'];
	$price = $row['price'];
	$category = $row['category'];
	$brand = $row['brand'];
	$stock = $row['stock'];
	$image = $row['image'];
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
    <title><?= $name; ?></title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
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
    <link href="../css/product_page.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="../css/custom.css" rel="stylesheet">

</head>

<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
	<div id="page">
	
	<?php include_once'../includes/header.php'; ?>

	<main>
	    <div class="container margin_30">
	        <!--<div class="countdown_inner">-20% This offer ends in <div data-countdown="2019/05/15" class="countdown"></div>
	        </div>-->
	        <div class="row">
	            <div class="col-md-6">
					<div class="img"></div>        
	                <img src="../images/products/<?= $image ?>" alt="">
	            </div>
	            <div class="col-md-6">
	                <div class="breadcrumbs">
	                    <ul>
	                        <li><a href="../">Home</a></li>
	                        <li><a href="#">Products</a></li>
	                        <li><?= $name ?></li>
	                    </ul>
	                </div>
	                <!-- /page_header -->
	                <div class="prod_info">
	                    <h1><?= $name ?></h1>
	                    <span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i><em>4 reviews</em></span>
	                    <p><small>CODE: <?= $code ?></small><br>CATEGORY: <?= $category ?><br>BRAND: <?= $brand ?><br><?= substr($description, 25) ?></p>
	                    <div class="prod_options">
	                        <div class="row">
	                            <label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong>Quantity</strong></label>
	                            <div class="col-xl-4 col-lg-5 col-md-6 col-6">
	                                <div class="form-group">
	                                    <input type="number" min="1" id="cartqty" value="1" class="form-control text-center" name="quantity_1">
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="row">
	                        <div class="col-lg-5 col-md-6">
	                            <div class="price_main"><span class="new_price">&#8358;<?= number_format($price, 2) ?></span><span class="percentage">-5%</span> <span class="old_price">&#8358;<?= number_format(($price * 1.05), 2) ?></span></div>
	                        </div>
	                        <div class="col-lg-4 col-md-6">
	                            <div class="btn_add_to_cart"><button class="addCart btn_1" id="<?= $code ?>" href="#0">Add to Cart</button></div>
	                        </div>
	                    </div>
	                </div>
	                <!-- /prod_info -->
	                <div class="product_actions">
	                    <ul>
	                        <li>
	                            <button class="addToWish" id="<?= $code ?>" style="border:none;"><i class="ti-heart"></i><span>Add to Wishlist</span></button>
	                        </li>
	                    </ul>
	                </div>
	                <!-- /product_actions -->
	            </div>
	        </div>
	        <!-- /row -->
	    </div>
	    <!-- /container -->
	    
	    <div class="tabs_product">
	        <div class="container">
	            <ul class="nav nav-tabs" role="tablist">
	                <li class="nav-item">
	                    <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab">Description</a>
	                </li>
	                <li class="nav-item">
	                    <a id="tab-B" href="#pane-B" class="nav-link" data-toggle="tab" role="tab">Reviews</a>
	                </li>
	            </ul>
	        </div>
	    </div>
	    <!-- /tabs_product -->
	    <div class="tab_content_wrapper">
	        <div class="container">
	            <div class="tab-content" role="tablist">
	                <div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
	                    <div class="card-header" role="tab" id="heading-A">
	                        <h5 class="mb-0">
	                            <a class="collapsed" data-toggle="collapse" href="#collapse-A" aria-expanded="false" aria-controls="collapse-A">
	                                Description
	                            </a>
	                        </h5>
	                    </div>
	                    <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
	                        <div class="card-body">
	                            <div class="row justify-content-between">
	                                <div class="col-lg-6">
	                                    <h3>Details</h3>
										<?= $description ?>
	                                </div>
	                                <div class="col-lg-5">
	                                    <h3>Specifications</h3>
	                                    <div class="table-responsive">
	                                        <table class="table table-sm table-striped">
	                                            <tbody>
	                                                <tr>
	                                                    <td><strong>Code</strong></td>
	                                                    <td><?= $code ?></td>
	                                                </tr>
	                                                
	                                                <tr>
	                                                    <td><strong>Category</strong></td>
	                                                    <td><?= $category ?></td>
	                                                </tr>
	                                                <tr>
	                                                    <td><strong>Manufacturer</strong></td>
	                                                    <td><?= $brand ?></td>
	                                                </tr>
	                                            </tbody>
	                                        </table>
	                                    </div>
	                                    <!-- /table-responsive -->
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- /TAB A -->
	                <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
	                    <div class="card-header" role="tab" id="heading-B">
	                        <h5 class="mb-0">
	                            <a class="collapsed" data-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
	                                Reviews
	                            </a>
	                        </h5>
	                    </div>
	                    <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
	                        <div class="card-body">
	                            <div class="row justify-content-between">
									<?php

										$review = mysqli_query($connection, "SELECT * FROM `product_review` WHERE code='{$code}'");
										while($row=mysqli_fetch_assoc($review)):
									?>
	                                <div class="col-lg-6">
	                                    <div class="review_content">
	                                        <div class="clearfix add_bottom_10">
	                                            <span class="rating">
													<?php

														if($row['rating'] >=1 && $row['rating']<2){
															echo '<i class="icon-star"></i>
															<i class="icon-star empty"></i>
															<i class="icon-star empty"></i>
															<i class="icon-star empty"></i>
															<i class="icon-star empty"></i>';
														}else if($row['rating'] >=2 && $row['rating']<3){
															echo '<i class="icon-star"></i>
															<i class="icon-star"></i>
															<i class="icon-star empty"></i>
															<i class="icon-star empty"></i>
															<i class="icon-star empty"></i>';
														}else if($row['rating'] >=3 && $row['rating']<4){
															echo '<i class="icon-star"></i>
															<i class="icon-star"></i>
															<i class="icon-star"></i>
															<i class="icon-star empty"></i>
															<i class="icon-star empty"></i>';
														}else if($row['rating'] >=4 && $row['rating']<5){
															echo '<i class="icon-star"></i>
															<i class="icon-star"></i>
															<i class="icon-star"></i>
															<i class="icon-star"></i>
															<i class="icon-star empty"></i>';
														}else{
															echo '<i class="icon-star"></i>
															<i class="icon-star"></i>
															<i class="icon-star"></i>
															<i class="icon-star"></i>
															<i class="icon-star"></i>';
														}
													?>
													<em><?= number_format($row['rating'],1) ?>/5.0</em>
												</span>
	                                            <em>Published <?= $row['date'] ?></em>
	                                        </div>
	                                        <h4>"<?= $row['title'] ?>"</h4>
	                                        <p><?= $row['review'] ?></p>
	                                    </div>
	                                </div>
									<?php endwhile; ?>
	                            </div>
	                            <!-- /row -->
	                            <p class="text-right"><a href="../leave-review?code=<?= $code ?>" class="btn_1">Leave a review</a></p>
	                        </div>
	                        <!-- /card-body -->
	                    </div>
	                </div>
	                <!-- /tab B -->
	            </div>
	            <!-- /tab-content -->
	        </div>
	        <!-- /container -->
	    </div>
	    <!-- /tab_content_wrapper -->

	    <div class="container margin_60_35">
	        <div class="main_title">
	            <h2>Related</h2>
	            <span>Products</span>    
			</div>
	        <div class="owl-carousel owl-theme products_carousel">
			<?php
					
					$query2 = mysqli_query($connection, "SELECT * FROM `products` WHERE category='{$category}' OR brand='{$brand}' ORDER BY RAND()");
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

	    <div class="feat">
			<div class="container">
				<ul>
					<li>
						<div class="box">
							<i class="ti-gift"></i>
							<div class="justify-content-center">
								<h3>Free Shipping</h3>
								<p>For all oders over $99</p>
							</div>
						</div>
					</li>
					<li>
						<div class="box">
							<i class="ti-wallet"></i>
							<div class="justify-content-center">
								<h3>Secure Payment</h3>
								<p>100% secure payment</p>
							</div>
						</div>
					</li>
					<li>
						<div class="box">
							<i class="ti-headphone-alt"></i>
							<div class="justify-content-center">
								<h3>24/7 Support</h3>
								<p>Online top support</p>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<!--/feat-->

	</main>
	<!-- /main -->
	
	<?php include_once'../includes/footer.php'; ?>