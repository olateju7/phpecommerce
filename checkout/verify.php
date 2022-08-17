<?php

include_once'../includes/functions.php';
$method =$_GET['method'];

if($method == "cod"){
	$ref= 'HPMCOD'.uniqid();
	$cusid = $_SESSION['id'];
		$custid =$_SESSION['rId'];
		$cusemail=$_SESSION['email'];
		$checkmethod = 'Delivery';
		$paymentmethod = 'Cash On Delivery';
		if($_COOKIE['houseno']==''){
			$_COOKIE['houseno']='';
		}else{
		$billing = $_COOKIE['houseno'];
		}
		$query = mysqli_query($connection,"SELECT * FROM cart WHERE customerid ='{$cusid}'");
			while($row=mysqli_fetch_assoc($query)){
				$cartid = $row['id'];
				$code = $row['product_code'];
				$pqty =$row['quantity'];

				$select = $pdo->prepare("select * from products where code='$code'");
				$select->execute();
				$row1=$select->fetch(PDO::FETCH_OBJ);

				$productname =$row1->name;
				$pimage =$row1->image;
				$product_price =$row1->price;
				$tprice =($pqty * $row1->price);
				
				date_default_timezone_set('Africa/Lagos');
				$date = date('d/m/Y');
				$time =date('h:i:s a', time());
				$sql = "INSERT IGNORE INTO tbl_order (reference_no, customerid, customer_email, product_name, product_image, product_price, qty, total_price, date, time, method, paymentmethod, billing) VALUES('$ref','$custid','$cusemail','$productname','$pimage','$product_price','$pqty','$tprice','$date','$time', '$checkmethod', '$paymentmethod', '$billing')";

				if(mysqli_query($connection,$sql)){
					header("Location: ../confirm?status=success&ref=$ref");
				}else{
					echo 'nnnnn';
					header("Location: error.php?status=cod&ref=$ref");
				}
			}
}else if($method == "cop"){
	$ref= 'HPMCOP'.uniqid();
	$cusid = $_SESSION['id'];
		$custid =$_SESSION['rId'];
		$cusemail=$_SESSION['email'];
		$checkmethod ='Pickup';
		$paymentmethod = 'Cash On PickUp';
		if($_COOKIE['houseno']==''){
			$_COOKIE['houseno']='';
		}else{
		$billing = $_COOKIE['houseno'];
		}
		$query = mysqli_query($connection,"SELECT * FROM cart WHERE customerid ='{$cusid}'");
			
		while($row=mysqli_fetch_assoc($query)){
			$cartid = $row['id'];
			$code = $row['product_code'];
			$pqty =$row['quantity'];

			$select = $pdo->prepare("select * from products where code='$code'");
			$select->execute();
			$row1=$select->fetch(PDO::FETCH_OBJ);

			$productname =$row1->name;
			$pimage =$row1->image;
			$product_price =$row1->price;
			$tprice =($pqty * $row1->price);
			
			date_default_timezone_set('Africa/Lagos');
			$date = date('d/m/Y');
			$time =date('h:i:s a', time());
			$sql = "INSERT IGNORE INTO tbl_order (reference_no, customerid, customer_email, product_name, product_image, product_price, qty, total_price, date, time, method, paymentmethod, billing) VALUES('$ref','$custid','$cusemail','$productname','$pimage','$product_price','$pqty','$tprice','$date','$time', '$checkmethod', '$paymentmethod', '$billing')";

			if(mysqli_query($connection,$sql)){
				header("Location: ../confirm?status=success&ref=$ref");
			}else{
				echo 'nnnnn';
				header("Location: error.php?status=cod&ref=$ref");
			}
		}
}else{
	$ref = $_GET['reference'];
	$checkmethod=$_GET['meth'];
	$paymentmethod="paystack";

	$cusid = $_SESSION['id'];
		$custid =$_SESSION['rId'];
		$cusemail=$_SESSION['email'];

	if($_COOKIE['houseno']==''){
		$_COOKIE['houseno']='';
	}else{
	$billing = $_COOKIE['houseno'];
	}
	$query = mysqli_query($connection,"SELECT * FROM cart WHERE customerid ='{$cusid}'");
		
	while($row=mysqli_fetch_assoc($query)){
		$cartid = $row['id'];
		$code = $row['product_code'];
		$pqty =$row['quantity'];

		$select = $pdo->prepare("select * from products where code='$code'");
		$select->execute();
		$row1=$select->fetch(PDO::FETCH_OBJ);

		$productname =$row1->name;
		$pimage =$row1->image;
		$product_price =$row1->price;
		$tprice =($pqty * $row1->price);
		
		date_default_timezone_set('Africa/Lagos');
		$date = date('d/m/Y');
		$time =date('h:i:s a', time());
		$sql = "INSERT IGNORE INTO tbl_order (reference_no, customerid, customer_email, product_name, product_image, product_price, qty, total_price, date, time, method, paymentmethod, billing) VALUES('$ref','$custid','$cusemail','$productname','$pimage','$product_price','$pqty','$tprice','$date','$time', '$checkmethod', '$paymentmethod', '$billing')";

		if(mysqli_query($connection,$sql)){
			header("Location: ../confirm?status=success&ref=$ref");
		}else{
			echo 'nnnnn';
			header("Location: error.php?status=cod&ref=$ref");
		}
	}
}

?>