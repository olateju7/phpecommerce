<?php include_once'../includes/functions.php'; ?>

<?php

if(isset($_GET['code'])){
	$code = $_GET['code'];
}else{
	header("location: ../");
}

$query = mysqli_query($connection, "SELECT * FROM products WHERE code='{$code}'");

while($row=mysqli_fetch_assoc($query)){
	$pname = $row['name'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>Leave Review | Allaia</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="../img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="../img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="../img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="../img/apple-touch-icon-144x144-precomposed.png">
	
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="../css/bootstrap.custom.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

	<!-- SPECIFIC CSS -->
    <link href="../css/leave_review.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="../css/custom.css" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

</head>

<body>

	<div id="page">
		
	<?php include_once'../includes/header.php'; ?>
	<!-- /header -->
	
	<main class="bg_gray">
	
		<!-- /container -->
		<div class="container margin_60_35">
	
	<div class="row justify-content-center">
		<div class="col-lg-12">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li>Leave Review</li>
				</ul>
			</div>
			<h1>Leave Review -</h1>
			
		</div></div>
		<?php

			if(isset($_POST['submit'])){
				$pcode = $_POST['code'];
				$rating = $_POST['rate'];
				$title = $_POST['title'];
				$review = $_POST['review'];

				$sql = mysqli_query($connection, "INSERT INTO product_review (code, rating, title, review) VALUES('$pcode', '$rating', '$title', '$review')");

			if($sql){
				echo "<script>alert('Review Submitted.')</script>";
			}else{
				echo "<script>alert('Error connecting with Database')</script>";
			}
			}

		?>
		<div class="col-lg-8">
			<div class="write_review">
				<h1>Write a review for <?= $pname ?></h1>
				<form method="post" action="">
					<input type="hidden" name="code" value="<?= $code; ?>">
				<div class="rating_submit">
					<div class="form-group">
					<label class="d-block">Overall rating</label>
					<span class="rating mb-0">
						<input type="radio" class="rating-input" id="5_star" name="rate" value="5"><label for="5_star" class="rating-star"></label>
						<input type="radio" class="rating-input" id="4_star" name="rate" value="4"><label for="4_star" class="rating-star"></label>
						<input type="radio" class="rating-input" id="3_star" name="rate" value="3"><label for="3_star" class="rating-star"></label>
						<input type="radio" class="rating-input" id="2_star" name="rate" value="2"><label for="2_star" class="rating-star"></label>
						<input type="radio" class="rating-input" id="1_star" name="rate" value="1"><label for="1_star" class="rating-star"></label>
					</span>
					</div>
				</div>
				<!-- /rating_submit -->
				<div class="form-group">
					<label>Title of your review</label>
					<input class="form-control" name="title" type="text" placeholder="If you could say it in one sentence, what would you say?">
				</div>
				<div class="form-group">
					<label>Your review</label>
					<textarea class="form-control" name="review" style="height: 180px;" placeholder="Write your review to help others learn about this online business"></textarea>
				</div>
				<button type="submit" name="submit" class="btn_1">Submit Review</button>
				</form>
			</div>
		</div>
</div>
<!-- /row -->
</div>
	</main>
	<!--/main-->


	<?php include_once'../includes/footer.php'; ?>