<?php
session_start();
if(!(isset($_SESSION['username']) && $_SESSION['username'] != ""))
{
    header("location:login.php");
} else {
$user=$_SESSION['username'];
}
?>
<html>
    <head></head>
    <body>
    <a href="first.php">Click Here</a>
<?php
    $bookid = $_GET['bookid'];
    $connection=mysqli_connect("localhost","root","root");
    mysqli_select_db($connection,"library");
    $sql = "SELECT * FROM books where bookid='$bookid'";
    $result = mysqli_query($connection, $sql);
    $result=mysqli_fetch_assoc($result);
    $row = mysqli_num_rows($result);
    echo $user."  ";
    //echo mysqli_error($connection);
    //echo $username;
    $bookname=$result['bookname'];
    $price=$result['price'];
    //echo "hello".$price;

    $query = "select * from carts where username='$user' and bookid='$bookid'";
    $result = mysqli_query($connection, $query);
    $rows = mysqli_num_rows($result);
    if($rows > 0){
       ?> <script>alert("Same book cannot be issued more than once at a time, Redirecting to books");</script>
        <?php
    } else {
        $query = "INSERT into carts values('$user','$bookid','$bookname','$price')";
        mysqli_query($connection,$query);
        $query = "select * from total where username='$user'";
        $result=mysqli_query($con,$query);
        $count_rows=mysqli_num_rows($result);
        $total=0;
        if($count_rows == 1) {
            $result=mysqli_fetch_assoc($result);
            $total=$result['total']; 
            $total+=$price;
            $query="UPDATE total set total='$total'";
        }
        else {
            $total+=$price;
            $query="INSERT into total values('$user','$total')";
        }
        mysqli_query($connection,$query);
        //echo mysqli_error($connection);
        ?><script>alert("Book has been successfully added to your cart, Redirecting to books");</script>
        <?php
    }
    ?><a href="first.php">CLickhere</a><?php
    header("location:first.php");
?>
    </body>
    </html>