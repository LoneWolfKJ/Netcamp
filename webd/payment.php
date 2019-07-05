<?php
session_start();
if(!(isset($_SESSION['username']) && $_SESSION['username'] != ""))
{
    header("location:login.php");
} else {
$user=$_SESSION['username'];
}
?>
<?php 
$con=mysqli_connect("localhost","root","root");
mysqli_select_db($con,"library");

$total=$_GET['total'];
$query="INSERT into issuedusers values('$user','$total')";
mysqli_query($con,$query);
$query="DELETE * from carts where username='$user'";
mysqli_query($con,$query);
$query="DELETE * from total where username='$user'";
mysqli_query($con,$query);
header("location:logout.php");
?>