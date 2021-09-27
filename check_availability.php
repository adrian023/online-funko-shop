<?php 
require_once("db.php");
// code user email availablity
if(!empty($_POST["emailid"])) {
	$email= $_POST["emailid"];
	if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {
		echo "<p> Error : You did not enter a valid email. </p>";
 		echo "<script>$('#submit').prop('disabled',true);</script>";
	}
	else {
		$sql ="SELECT EmailId FROM tblusers WHERE EmailId='$email'";
$result = mysqli_query($con,$sql);
$cnt=1;
if (mysqli_num_rows($result) > 0)
{
echo "<p style='color:red'> Email already exists .</p>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<p style='color:green'> Email available for Registration .</p>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}
?>
