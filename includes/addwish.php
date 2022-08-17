<?php

include_once'../includes/functions.php';

	$pcode = $_POST['pcode'];

	  $customerid = $_SESSION['id'];
	  $query = mysqli_query($connection, "SELECT product_code FROM wishlist WHERE product_code= '{$pcode}' AND customerid='{$customerid}'");

	  if(mysqli_num_rows($query) > 0){
				echo '<script>alert("Item already added to your Wishlist!")</script>';
	  }else{
		$sql = "INSERT INTO wishlist(customerid, product_code) VALUES('$customerid','$pcode')";

		mysqli_query($connection,$sql);
			echo '
						  <script>alert("Item added to your Wishlist!")</script>
						';
	}
?>