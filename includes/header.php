<header class="version_1">
		<div class="layer"></div><!-- Mobile menu overlay mask -->
		<div class="main_header">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
						<div id="logo">
							<a href="../"><img src="../img/logo.svg" alt="" width="100" height="35"></a>
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
								<a href="../"><img src="img/logo_black.svg" alt="" width="100" height="35"></a>
								<a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
							</div>
							<ul>
								<li><a href="../">Home</a></li>
								<li><a href="../about.html">About</a></li>
								<li><a href="../contacts.html">Contact</a></li>
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
											<li style="text-transform: uppercase;"><span><a href="../category?cat=<?= $row['id'] ?>"><?= $row['category'] ?></a></span></li>
											<?php endwhile; ?>
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</div>
					<div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
						<div class="custom-search-input">
						<form action="../search" method="get">
							<input type="text" name="query" placeholder="Search over <?= count_products() ?> products">
							<button type="submit" name="search"><i class="header-icon_search_custom"></i></button>
							</form>
						</div>
					</div>
					<div class="col-xl-3 col-lg-2 col-md-3">
						<ul class="top_tools">
							<li>
								<div class="dropdown dropdown-cart">
									<a href="../cart" class="cart_bt"><strong><span id="cart-item"></span></strong></a>
									<div class="dropdown-menu">
										<ul id="carthome">
											
										</ul>
										<div class="total_drop">
											<a href="../cart" class="btn_1 outline">View Cart</a><a href="../checkout" class="btn_1">Checkout</a>
										</div>
									</div>
								</div>
								<!-- /dropdown-cart-->
							</li>
							<li>
								<div class="dropdown dropdown-cart">
								<a href="../wishlist" class="wishlist"><strong><span id="wish-item"></span></strong></a>
									<div class="dropdown-menu">
										<ul id="wishhome">
											
										</ul>
										<div class="total_drop">
											<a href="../wishlist" class="btn_1 outline">View Wishlist</a>
										</div>
									</div>
								</div>
							</li>
							<li>
								<div class="dropdown dropdown-access">
									<a href="account" class="access_link"><span>Account</span></a>
									<?php

										if(!empty($_SESSION['email'])){
											echo '
											<div class="dropdown-menu">
												<ul>
												<li>
														<a href="#!"><i class="ti-user"></i>'.$_SESSION['firstname'].' '.$_SESSION['lastname'].'</a>
													</li>
													<li>
														<a href="../account#track-order"><i class="ti-truck"></i>Track your Order</a>
													</li>
													<li>
														<a href="../account#order"><i class="ti-package"></i>My Orders</a>
													</li>
													<li>
														<a href="../account"><i class="ti-user"></i>My Profile</a>
													</li>
													<li>
														<a href="../signout.php"><i class="ti-unlock"></i>Log Out</a>
													</li>
												</ul>
											</div>';
										}else{
										echo '<div class="dropdown-menu">
												<a href="../login" class="btn_1">Sign In or Sign Up</a>
												<ul>
													<li>
														<a href="../account#track-order"><i class="ti-truck"></i>Track your Order</a>
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
			<form action="../search" method="get">
				<input type="text" name="query" class="form-control" placeholder="Search over <?= count_products() ?> products">
				<input type="submit" name="search" class="btn_1 full-width" value="Search">
				</form>
			</div>
			<!-- /search_mobile -->
		</div>
		<!-- /main_nav -->
	</header>