<?php
include_once'includes/functions.php';


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>Allaia</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
	
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="css/bootstrap.custom.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

	<!-- SPECIFIC CSS -->
    <link href="css/home_1.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">

</head>

<body>
	
	<div id="page">
		<div id="message"></div>
	<header class="version_1">
		<div class="layer"></div><!-- Mobile menu overlay mask -->
		<div class="main_header">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
						<div id="logo">
							<a href=""><img src="img/logo.svg" alt="" width="100" height="35"></a>
						</div>
					</div>
					<nav class="col-xl-6 col-lg-7">
						<a class="open_close" href="javascript:void(0);">
							<div class="hamburger hamburger--spin">
								<div class="hamburger-box">
									<div class="hamburger-inner"></div>
								</div>
							</div>
						</a>
						<!-- Mobile menu button -->
						<div class="main-menu">
							<div id="header_menu">
								<a href=""><img src="img/logo_black.svg" alt="" width="100" height="35"></a>
								<a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
							</div>
							<ul>
								<li><a href="">Home</a></li>
								<li><a href="about.html">About</a></li>
								<li><a href="contacts.html">Contact</a></li>
							</ul>
						</div>
						<!--/main-menu -->
					</nav>
					<div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-right">
						<a class="phone_top" href="tel://9438843343"><strong><span>Need Help?</span>+234 903 005 7103</strong></a>
					</div>
				</div>
				<!-- /row -->
			</div>
		</div>
		<!-- /main_header -->

		<div class="main_nav Sticky">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-xl-3 col-lg-3 col-md-3">
						<nav class="categories">
							<ul class="clearfix">
								<li><span>
										<a href="#">
											<span class="hamburger hamburger--spin">
												<span class="hamburger-box">
													<span class="hamburger-inner"></span>
												</span>
											</span>
											Categories
										</a>
									</span>
									<div id="menu">
										<ul>
											<?php
											$query = mysqli_query($connection, "SELECT * FROM `product_category`");

											while($row=mysqli_fetch_assoc($query)):
											?>
											<li style="text-transform: uppercase;"><span><a href="category?cat=<?= $row['id'] ?>"><?= $row['category'] ?></a></span></li>
											<?php endwhile; ?>
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</div>
					<div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
						<div class="custom-search-input">
							<form action="search" method="get">
							<input type="text" name="query" placeholder="Search over <?= count_products() ?> products">
							<button type="submit" name="search"><i class="header-icon_search_custom"></i></button>
							</form>
						</div>
					</div>
					<div class="col-xl-3 col-lg-2 col-md-3">
						<ul class="top_tools">
							<li>
								<div class="dropdown dropdown-cart">
									<a href="cart" class="cart_bt"><strong><span id="cart-item"></span></strong></a>
									<div class="dropdown-menu">
										<ul id="carthome">
											
										</ul>
										<div class="total_drop">
											<a href="cart" class="btn_1 outline">View Cart</a><a href="checkout" class="btn_1">Checkout</a>
										</div>
									</div>
								</div>
								<!-- /dropdown-cart-->
							</li>
							<li>
								<div class="dropdown dropdown-cart">
								<a href="wishlist" class="wishlist"><strong><span id="wish-item"></span></strong></a>
									<div class="dropdown-menu">
										<ul id="wishhome">
											
										</ul>
										<div class="total_drop">
											<a href="wishlist" class="btn_1 outline">View Wishlist</a>
										</div>
									</div>
								</div>
							</li>
							<li>
								<div class="dropdown dropdown-access">
									<a href="account.html" class="access_link"><span>Account</span></a>
									<?php

										if(!empty($_SESSION['email'])){
											echo '
											<div class="dropdown-menu">
												<ul>
												<li><a href="#!"><i class="ti-user"></i>'. $_SESSION['firstname'].' '.$_SESSION['lastname'].'</a></li>
												<li>
													<a href="account#track-order"><i class="ti-truck"></i>Track your Order</a>
												</li>
												<li>
													<a href="account#order"><i class="ti-package"></i>My Orders</a>
												</li>
												<li>
													<a href="account#profile"><i class="ti-user"></i>My Profile</a>
												</li>
												<li>
													<a href="signout.php"><i class="ti-unlock"></i>Sign Out</a>
												</li>
												</ul>
											</div>';
										}else{
										echo '<div class="dropdown-menu">
												<a href="login" class="btn_1">Sign In or Sign Up</a>
												<ul>
													<li>
														<a href="account#track-order"><i class="ti-truck"></i>Track your Order</a>
													</li>
													
												</ul>
											</div>';
										}
									?>
								</div>
								<!-- /dropdown-access-->
							</li>
							<li>
								<a href="javascript:void(0);" class="btn_search_mob"><span>Search</span></a>
							</li>
							<li>
								<a href="#menu" class="btn_cat_mob">
									<div class="hamburger hamburger--spin" id="hamburger">
										<div class="hamburger-box">
											<div class="hamburger-inner"></div>
										</div>
									</div>
									Categories
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<div class="search_mob_wp">
				<form action="search" method="get">
				<input type="text" name="query" class="form-control" placeholder="Search over <?= count_products() ?> products">
				<input type="submit" name="search" class="btn_1 full-width" value="Search">
				</form>
			</div>
			<!-- /search_mobile -->
		</div>
		<!-- /main_nav -->
	</header>
	<!-- /header -->
		
	<main>
		<div id="carousel-home">
			<div class="owl-carousel owl-theme">
				<?php
					$query3 = mysqli_query($connection, "SELECT * FROM `products` WHERE slideshow='yes'");
					while($row=mysqli_fetch_assoc($query3)):
				?>
				<div class="owl-slide cover" style="background-image: url(images/products/<?= $row['image'] ?>);">
					<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<div class="container">
							<div class="row justify-content-center justify-content-md-end">
								<div class="col-lg-6 static">
									<div class="slide-text text-right white">
										<h2 class="owl-slide-animated owl-slide-title"><?= $row['name'] ?></h2>
										<p class="owl-slide-animated owl-slide-subtitle">
											Limited items available at this price
										</p>
										
										<div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="detail?id=<?= $row['id'] ?>" role="button">Shop Now</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
			</div>
			<div id="icon_drag_mobile"></div>
		</div>
		<!--/carousel-->

		<ul id="banners_grid" class="clearfix">
			<?php

			$getcat = mysqli_query($connection, "SELECT * FROM product_category ORDER BY RAND() LIMIT 3");
			while($row=mysqli_fetch_array($getcat)):
				?>
			<li>
				<a href="category/?cat=<?= $row['id'] ?>" class="img_container">
					<img src="img/banners_cat_placeholder.jpg" data-src="images/cat.jpg" alt="" class="lazy">
					<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<h3><?= $row['category'] ?></h3>
						<div><span class="btn_1">Shop Now</span></div>
					</div>
				</a>
			</li>
			<?php endwhile; ?>
		</ul>
		<!--/banners_grid -->
		
		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Top Selling</h2>
				<span>Products</span>
				<p></p>
			</div>
			<div id="message"></div>
			<div class="row small-gutters">
				<?php
					
					$query2 = mysqli_query($connection, "SELECT * FROM `products` ORDER BY RAND() LIMIT 8 ");
					while($row=mysqli_fetch_assoc($query2)):
				?>
				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<figure>
							<span class="ribbon off">-5%</span>
							<a href="productdetail/?id=<?= $row['id'] ?>">
								<img class="img-fluid lazy" src="images/products/<?= $row['image'] ?>" data-src="images/products/<?= $row['image'] ?>" alt="">
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="productdetail/?id=<?= $row['id'] ?>">
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

		$query5 = mysqli_query($connection, "SELECT * FROM `products` ORDER BY RAND() LIMIT 1 ");
					while($row=mysqli_fetch_assoc($query5)){
		echo'<div class="featured lazy" data-bg="url(images/products/'.$row['image'].')">
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
								<a class="btn_1" href="productdetail/?id='. $row['id'].'" role="button">Shop Now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>';
					}
		?>

		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Featured</h2>
				<span>Products</span>
				<p>Scroll to find Products</p>
			</div>
			<div id="product-slide" class="owl-carousel owl-theme products_carousel">
			<?php
					
					$query2 = mysqli_query($connection, "SELECT * FROM `products` ORDER BY RAND()");
					while($row=mysqli_fetch_assoc($query2)):
				?>
				<div class="item">
					<div class="grid_item">
						<figure>
							<a href="productdetail/?id=<?= $row['id'] ?>">
								<img class="owl-lazy" src="images/products/<?= $row['image'] ?>" data-src="images/products/<?= $row['image'] ?>" alt="">
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="productdetail/?id=<?= $row['id'] ?>">
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
	<!-- /main -->
		
	<footer class="revealed">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3 data-target="#collapse_1">Quick Links</h3>
					<div class="collapse dont-collapse-sm links" id="collapse_1">
						<ul>
							<li><a href="about.html">About us</a></li>
							<li><a href="account">My account</a></li>
							<li><a href="contacts.html">Contacts</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3 data-target="#collapse_2">Categories</h3>
					<div class="collapse dont-collapse-sm links" id="collapse_2">
						<ul>
							<?php
								$query = mysqli_query($connection, "SELECT * FROM `product_category`");

								while($row=mysqli_fetch_assoc($query)):
							?>
							<li><a href="category/?cat=<?= $row['id'] ?>"><?= $row['category'] ?></a></li>
							<?php endwhile; ?>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
						<h3 data-target="#collapse_3">Contacts</h3>
					<div class="collapse dont-collapse-sm contacts" id="collapse_3">
						<ul>
							<li><i class="ti-home"></i>Allaia Store.</li>
							<li><i class="ti-headphone-alt"></i>+234 903 005 7103</li>
							<li><i class="ti-email"></i><a href="#0">info@allaia.com</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
						<h3 data-target="#collapse_4">Keep in touch</h3>
					<div class="collapse dont-collapse-sm" id="collapse_4">
						<div id="newsletter">
						    <div class="form-group">
						        <input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
						        <button type="submit" id="submit-newsletter"><i class="ti-angle-double-right"></i></button>
						    </div>
						</div>
						<div class="follow_us">
							<h5>Follow Us</h5>
							<ul>
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/twitter_icon.svg" alt="" class="lazy"></a></li>
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/facebook_icon.svg" alt="" class="lazy"></a></li>
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/instagram_icon.svg" alt="" class="lazy"></a></li>
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/youtube_icon.svg" alt="" class="lazy"></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- /row-->
			<hr>
			<div class="row add_bottom_25">
				<div class="col-lg-6">
					<ul class="footer-selector clearfix">
						<li>
							<div class="styled-select lang-selector">
								<select>
									<option value="English" selected>English</option>
									<option value="French">French</option>
									<option value="Spanish">Spanish</option>
									<option value="Russian">Russian</option>
								</select>
							</div>
						</li>
						<li>
							<div class="styled-select currency-selector">
								<select>
									<option value="US Dollars" selected>Naira</option>
									<option value="Euro">Euro</option>
									<option value="US Dollars">US Dollars</option>
								</select>
							</div>
						</li>
						<li><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/cards_all.svg" alt="" width="198" height="30" class="lazy"></li>
					</ul>
				</div>
				<div class="col-lg-6">
					<ul class="additional_links">
						<li><a href="#0">Terms and conditions</a></li>
						<li><a href="#0">Privacy</a></li>
						<li><span>© <?= date("Y") ?> Allaia</span></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->
	</div>
	<!-- page -->
	
	<div id="toTop"></div><!-- Back to top button -->

	<!--<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {

	$(document).on("click", ".addToCart", function(e){
		e.preventDefault();
		var pcode =$(this).attr("id");
		var pqty =1;
		$.ajax({
			url: "addcart.php",
			type: "POST",
			datatype: "html",
			data: {pcode:pcode, pqty:pqty},
			success: function(response) {
          		load_cart_item_number();
				  show_cart_on_page();
				$("#message").html(response);
        	}
		});
	});

	//Add to Wishlist

	$(document).on("click", ".addToWish", function(e){
		e.preventDefault();
		var pcode =$(this).attr("id");
		$.ajax({
			url: "addwish.php",
			type: "POST",
			datatype: "html",
			data: {pcode:pcode},
			success: function(response) {
				load_wish_item_number();
				  show_wish_on_page();
				$("#message").html(response);
        	}
		});
	});

	$(document).on("click", "#submit-newsletter", function(e){
		e.preventDefault();
		var mail =$("#email_newsletter").val();
		$.ajax({
			url: "newsletter.php",
			type: "POST",
			datatype: "html",
			data: {mail:mail},
			success: function(response) {
				$("#message").html(response);
        	}
		});
	});

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }

	load_wish_item_number();

    function load_wish_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          wishItem: "wish_item"
        },
        success: function(response) {
          $("#wish-item").html(response);
        }
      });
    }

	show_cart_on_page();

	function show_cart_on_page(){
		$.ajax({
			url: 'showcart.php',
			method: 'get',
			data: {
				product: "product"
			},
			success: function(response){
				$("#carthome").html(response);
			}
		});
	}

	show_wish_on_page();

	function show_wish_on_page(){
		$.ajax({
			url: 'showwish.php',
			method: 'get',
			data: {
				product: "product"
			},
			success: function(response){
				$("#wishhome").html(response);
			}
		});
	}

  });
  </script>
	
	<!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.min.js"></script>
    <script src="js/main.js"></script>
	
	<!-- SPECIFIC SCRIPTS -->
	<script src="js/carousel-home.js"></script>
	<!--<script src="js/jquery.cookiebar.js"></script>-->


</body>
</html>