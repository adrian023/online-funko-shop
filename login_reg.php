<?php session_start();
 include ("db.php");
 error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
	<title> Login or Sign Up! </title>
	<link rel="stylesheet" type="text/css" href="css-js/login_reg.css">
</head>
<?php
	if(isset($_POST['loginbtn']))
	{
		$EmailId = $_POST['emailid'];
		$password = md5($_POST['password']);
	$sql = "SELECT EmailId , Password, id FROM tblusers WHERE EmailId = '$EmailId' AND Password = '$password'";

	$result = mysqli_query($con, $sql);

	if (mysqli_num_rows($result) > 0)
	{
		foreach ($result as $result) {		
  		$_SESSION['login']=$_POST['emailid'];
		$_SESSION['idofuser']=$result['id'];
	}
		header("Location:home.php");
	}
    else
    {
    	  echo "<script>setTimeout(function(){alert('Invalid Details');},500);</script>";
   	}
   	}

    if(isset($_POST['signup']))
{
$fname=$_POST['fullname'];
$email=$_POST['emailid']; 
$mobile=$_POST['mobileno'];
$password=md5($_POST['password']); 
$sql="INSERT INTO  tblusers(FullName,EmailId,ContactNo,Password) VALUES('$fname','$email','$mobile','$password')";
$result=mysqli_query($con,$sql);
$lastInsertId = mysqli_insert_id($con);
if($lastInsertId)
{
echo "<script>setTimeout(function(){alert('Registration successful. Now you can login');},500);</script>";
}
else 
{
echo "<script>setTimeout(function(){alert('Something went wrong. Please try again');},500);</script>";
}
}

if(isset($_SESSION['login']))
  { 
header('location:home.php');
}
else {?>
<body>
	<div class="container">
		<div class="form-box">
			<div class="button-box">
				<div id="btn"></div>
				<button type="button" class="toggle-btn" onclick="login()"> Login </button>
				<button type="button" class="toggle-btn" onclick="register()"> Register </button>
			</div>
		
		<!-- Login Form -->
		<form id="login" class="input-grp" method="POST">
			
			<div class="admin-icon">
				<a href="adminlogin.php" title="Admin Login"><img src="images/admin1.png"></a>
			</div>

			<input type="text" class="input-field" placeholder="Email ID" required name="emailid">
			<input type="password" class="input-field" placeholder="Password" name="password" required> <br><br><br>
			<button type="submit" class="submit-btn" name="loginbtn"> Login </button>
		</form>
		<!-- Register Form -->
		<form id="register" class="input-grp" method="POST" name="signupform" method="POST" onSubmit="return valid();">
			<input type="text" class="input-field" placeholder="Full Name" required name="fullname" >
			<input type="text"  name="mobileno"  placeholder="Contact no. (+639) " required pattern="[0-9]{11}" required="required" class="input-field" maxlength="11">
	        <input type="email" class="input-field" name="emailid" id="emailid" onBlur="checkAvailability()" placeholder="Email Address" required="required">
 			<p id="user-availability-status" style="font-size:12px;"></p>
			<input type="password" class="input-field" placeholder="Enter Password" required="required" name="password">
			<input type="password" class="input-field" placeholder="Confirm Password" required="required" name="confirmpassword"> <br><br><br>
			<button type="submit" class="submit-btn" name="signup" id="submit"> Register </button>
		</form>
		</div>

		
	</div>
</body>

<script src="css-js/jquery.min.js"></script>
<script>
function checkAvailability() {
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
},
error:function (){}
});
}
function valid()
{
if(document.signupform.password.value!= document.signupform.confirmpassword.value)
{
setTimeout(function(){alert("Password and Confirm Password Field do not match!");},500);
document.signupform.confirmpassword.focus();
return false;
}
return true;
}
</script>

<script>
		var x = document.getElementById("login");
		var y = document.getElementById("register");
		var z = document.getElementById("btn");

		function register() {
			x.style.left = "-400px";
			y.style.left = "50px";
			z.style.left = "110px";
		}

		function login() {
			x.style.left = "50px";
			y.style.left = "450px";
			z.style.left = "0px";
		}
</script>
</html>
<?php }?>