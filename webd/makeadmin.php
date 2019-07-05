<?php
session_start();
if(!(isset($_SESSION['user']) && $_SESSION['user'] != "" && $_SESSION['admin'] == "true"))
{
		header("location:logout.php");
}
?>
<?php
$con = mysqli_connect('localhost', 'root', 'root');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }
mysqli_select_db($con,"admin");
?>
<?
	$user = $_POST['user'];
	?>
<?
	$sql = "select * from users where username='$user'";
	$result= mysqli_query($con,$sql);
	$num = mysqli_num_rows($result);
	$result=mysqli_fetch_assoc($result);
    $password = $result['password'];
    if(	$num==0)
	{
		echo "No such user exist";
	}
	else
	{
	 $sql = "INSERT INTO admin VALUES('$user', '$password')";
	 $result = mysql_query($con,$sql);
	 if($result)
	 {
		 echo "Selected user was made admin<br>";
	 }
	}
?>
<p>Back To <a href="admin.php">Admin Centre</a>
</p>
<p><a href="logout.php">Logout</a></p>