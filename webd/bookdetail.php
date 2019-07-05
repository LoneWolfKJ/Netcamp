<?php
session_start();
if(!(isset($_SESSION['username']) && $_SESSION['username'] != ""))
{
    header("location:logout.php");
} else {
$user=$_SESSION['username'];
}
?>
<!DOCTYPE html>
    <head>
    <?php
        $bookid = $_GET['bookId'];
        $connection = mysqli_connect("localhost", "root", "root");
        mysqli_select_db($connection, "library");
        $query = "select * from books where bookid = '$bookid'";

        // Get the book details from the database

        $result = mysqli_query($connection, $query);
        $result = mysqli_fetch_assoc($result);
        $bookid = $result['bookid'];
        $bookname = $result['bookname'];
        $date = $result['date'];
        $quantity = $result['quantity'];	
        $status = $result['status'];	
        $bookdesc = $result['bookdesc'];
        $author = $result['author'];
        ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bookdetail.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark" style="margin-bottom:5px;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#"><p style="color: white">College Library</p></a>
            <ul class="nav nav-pills ml-auto">
            <li class="nav-item dropdown justify-right">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username'];?></a>
                <div class="dropdown-menu">
                <button id="bag" type="button" class="dropdown-item btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModalCenter">
                    Bag
                </button>
                <a class="dropdown-item btn btn-primary" href="first.php">Home</a>
                </div>
            </li>
            </ul>
            <button id="logout" type="button" class="btn btn-danger ">
            Logout
            </button>
        </div>
        </nav>

        <div class="background-image"></div>

        <div class="content">
            <center>
      <div class="bookdetail col-7 card flex-row flex-wrap">
        <div class="card-img-top" style="margin-top:10px;margin-bottom:10px;"> 
            <img src="pictures/<?php echo $bookid?>.jpg" alt="<?php echo $bookname?>" style="">
        </div>
                <div class="card-block">
                    
                    <h1 class="card-title" style="margin-top:10px;"> <?php echo $bookname."<br>"?></h1>
                    <p class="card-subtitle mb-2 text-muted">by <?php echo $author?></p>
                    <hr>
                    <?php echo "Brought to the library on ".$result['date']?>
                    <hr>
                    <p class="card-text"><?php echo $result['bookdesc'];?></p>
                    <p class="card-footer">
                    <?php echo "Total units available : ".$result['quantity'];?>
                    <div class="card addtobag"  style="padding:10px;">
                                <div class="card-footer" style="padding:10px;margin-top:10px;"> <table>
                                        <tr>
                                        <td>Available Units</td>
                                        <td>:</td>
                                        <td><?php echo $result['available'];?></td>
                                        </tr>
                                        <tr>
                                        <td id="price"><?php echo "Price"; ?></td>
                                        <td>:</td>
                                        <td><?php echo $result['price']; ?></td>
                                        </tr>
                                        </table>
                                        </div>
                            <div class="card-text" style="padding:10px;">
                            <a href="http://localhost/addtocart.php?bookid=<?php echo $result['bookid'];?>" type="button" class="btn btn-primary btn-zoom btn-lg" style="margin-top: 10px;">Add to Bag</a>
                            </div>
                        </div>
                    </p>
                </div>
        </center>
        </div>
        </div>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">In your Bag : </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <iframe src="cartdetail.php?user=<?php echo $user;?>" frameborder="0" style="position: relative; height: 100%; width: 100%;">
            </iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="pay" type="button" class="btn btn-primary">Pay</button>
            </div>
            </div>
        </div>
        <script>
            document.getElementById("pay").addEventListener("click", function(){
                window.open("http://localhost/pay.php?total=<?php echo $total;?>","_self")
            },false);
        </script>
        </div>
        <script src="navbar.js" async defer></script>
    </body>
</html>