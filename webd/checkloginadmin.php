<?php
ob_start();
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="root"; // Mysql password 
$db_name="books"; // Database name 
//$tbl_name="users"; // Table name
$tb2_name="admin";// admin table name
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
//getting data from users collections
//$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
//$result=mysql_query($sql);

//getting data from admin
$sq2="SELECT * FROM $tb2_name WHERE username='$myusername' and password='$mypassword'";
$result2=mysql_query($sq2);
// Mysql_num_row is counting table row
//$count=mysql_num_rows($result);
// counting admin
$count2=mysql_num_rows($result2);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count2==1){
$myemail=mysql_result($result,0,"email");
//$userlevel=mysql_result($result,0,"userlevel");
 session_register("myusername");
session_register("mypassword");
header("location:first.php");
}
else {
echo "Wrong Username or Password";
}
ob_end_flush();
?>