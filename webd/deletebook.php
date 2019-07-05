
<?php
session_start();
if(!(isset($_SESSION['username']) && $_SESSION['username'] != ""))
{
    header("location:logout.php");
} else {
$user=$_SESSION['username'];
}
?>
<?php 
$deletebook=$_GET['bookid'];
$con=mysqli_connect("localhost", "root", "root")or die("cannot connect"); 
mysqli_select_db($con,"library")or die("cannot select DB");

$sql="DELETE from carts where username='$user' AND bookid='$deletebook'";
mysqli_query($con,$sql);
echo mysqli_error($con);
header("location:cartdetail.php") ?>