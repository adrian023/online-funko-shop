<?php
include('db.php');
session_start();

if(!isset($_SESSION['login']))
  { 
header('location:login_reg.php');
}
else {?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Purchase History </title>
	<link rel="stylesheet" type="text/css" href="css-js/product.css">
	<link rel="stylesheet" type="text/css" href="css-js/purchase_history.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
</head>
<body>
<?php include('header2.php') ?>

<h1>YOUR PURCHASE HISTORY</h1>
<?php 
$userid = $_SESSION['idofuser'];
$results_per_page = 10;

$sql = "SELECT * FROM purchases WHERE userid = '$userid' ";
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

$sql = "SELECT * FROM purchases WHERE userid = '$userid' LIMIT " . $this_page_first_result . "," . $results_per_page;
$result = mysqli_query($con,$sql);
$count = 1;

if(mysqli_num_rows($result) > 0){
?>
	<table>
	<tr>
		<th>#</th>
		<th>Date</th>
		<th>Info</th>
		<th>Amount</th>
	</tr>
	
		<?php while($row = mysqli_fetch_assoc($result)){?>
	<tr>
		<td><?php echo $count;?></td>
		<td><?php echo $row['dateofpurchase'];?></td>
		<td><?php echo $row['info'];?></td>
		<td>P <?php echo $row['amount'];?></td>	
	</tr>
		<?php $count+=1;
	}?>	
	</table>

<?php
	if($number_of_pages >= 2){
	for($page=1; $page<=$number_of_pages; $page++){
	echo '<div class="button-container"><a class="history-page-btn" href="purchase_history.php?page=' . $page .'">' . $page . '</a></div>';}}
?>
<?php }

else{
	echo "<p class='no-purchase-msg'>You have no previous purchases!</p>";
}

?>
</body>
</html>
<?php }?>