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
	<title> Funko Shop </title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="stylesheet" type="text/css" href="css-js/bootstrap.min.css">
  <script src="css-js/jquery.slim.min.js"></script>
  <script src="css-js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" type="text/css" href="css-js/home.css">
  <link rel="stylesheet" type="text/css" href="css-js/product.css">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">
</head>

<body>
	<?php include('header.php');?>

    <section>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner" role="listbox">    
        <div class="carousel-item active" style="background-image: url('images/cslide1.jpg');">
 
        </div> 
        <div class="carousel-item" style="background-image: url('images/cslide2.jpg')">
        </div>
        <div class="carousel-item" style="background-image: url('images/cslide3.jpg')">
        </div>
        <div class="carousel-item" style="background-image: url('images/cslide4.jpg')">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
      </div>
    </section>

    <div class="flex">
      <?php
      $results_per_page = 6;
      $sql = "SELECT * FROM products LIMIT 0,6";
      $result = mysqli_query($con,$sql);
        //display product
      while($row = mysqli_fetch_assoc($result)){
          echo "<section>
                <img src=".$row['image'].">
                <p id='product-name'>".$row['name']."</p>
                <p id='product-description'>".$row['category']."</p>
                  <aside>
                  <ul>
                    <li> Price: P ".$row['price']."</li>
                    <li> Available </li>
                  </ul>
              <form method='post' action=''>
              <input type='hidden' name='id' value=".$row['id']." />                    
                    <button type='submit' name='submit' class='cartbtn'> Add to Cart </button>
                <a href='product-detail.php?pid=".$row['id']."&page=1'><input type='button' class='buybtn' value='View'></a>
              </form>
                  </aside>
                </section>";
              } ?>       
        
        <div class="shopmore" align="center">
          <a class="shopmorebtn" href="shop.php" rel="nofollow">
          <span>Shop more</a></span>
        </div>

    </div>

    <script>
      $(window).scroll(function(){
        $('nav').toggleClass('scrolled', $(this).scrollTop() > 350);
      });
    </script>

  <?php include('footer.php') ;?>
</body>
</html>