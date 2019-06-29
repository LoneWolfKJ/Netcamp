<?php
ob_start();
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="root"; // Mysql password 
$db_name="books"; // Database name 
$tbl_name="users"; // Table name
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
// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
$myemail=mysql_result($result,0,"email");
$userlevel=mysql_result($result,0,"userlevel");
 session_register("myusername");
session_register("mypassword");
header("location:first.php");
}
else {
echo "Wrong Username or Password";
}
ob_end_flush();
?>
