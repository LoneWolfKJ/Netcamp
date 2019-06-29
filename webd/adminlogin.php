<?php
ob_start();
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="root"; // Mysql password 
$db_name="books"; // Database name 
$tbl_name="admin"; // Table name
//$tb2_name="admin";// admin table name

// Connect to server and select databse.
$con=mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db($con,"$db_name")or die("cannot select DB");
// Define $myusername and $mypassword 
$myusername=$_POST['username']; 
$mypassword=$_POST['password'];
// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = md5($mypassword);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);

if($count==1){
$myemail=mysql_result($result,0,"email");

session_register("myusername");
session_register("mypassword");
header("location:admin.php");
}
else {
echo "Wrong Username or Password";
}
ob_end_flush();
?>
