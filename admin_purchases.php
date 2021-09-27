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
 	<title></title>
 <link rel="stylesheet" type="text/css" href="css-js/admin_purchase.css">
</head>
 <body>
 <center>
<?php
$results_per_page = 10;

$sql = "SELECT * FROM purchases";
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

$sql = "SELECT * FROM purchases LIMIT " . $this_page_first_result . "," . $results_per_page;
$results = mysqli_query($con,$sql);
$count=1;
// <!-- display product -->
if(mysqli_num_rows($results) > 0)
{?>

<table>
	<thead>
	<tr>
	<th>#</th>
	<th>Date</th>
	<th>Info</th>
	<th>Price</th>
	</thead>
<tbody>

<?php while($row = mysqli_fetch_assoc($results)){?>
<tr>
	<td><?php echo $count;?></td>
	<td><?php echo $row['dateofpurchase'];?></td>
	<td><?php echo $row['info'];?></td>
	<td>P <?php echo $row['amount'];?></td>
</tr>
<?php $count +=1;
}?>
</tbody>
</table>
<br><br>
<?php 
	if($number_of_pages >= 2){
	for($page=1; $page<=$number_of_pages; $page++){
	echo '<a href="admin_purchases.php?page=' . $page .'">' . $page . '</a>';}
	}
	}
else{
	echo "<h3>No Purchases Found</h3>";
}
?>
<br><br>
<a id="a" href="adminhome.php">To Home</a>
 </center>	
 </body>
 </html>
 <?php }?>