<?php

include_once'../includes/functions.php';

	$mail = $_POST['mail'];

	  $query = mysqli_query($connection, "SELECT email FROM newsletter WHERE email= '{$mail}'");

	  if(mysqli_num_rows($query) > 0){
				echo '<script>alert("You have Subscribed earlier!")</script>';
	  }else{
		$sql = "INSERT INTO newsletter(email) VALUES('$mail')";

		mysqli_query($connection,$sql);
			echo '
			<script>alert("Subscribed!")</script>';
	}
?>