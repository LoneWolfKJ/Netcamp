<?php
session_start();
?>
<?php
$con = mysqli_connect('localhost', 'root', 'root');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysqli_select_db($con, "books");
?>
<?
	$bookid = $_POST['bookid'];
	$moviename = $_POST['bookname'];
	$date = $_POST['date'];
	$quantity = $_POST['quantity'];	
    $status = $_POST['status'];	
    $bookdesc = $_POST['bookdesc'];
?>
<?  
    $sql = "select * from books where bookid='$bookid' and bookname='$bookname'";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_num_rows($result);
    if ($rows) {
        $quantity += $result[3];
        $available += $result[3];
        $sql = "UPDATE books set quantity = '$quantity', available = '$available' where bookid = '$bookid'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
    } else {
	$sql = "Insert into books values ('$bookid','$bookname','$bookdesc',$date','$quantity','$status', '$quantity')";
    $result = mysqli_query($con,$sql);
    if ($result) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
    }
?>
<p>Back To <a href="admin.php">Admin Centre</a>
</p>
<p><a href="logout.php">Logout</a></p>