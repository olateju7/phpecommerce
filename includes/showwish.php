<?php

include_once'../includes/functions.php';
	$customerid = $_SESSION['id'];
	$query = mysqli_query($connection, "SELECT * FROM `wishlist` WHERE customerid='$customerid'");

	while($row=mysqli_fetch_assoc($query)){
		$wishid = $row['id'];
		$code = $row['product_code'];

		$select = $pdo->prepare("select * from products where code='$code'");
		$select->execute();
		$row1=$select->fetch(PDO::FETCH_OBJ);
		echo '
		<li>
			<a href="#0">
				<figure><img src="../images/products/'.$row1->image.'" data-src="../images/products/'.$row1->image.'" alt="" width="50" height="50" class="lazy"></figure>
				<strong><span> '.$row1->name.'</span></strong>
			</a>
			<a href="../cart/action.php?add='.$wishid.'" class="action"><i class="ti-shopping-cart"></i></a>
		</li>
		';		
	}											
?>