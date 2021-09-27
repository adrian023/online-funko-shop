<?php
session_start();
include('db.php');

if(isset($_POST['submit']))
  {
$producttitle=$_POST['producttitle'];
$productdescription=$_POST['productdescription'];
$category=$_POST['category'];
$releasedate=$_POST['releasedate'];
$price=$_POST['price'];
$image="product-images/".$_FILES["image"]["name"];

move_uploaded_file($_FILES["image"]["tmp_name"],"product-images/".$_FILES["image"]["name"]);

$sql="INSERT INTO products(name,category,ReleaseYear,description,price,image) VALUES('$producttitle','$category','$releasedate','$productdescription','$price','$image')";
$result=mysqli_query($con,$sql);
$lastInsertId = mysqli_insert_id($con);
if($lastInsertId)
{
echo "<script>setTimeout(function(){alert('Product Added Successfully!');},500);</script>";
}
else 
{
echo "<script>setTimeout(function(){alert('Error: Something went wrong.');},500);</script>";
}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Item</title>
	<link rel="stylesheet" type="text/css" href="css-js/additem.css">
</head>
<body>
<br><br><br><br><br><div>
<h1>ADD PRODUCT</h1>
	<form method="post" enctype="multipart/form-data">
	<label>Funko Pop Name<span style="color:red">*</span></label>
		<input type="text" name="producttitle" required><br><br>
	<label>Funko Pop Category<span style="color:red">*</span></label>
		<input type="text" name="category" required><br><br>		
	<label>Release Date<span style="color:red">*</span></label>
		<input type="text" name="releasedate" required><br><br>	
	<label>Funko Pop Overview<span style="color:red">*</span></label>
		<textarea  name="productdescription" rows="3" required></textarea><br><br>
	<label>Price (PHP )<span style="color:red">*</span></label>
		<input type="text" name="price" required><br><br>
	Product Image <span style="color:red">*</span><input type="file" name="image" required>
	<br><br><br>
	<button type="reset">Cancel</button>
	<button name="submit" type="submit">Save changes</button>
	<button><a href="adminhome.php">Home</a></button>
	</form></div><br>
</body>
</html>