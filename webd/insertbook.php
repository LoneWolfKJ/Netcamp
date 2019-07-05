<?php
session_start();
if(!(isset($_SESSION['username']) && $_SESSION['username'] != ""))
{
    header("location:logout.php");
} else {
$user=$_SESSION['username'];
}?>
<?php
$con = mysqli_connect('localhost', 'root', 'root');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysqli_select_db($con, "library");
echo mysqli_error($con);
?>
<?php
	$bookid = $_POST['bookid'];
	$bookname = $_POST['bookname'];
	$date = $_POST['date'];
	$quantity = $_POST['quantity'];	
    $status = $_POST['status'];	
    $bookdesc = $_POST['bookdesc'];
    $author = $_POST['author'];
    $price = $_POST['price'];

    $sql = "select * from books where bookid='$bookid'";
    $result = mysqli_query($con, $sql);
    $result=mysqli_fetch_assoc($result);
    $rows = mysqli_num_rows($result);
    if ($rows > 0) {
        $available=0;
        $available += $result['available'];
        $available += $quantity;
        $quantity += $result['quantity'];
        $sql = "UPDATE books set quantity='$quantity', available='$available' WHERE bookid='$bookid'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
    } else {
        // strip tags to avoid breaking any html
        $string = strip_tags($bookdesc);
        if (strlen($bookdesc) >= 100) {
            // truncate string
            $bookdesc = substr($bookdesc, 0, 100);
            $bookdesc = $bookdesc."...";
        }
	$sql = "Insert into books VALUES ('$bookid','$bookname','$bookdesc','$author','$date','$status','$price','$quantity', '$quantity')";
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