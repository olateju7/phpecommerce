<?php
session_start();
include_once'connectdb.php';
$_SESSION['id']=session_id();

function count_products(){
	global $connection;

	$query = mysqli_query($connection, "SELECT * FROM `products`");

	echo mysqli_num_rows($query);
}

function count_cart(){
	global $connection;
	$customerid = $_SESSION['id'];
	$query = mysqli_query($connection, "SELECT * FROM `cart` WHERE customerid='$customerid'");

	echo mysqli_num_rows($query);
}

function login(){
	global $connection;
	if(isset($_POST['login_submit'])){
		$useremail = $_POST['login_email'];
		$password = $_POST['login_pass'];
		$query = mysqli_query($connection, "SELECT * FROM customer_info WHERE useremail='{$useremail}' AND password='{$password}'");
		if(mysqli_num_rows($query)==0){
			$msg = "<p style='color: red;'>Email or Password is Wrong!</p>";
			echo $msg;
		}else{
			while($row= mysqli_fetch_array($query)){
			$_SESSION['rId']=$row['id'];
			$_SESSION['id']=session_id();
			$_SESSION['lastname']=$row['lastname'];
			$_SESSION['firstname']=$row['firstname'];
			$_SESSION['email']=$row['useremail'];
			$_SESSION['address']=$row['address']. ', '.$row['city']. ', '. $row['country'].'.';
			}
			$msg = '<p style="color: green;">Details Matched!</p>';
			echo $msg;
			if($_GET['ReturnUrl']=="Checkout"){
				echo '<script>window.location.href = "../checkout";</script>';
			}else if($_GET['ReturnUrl']=="account"){
				echo '<script>window.location.href = "../account";</script>';
			}else{
				echo '<script>window.location.href = "../";</script>';
			}
		}

	}
}

function signup(){
	global $connection;
	if(isset($_POST['reg_submit'])){
		$firstname = $_POST['reg_firstname'];
		$lastname = $_POST['reg_lastname'];
		$email = $_POST['reg_email'];
		$phone = $_POST['reg_phone'];
		$password =$_POST['reg_password'];
		$postal = $_POST['reg_postal'];
		$city = $_POST['reg_city'];
		$country =$_POST['reg_country'];
		$address = $_POST['reg_address'];
		$query = mysqli_query($connection, "SELECT * FROM customer_info WHERE useremail='{$email}'");
		if(mysqli_num_rows($query) > 0){
			echo "<p style='color: red;'>Email Already Exist!</p>";
		}else{
			$sql = "INSERT IGNORE INTO customer_info (firstname, lastname, useremail, password, phone, country, postal, city, address) VALUES('$firstname', '$lastname', '$email', '$password', '$phone', '$country', '$postal', '$city', '$address')";

			if(mysqli_query($connection,$sql)){
				echo "<script>alert('Data Submitted. Please login')</script>";
			}else{
				echo "<script>alert('Error connecting with Database')</script>";
			}

			mysqli_close($connection);
		}	
	}
}

?>