<?php session_start();
 include ("db.php");


 if(!isset($_SESSION['alogin']))
  { 
header('location:login_reg.php');
}
else{
	$id = $_GET['id'];
	if (isset($_POST['edit'])) {
		$producttitle=$_POST['producttitle'];
		$productdescription=$_POST['productdescription'];
		$category=$_POST['category'];
		$releasedate=$_POST['releasedate'];
		$price=$_POST['price'];

		if (strlen($_FILES["image"]["name"])!=0) {
		$image="product-images/".$_FILES["image"]["name"];
		move_uploaded_file($_FILES["image"]["tmp_name"],"product-images/".$_FILES["image"]["name"]);

		$sql = "update products set name='$producttitle',category='$category',ReleaseYear='$releasedate',description='$productdescription',price='$price', image= '$image' WHERE id ='$id' ";
		$result = mysqli_query($con,$sql);		
		}
		else{
		$sql = "update products set name='$producttitle',category='$category',ReleaseYear='$releasedate',description='$productdescription',price='$price' WHERE id ='$id' ";
		$result = mysqli_query($con,$sql);
	}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title> <link rel="stylesheet" type="text/css" href="css-js/edit.css">
</head>
<body>
<center>
<br>
<br>
<div>
<?php
	$id = $_GET['id'];
	$sql = "SELECT * FROM products WHERE id = '$id'";
	$results = mysqli_query($con,$sql);
	$count= 1;

	if (mysqli_num_rows($results)>0) {
	foreach ($results as $results) {
 ?>
	<form method="post" enctype="multipart/form-data">
	<label>Funko Pop Name<span style="color:red">*</span></label>
		<input type="text" name="producttitle" value="<?php echo htmlentities($results['name'])?>" required><br><br>
	<label>Funko Pop Category<span style="color:red">*</span></label>
		<input type="text" name="category" value="<?php echo htmlentities($results['category'])?>" required><br><br>		
	<label>Release Date<span style="color:red">*</span></label>
		<input type="text" name="releasedate" value="<?php echo htmlentities($results['ReleaseYear'])?>" required><br><br>		
	<label>Funko Pop Overview<span style="color:red">*</span></label>
		<textarea  name="productdescription" rows="8" required><?php echo htmlentities($results['description'])?></textarea><br><br>
	<label>Price (PHP)<span style="color:red">*</span></label>
		<input type="text" name="price" value="<?php echo htmlentities($results['price'])?>" required><br><br>
	<label>Current Image: <img src="<?php echo htmlentities($results['image'])?>" width="200" height="200"></label>	
	<br><br>Change Image <span style="color:red">*</span><input type="file" name="image">
	<br>
	<br>
	<a href="edititem.php?page=<?php echo $_GET['page']?>"><button type="button">Cancel</button></a>
	<button name="edit" type="submit">Save changes</button>

	</form>
<?php } } ?>
</div>
</center>
</body>
</html>
<?php } ?>