<footer class="revealed">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3 data-target="#collapse_1">Quick Links</h3>
					<div class="collapse dont-collapse-sm links" id="collapse_1">
						<ul>
							<li><a href="../about.html">About us</a></li>
							<li><a href="../account">My account</a></li>
							<li><a href="../contacts.html">Contacts</a></li>
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
							<li><a href="../category/?cat=<?= $row['id'] ?>"><?= $row['category'] ?></a></li>
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
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="../img/twitter_icon.svg" alt="" class="lazy"></a></li>
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="../img/facebook_icon.svg" alt="" class="lazy"></a></li>
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="../img/instagram_icon.svg" alt="" class="lazy"></a></li>
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="../img/youtube_icon.svg" alt="" class="lazy"></a></li>
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
						<li><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="../img/cards_all.svg" alt="" width="198" height="30" class="lazy"></li>
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


  <script type="text/javascript">
  $(document).ready(function() {

	$(document).on("click", ".addToCart", function(e){
		e.preventDefault();
		var pcode =$(this).attr("id");
		var pqty = 1;
		$.ajax({
			url: "../includes/addcart.php",
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


	$(document).on("click", ".addCart", function(e){
		e.preventDefault();
		var pcode =$(this).attr("id");
		var pqty = $("#cartqty").val();
		$.ajax({
			url: "../includes/addcart.php",
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
			url: "../includes/addwish.php",
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
			url: "../includes/newsletter.php",
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
        url: '../includes/action.php',
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
        url: '../includes/action.php',
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
			url: '../includes/showcart.php',
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
			url: '../includes/showwish.php',
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
    <script src="../js/common_scripts.min.js"></script>
    <script src="../js/main.js"></script>
	
	<!-- SPECIFIC SCRIPTS -->
	<!--<script src="js/jquery.cookiebar.js"></script>-->


</body>
</html>