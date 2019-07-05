<?php
session_start();
if(!(isset($_SESSION['username']) && $_SESSION['username'] != ""))
{
    header("location:login.php");
} else {
$user=$_SESSION['username'];
}
?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/first.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="card" style="padding:5vw;margin-top:20px;">
    <div class="card-text">
    <?php
        //$idtobeadded = $_GET['bookid'];
        $host="localhost"; // Host name 
        $mysqlusername="root"; // Mysql username 
        $password="root"; // Mysql password 
        $db_name="library"; // Database name 
        $tb1_name = "books"; // collection name
        $tb2_name="carts"; // carts

        //$username = $_SESSION['username'];

        $con=mysqli_connect("$host", "$mysqlusername", "$password")or die("cannot connect"); 
        mysqli_select_db($con,"$db_name")or die("cannot select DB");

        $sql="SELECT * FROM carts WHERE username='$user'";
        $result=mysqli_query($con,$sql);
        echo mysqli_error($con);
        $total=0;
        echo "<table><tr>
                <th>Book Id</th>
                <th>Book Name</th>
                <th>Price</th>
                <th></th>
                </tr>";
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr>
                <td>$row[bookid]</td>
                <td>$row[bookname]</td>
                <td>$row[price]</td>";
                ?>
                <td><a href="http://localhost/deletebook.php?bookid=<?php echo $row['bookid'];?>" class="btn btn-danger">
                Remove
            </a></td>
            <?php
                echo "</tr>";
            $total+=$row['price'];

        }
        echo "</table>";
        echo "<table>";
        echo "<tr>
        <th>Total</th>
        <th>$total</th>
        </tr>";
        echo "</table";
        ?>     
        </div> 
        </div>
    </body>
</html>