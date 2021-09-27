<?php
session_start();
include('db.php');
error_reporting(0);
$status="";


if (isset($_POST['submit'])&& !isset($_SESSION['login'])) {
  header("Location:login_reg.php");
}
else{
if (isset($_POST['id']) && $_POST['id']!=""){
$id = $_POST['id'];
$result = mysqli_query($con,"SELECT * FROM `products` WHERE `id`='$id'");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$id = $row['id'];
$price = $row['price'];
$image = $row['image'];

$cartArray = array(
  $name=>array(
  'name'=>$name,
  'id'=>$id,
  'price'=>$price,
  'quantity'=>1,
  'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
  $_SESSION["shopping_cart"] = $cartArray;
echo "<script>setTimeout(function(){alert('Product is added to your cart!');},500);</script>";
}else{
  $array_keys = array_keys($_SESSION["shopping_cart"]);
  if(in_array($name,$array_keys)) {
echo "<script>setTimeout(function(){alert('Product is already added to your cart!');},500);</script>";
  } else {
  $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
echo "<script>setTimeout(function(){alert('Product is added to your cart!');},500);</script>";
  }
}
  }
}?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Product Detail </title>
	<link rel="stylesheet" type="text/css" href="css-js/product.css">
	<link rel="stylesheet" type="text/css" href="css-js/product_detail.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">
</head>
<body>
	<?php include('header2.php') ?>

	<?php 
		$pid=$_GET['pid'];
		$page = $_GET['page'];

		$sql = "SELECT * FROM products WHERE id = '$pid'";
		$result = mysqli_query($con,$sql);

		foreach ($result as $results) {
		echo "<
				<form method='post' action=''>			  
				  <input type='hidden' name='id' value=".$results['id']." />
				  <div class='row'>
				  	<div class='column1'>
				  		<img class='product-image' src='".$results['image']."'>
				  	</div>
				  	<div class='column2'>
						  <h1 class='prod-nm'>".$results['name'].
						  "</h1><br><h2 class='prod-desc'>Category: ".$results['category'].
						  "<br>Release Date: ".$results['ReleaseYear'].
						  "<br>Price: P ".$results['price'].
						  "</h2><br>".$results['description']."
					   	  <div class='btn-container'><a href='shop.php?page=". $page . "'><input type='button' class='backtoshopbtn' value='Back to Shop'></a>
						  <button type='submit' class='buybtn' name='submit'>Add to Cart</button></div>
					  </form>
					</div>
			   	  </div> ";
			}
		mysqli_close($con);?>
		<div style="clear:both;"></div>
		</div>

	<?php include('footer.php') ?>
</body>
</html>
