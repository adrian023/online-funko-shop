<?php session_start();
 include ("db.php");
 if(!isset($_SESSION['alogin']))
  { 
header('location:login_reg.php');
}
else{
?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title><link rel="stylesheet" type="text/css" href="css-js/edititem.css">
 </head>
 <body>
 <center>
 <br>
 <br>
 <div>
<?php
$results_per_page = 10;

$sql = "SELECT * FROM products";
$result = mysqli_query($con,$sql);
$number_of_results = mysqli_num_rows($result);

$number_of_pages = ceil($number_of_results/$results_per_page);

if(!isset($_GET['page'])){
	$page =1;
}
else{
	$page = $_GET['page'];
} 

$this_page_first_result = ($page-1)*$results_per_page;

$sql = "SELECT * FROM products LIMIT " . $this_page_first_result . "," . $results_per_page;
$results = mysqli_query($con,$sql);
$count=1;
// <!-- display product -->
if(mysqli_num_rows($results) > 0)
{?>

<table>
	<thead>
	<tr>
	<th>#</th>
	<th>Product Name</th>
	<th>Category</th>
	<th>Price</th>
	<th>Action</th>
	</thead>
<tbody>

<?php while($row = mysqli_fetch_assoc($results)){?>
<tr>
	<td><?php echo $count;?></td>
	<td><?php echo $row['name'];?></td>
	<td><?php echo $row['category'];?></td>
	<td>P <?php echo $row['price'];?></td>
	<td><button><a href="edit.php?id=<?php echo $row['id'].'&page='.$page;?>">edit</a></button></td>
</tr>
<?php $count +=1;
}?>
</tbody>
</table>
<?php } ?>
<!-- TO BE USED
 echo $status; ?>
 --> 
<?php
	 if($number_of_pages >= 2){	
	 for($page=1; $page<=$number_of_pages; $page++){
	echo '<button><a href="edititem.php?page=' . $page .'">' . $page . '</a></button>';}}
?><br><br>
<button><a href="adminhome.php">To Home</a></button>
 </div> </center>
 </body>
 </html>
 <?php }?>