<?php

include_once'includes/functions.php';

	$pcode = $_POST['pcode'];
	  $pqty = $_POST['pqty'];

	  $customerid = $_SESSION['id'];
	  $query = mysqli_query($connection, "SELECT product_code FROM cart WHERE product_code= '{$pcode}' AND customerid='{$customerid}'");

	  if(mysqli_num_rows($query) > 0){
				echo '<script>alert("Item already added to your Cart!")</script>';
	  }else{
		$sql = "INSERT INTO cart(customerid, product_code, quantity) VALUES('$customerid','$pcode', '$pqty')";

		mysqli_query($connection,$sql);
			echo '
			<script>alert("Item added to your Cart!")</script>';
	}
?>