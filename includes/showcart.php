<?php

include_once'../includes/functions.php';
	$grand_total =0;
	$customerid = $_SESSION['id'];
	$query = mysqli_query($connection, "SELECT * FROM `cart` WHERE customerid='$customerid'");

	while($row=mysqli_fetch_assoc($query)){
		$cartid = $row['id'];
		$code = $row['product_code'];
		$quantity =$row['quantity'];

		$select = $pdo->prepare("select * from products where code='$code'");
		$select->execute();
		$row1=$select->fetch(PDO::FETCH_OBJ);
		echo '
		<li>
			<a href="#0">
				<figure><img src="../images/products/'.$row1->image.'" data-src="../images/products/'.$row1->image.'" alt="" width="50" height="50" class="lazy"></figure>
				<strong><span>'.$quantity.' x '.$row1->name.'</span>&#8358; '.number_format(($row1->price * $quantity),2).'</strong>
			</a>
			<a href="../cart/action.php?remove='.$cartid.'" class="action" onclick="return confirm("Are you sure want to remove this item?");"><i class="ti-trash"></i></a>
		</li>
		';		

		$grand_total += ($row1->price * $quantity);
	}											
?>