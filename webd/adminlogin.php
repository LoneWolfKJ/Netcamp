<?php
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="root"; // Mysql password 
$db_name="library"; // Database name 
$tbl_name="admin"; // Table name
//$tb2_name="admin";// admin table name

// Connect to server and select databse.
$con=mysqli_connect($host, $username, $password)or die("cannot connect"); 
mysqli_select_db($con,$db_name)or die("cannot select DB");
// Define $myusername and $mypassword 
$myusername=$_POST['username']; 
$mypassword=$_POST['password'];
// To protect MySQL injection (more detail about MySQL injection)
    echo "hello".$mypassword;


$myusername = stripslashes($myusername);
$mypassword = md5($mypassword);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($con,$myusername);
$mypassword = mysqli_real_escape_string($con,$mypassword);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysqli_query($con,$sql);
$count=mysqli_num_rows($result);

if($count==1){
session_start();
$_SESSION['username']=$myusername;
$_SESSION['password']=$mypassword;
$_SESSION['admin']="true";

echo $_SESSION['username'];
 header("location:admin.php");
}
else {
    echo $mypassword;
echo "Wrong Username or Password";
}
?>
