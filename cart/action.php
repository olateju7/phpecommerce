<?php
include_once'../includes/functions.php';
// Remove single items from cart
if (isset($_GET['remove'])) {
	$id = $_GET['remove'];

	$stmt = $connection->prepare('DELETE FROM cart WHERE id=?');
	$stmt->bind_param('i',$id);
	$stmt->execute();

	$_SESSION['showAlert'] = 'block';
	$_SESSION['message'] = 'Item removed from the cart!';
	header('location:../cart');
  }


  if(isset($_GET['add'])){
	$wishid =$_GET['add'];
	$customerid = $_SESSION['id'];
	$query = mysqli_query($connection, "SELECT * FROM wishlist WHERE id='{$wishid}'");

	while($t=mysqli_fetch_assoc($query)){
		$pcode = $t['product_code'];
	}
	$pqty =1;

	$query2 = mysqli_query($connection, "SELECT * FROM cart WHERE product_code='{$pcode}'");

	if(mysqli_num_rows($query2) >0){
		echo '<script>alert("Item already in your your Cart!");</script>';
		$deletedata = "DELETE FROM wishlist WHERE id ='{$wishid}'";
		mysqli_query($connection, $deletedata);
		header('location:../wishlist');
	}else{

		$sql = "INSERT INTO cart(customerid, product_code, quantity) VALUES('$customerid','$pcode', '$pqty')";

		$query2 =mysqli_query($connection,$sql);
			if($query2){
				echo '
						  <script>alert("Item added to your Cart!");</script>';
						$deletedata = "DELETE FROM wishlist WHERE id ='{$wishid}'";
						mysqli_query($connection, $deletedata);
						header('location:../cart');
			}
	}
  }
?>