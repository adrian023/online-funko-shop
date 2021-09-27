<?php session_start();
 include ("db.php");
 error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
	<title> Admin Login </title>
	<link rel="stylesheet" type="text/css" href="css-js/login_reg.css">
</head>
<?php
	if(isset($_POST['aloginbtn']))
	{
		$adminname = $_POST['adminname'];
		$password = md5($_POST['apassword']);
	$sql = "SELECT adminname , password FROM adminuser WHERE adminname = '$adminname' AND password = '$password'";

	$result = mysqli_query($con, $sql);

	if (mysqli_num_rows($result) > 0)
	{
  		$_SESSION['alogin']=$_POST['adminname'];
		header("Location:adminhome.php");
	}
    else
    {
    	  echo "<script>setTimeout(function(){alert('Invalid Details');},500);</script>";
   	}
   	}

if(isset($_SESSION['alogin']))
  { 
header('location:adminhome.php');
}
else {?>
<body>
	<div class="container">
		<div class="form-box">
			<div class="admin-header">
				<p id="admin-ttl"> ADMIN LOGIN PAGE </p>
			</div>
		
		<!-- Admin Login Form -->
		<form id="login" class="input-grp" method="POST">		
			<div class="admin-icon">
				<a href="login_reg.php" title="User Login/Register"><img src="images/user.png"></a>
			</div>
			<input type="text" class="input-field" placeholder="Admin ID" required name="adminname">
			<input type="password" class="input-field" placeholder="Password" name="apassword" required> <br><br><br>
			<button type="submit" class="submit-btn" name="aloginbtn"> Login </button>
		</form>
	</div>
</body>
</html>
<?php }?>