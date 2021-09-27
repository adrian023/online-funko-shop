<?php
session_start();
include("db.php");
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["id"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		header('location:cart.php');
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
		header('location:cart.php');
			}		
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['name'] === $_POST["name"]){
        $value['quantity'] = $_POST["quantity"];
        header('location:cart.php');
        break; // Stop the loop when product is found

    }
}
  	
}

if(!isset($_SESSION['login']))
  { 
header('location:login_reg.php');
}

else {

$account = $_SESSION['idofuser'];
$total=$_GET['total'];

  if (isset($_POST['COD'])) {
  	$total += 100;
    $info = "Cash on Delivery (".$_POST['address'].")";
    $sql = "INSERT INTO purchases(amount,userid,info) VALUES('$total','$account','$info')";
    $result=mysqli_query($con,$sql);
    $lastInsertId = mysqli_insert_id($con);
    if($lastInsertId)
    {
    echo "<script>setTimeout(function(){alert('Purchase Successful!');window.location='cart.php';},500);</script>";
    unset($_SESSION['shopping_cart']);
    }
    else  
    {
    echo "<script>setTimeout(function(){alert('Something went wrong. Please try again');},500);</script>";
    } 
  }

  if (isset($_POST['CreditCard'])) {
  $info = "Credit Card (".$_POST['cardno'].")";  

    $sql = "INSERT INTO purchases(amount,userid,info) VALUES('$total','$account','$info')";
    $result=mysqli_query($con,$sql);
    $lastInsertId = mysqli_insert_id($con);
    if($lastInsertId)
    {
    echo "<script>setTimeout(function(){alert('Purchase Successful!');window.location='cart.php';},500);</script>"; 
    unset($_SESSION['shopping_cart']);
    }
    else  
    {
    echo "<script>setTimeout(function(){alert('Something went wrong. Please try again');},500);</script>";
    } 

  }

  if (isset($_POST['VISA'])) {
  $info = "Visa (".$_POST['cardnumber'].")";

    $sql = "INSERT INTO purchases(amount,userid,info) VALUES('$total','$account','$info')";
    $result=mysqli_query($con,$sql);
    $lastInsertId = mysqli_insert_id($con);
    if($lastInsertId)
    {
    echo "<script>setTimeout(function(){alert('Purchase Successful!');window.location='cart.php';},500);</script>"; 
    unset($_SESSION['shopping_cart']);    
    }
    else  
    {
    echo "<script>setTimeout(function(){alert('Something went wrong. Please try again');},500);</script>";
    } 

  }?>

	<!DOCTYPE html>
	<html>
	<head>
    <meta charset="utf-8">
		<title> Cart </title>
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<link rel="stylesheet" type="text/css" href="css-js/product.css">
		<link rel="stylesheet" type="text/css" href="css-js/cart.css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
	</head>
	
  <body>
    <?php error_reporting(0) ?>
		<?php include('header2.php'); ?>

		<div class="cart-table-container">
		<?php  if(isset($_SESSION["shopping_cart"])){
   		 $total_price = 0;
   		?>
			<table>
				<tr>
					<th></th>
					<th> ITEM NAME </th>
					<th> QUANTITY </th>
					<th> PRICE </th>
					<th> SUBTOTAL </th>
				</tr>

				<?php foreach ($_SESSION["shopping_cart"] as $product){ ?>
				<tr>
				<td><img class='product-image' src='<?php echo $product["image"];?>'/></td>
				
				<td><?php echo $product["name"]; ?><br />
					<form method='post' action=''>
					<input type='hidden' name='id' value="<?php echo $product["name"]; ?>" />
					<input type='hidden' name='action' value="remove" />
					<button type='submit' class='remove-button'>Remove Item</button>
					</form>
				</td>

				<td>
					<form method='post' action=''>
					<input type='hidden' name='name' value="<?php echo $product["name"]; ?>" />
					<input type='hidden' name='action' value="change" />
					<select name='quantity' class='quantity-button' onchange="this.form.submit()">
					<option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
					<option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
					<option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
					<option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
					<option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
					</select>
					</form>
				</td>
				
				<td><?php echo "P ".$product["price"]; ?></td>
				
				<td><?php echo "P ".$product["price"]*$product["quantity"]; ?></td>
				</tr>
				<?php $total_price += ($product["price"]*$product["quantity"]); } ?>


				<?php }else{
					echo "<p class='emptycart-message'> Your cart is empty!</p>"; } ?>

				<div style="clear:both;"></div>
			</table>

      <p class="total-price">TOTAL PRICE: <?php echo "P ".$total_price;?></p>

      <div style="clear:both;"></div>

			<?php if (isset($_SESSION['shopping_cart'])) {
				echo '<a href="cart.php?total='.$total_price.'"><button class="checkout-button" type="button" name="checkout">Proceed to Checkout</button></a>';
				}?>
		</div>

  
      <?php if(isset($_GET['total'])){ ?>

      <div class="payment-container">
      <h1 class="payment-ttl">Select Payment Method</h1>
      <form method="post">
        <select class="select-payment" name="mode" id="modes" onchange="this.form.submit();">
        <?php $mode = $_POST['mode']?>
        <option value="0">Select a Payment Method</option>
        <option <?php if($mode==1) echo "selected";?> value="1">Cash On Delivery</option>
        <option <?php if($mode==2) echo "selected";?> value="2">Credit Card</option>
        <option <?php if($mode==3) echo "selected";?> value="3">Visa</option>
        </select>
      </form>

      <?php
        if (isset($_POST['mode'])&& $mode==1) {
          echo "<form method='post'>
                <p class='payment-subttl'>Enter the Address:</p>
                <input class='payment-input' type='text' placeholder='Complete Address' name='address' required><br>
                <h5>Shipping Fee (P100.00)</h5>
                <input class='submit-payment-button' type='submit' name='COD'>
                </form> "; }

          if (isset($_POST['mode'])&& $mode==2) {
          echo "<form method='post'>
                <p class='payment-subttl'>Enter your Card Number</p>
                <input class='payment-input' type='text' placeholder='Card Number...' name='cardno' required><br>
                <input class='payment-input' type='text' placeholder='Card PIN' required><br>
                <input class='submit-payment-button' type='submit' name='CreditCard'>
                </form>"; }

          if (isset($_POST['mode'])&& $mode==3) {
          echo "<form method='post'>
                <p class='payment-subttl'>Enter your Card Number: </p>
                <input class='payment-input' type='text' placeholder='1111-2222-3333-4444' name='cardnumber' pattern='[0-9]{16}'><br>
                <p class='payment-subttl'>Enter your Security Number (CVV): </p>
                <input class='payment-input' type='text' placeholder='Security Number (CVV) (3)' name='secno' pattern='[0-9]{3}'><br>
                <input class='submit-payment-button' type='submit' name='VISA'>
                </form>"; }}?>
          </div>
	
  </body>

	</html>

<?php } ?>

