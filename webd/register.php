<?php
ob_start();
$host="localhost"; // Host name 
$username="root"; // mysqli username 
$password=""; // mysqli password 
$db_name="books"; // Database name 
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
// To protect mysqli injection (more detail about mysqli injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$mypassword2 = stripslashes($mypassword2);
$myemail = stripslashes($myemail);
$myusername = mysqli_real_escape_string($myusername);
$mypassword = md5($mypassword);
$mypassword = mysqli_real_escape_string($mypassword);
$mypassword2 = md5($mypassword2);
$mypassword2 = mysqli_real_escape_string($mypassword2);
$myemail = mysqli_real_escape_string($myemail);
$collegeid = mysqli_real_escape_string($collegeid);
$sql="SELECT * FROM $tbl_name WHERE username='$myusername'";
$result=mysqli_query($sql);
// mysqli_num_row is counting table row
$count=mysqli_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
if($mypassword!="" && $mypassword!="" && $mypassword2!="" && $myemail!="")
{
if($count==1){echo "User already exist";}
else {
	if($mypassword==$mypassword2)
	{
			$sql="Insert into $tbl_name (username,password,email,collegeid) values ('$myusername','$mypassword','$myemail','$collegeid')";
			$result=mysqli_query($sql);
			echo "Sing Up Succesfull<br><br>";
			session_register("myusername");
			session_register("mypassword");
			header("location:first.php");
	}
	else
		echo "Passwords don't match";
}
}
else
{
	echo "One or more fields are empty";
}
ob_end_flush();
?>