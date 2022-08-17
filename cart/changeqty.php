<?php

include_once'../includes/functions.php';

		$qty = $_POST['qty'];
	  $pid = $_POST['pid'];

	  /*$stmt = $connection->prepare('UPDATE cart SET quantity=?, WHERE id=?');
	  $stmt->bind_param('si',$qty,$pid);
	  $stmt->execute();*/

	  $query = mysqli_query($connection, "UPDATE cart SET quantity='$qty' WHERE id='{$pid}'");

	  if($query){
		echo '<script>alert("Quantity Updated!")</script>';
	  }
?>