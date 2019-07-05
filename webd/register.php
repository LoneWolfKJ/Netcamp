<?php
ob_start();
$host="localhost"; // Host name 
$username="root"; // mysqli username 
$password="root"; // mysqli password 
$db_name="library"; // Database name 
$tbl_name="users"; // Table name
// Connect to server and select databse.
$con=mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db($con,"$db_name")or die("cannot select DB");
// Define $myusername and $mypassword 
$myusername=$_POST['username']; 
$mypassword=$_POST['password'];
$mypassword2=$_POST['password2'];
$myemail=$_POST['email'];
$collegeid=$_POST['collegeid'];
$phone=$_POST['phone'];
// To protect mysqli injection (more detail about mysqli injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$mypassword2 = stripslashes($mypassword2);
$myemail = stripslashes($myemail);
$myusername = mysqli_real_escape_string($con,$myusername);
$mypassword = md5($mypassword);
$mypassword = mysqli_real_escape_string($con,$mypassword);
$mypassword2 = md5($mypassword2);
$mypassword2 = mysqli_real_escape_string($con,$mypassword2);
$myemail = mysqli_real_escape_string($con,$myemail);
$collegeid = mysqli_real_escape_string($con,$collegeid);
$sql="SELECT * FROM $tbl_name WHERE username='$myusername'";
$result=mysqli_query($con,$sql);
// mysqli_num_row is counting table row
$count=mysqli_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
if($mypassword!="" && $mypassword!="" && $mypassword2!="" && $myemail!="")
{
if($count==1){echo "User already exist";
	?><a href="index.html">CLICK HERE </a><?php echo "to go to login";
}
else {
	if($mypassword==$mypassword2)
	{
			$sql="Insert into $tbl_name (username,password,email,collegeid,phone) values ('$myusername','$mypassword','$myemail','$collegeid','$phone')";
			$result=mysqli_query($con,$sql);
			echo "Sing Up Succesfull<br><br>";
			$_SESSION['username']=$myusername;
			$_SESSION['password']=$mypassword;
			$_SESSION['admin']="false";
			header("location:first.php");
	}
	else
		echo "Passwords don't match";
		?><a href="signup.html">CLICK HERE </a><?php echo "to go back to signup";
}
}
else
{
	echo "One or more fields are empty";
	?><a href="signup.html">CLICK HERE </a><?php echo "to go back to signup";

}
ob_end_flush();
?>