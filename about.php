<?php
session_start();
include('db.php');
error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title> About </title>
	<link rel="stylesheet" type="text/css" href="css-js/product.css">
	<link rel="stylesheet" type="text/css" href="css-js/aboutt.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

</head>
<body>
	<?php include('header2.php') ?>

  <div class="bg-container">
    <img class="bg-about" src="images/about.jpg">
    <div class="about-title"> About </div>
    <div class="about-info"> 
        Funko Inc. is an American company that manufactures licensed pop culture collectibles, best known for its licensed vinyl figurines and bobbleheads. In addition, the company produces licensed plush, action figures, and electronic items such as USB drives, lamps, and headphones. <br><br>

        Founded in 1998 by Mike Becker, Funko was originally conceived as a small project to create various low-tech, nostalgia-themed toys. The company's first manufactured bobblehead was of the well-known restaurant advertising icon, the Big Boy mascot. <br>
    </div>
  </div>

  <?php include('footer.php') ?>


</body>
</html>