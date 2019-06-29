<?php
session_start();
?>
<?php
$con = mysqli_connect('localhost', 'root', 'root');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
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
    $password = $result[1];
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