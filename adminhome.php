<?php session_start();
 include ("db.php");
 error_reporting(0);
if(!isset($_SESSION['alogin']))
  { 
header('location:login_reg.php');
}
else{
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css-js/adminhome.css">
</head>
<center>
<body>
	<br><br><br><br>
	<h1>WELCOME ADMIN</h1>
	<ol>
	<a href="additem.php"><button>ADD ITEM</button></a><br><br>
	<a href="edititem.php"><button>EDIT ITEM</button></a><br><br>
	<a href="admin_purchases.php"><button>PURCHASE HISTORY</button></a><br><br>	
	<a href="alogout.php"><button>LOGOUT</button></a>
	</ol>
</body>
</center>
</html>
<?php } ?>