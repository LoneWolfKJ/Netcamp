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

    <nav class="navbar navbar-expand-lg navbar-light bg-dark" style="margin-bottom:5px;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#"><p style="color: white">College Library</p></a>
  </div>
  <ul class="nav nav-pills ml-auto">
  <li class="nav-item dropdown justify-right">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username'];?></a>
    <div class="dropdown-menu">
    <button type="button" id="bag" class="dropdown-item btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Bag
      </button>
    </div>
  </li>
  </ul>
  <button id="logout" type="button" class="btn btn-danger ">
    Logout
  </button>
</nav>


<div class="background-image"></div>
      <?php
        $connection = mysqli_connect("localhost","root","root");
        mysqli_select_db($connection, "library");
        $sql = "SELECT * FROM books";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_num_rows($result);
      ?>
    <div class="content" style="margin-top:30px;">
    <div class="row" style="margin-bottom:60px; margin-right:20px; margin-left:20px; margin-top:20px;">
    <?php
         while($row = mysqli_fetch_assoc($result)){
         ?> 
         <div class="col-xs-6 col-md-4 col-md-3 col-lg-2"  style="margin-bottom:60px;">
            <div id="<?php echo $row['bookid']."res45";?>" class="card card-default zoom" style="opacity:0.8;">
            <img class="card-img-top" src="pictures/<?php echo $row['bookid'];?>.jpg" alt="Card image cap"/>
            <div class="card-body">             
              <div class="card-title"><?php echo $row['bookname']; ?></div>
              <div class="card-footer"> <tr>
                    <td id="price"><?php echo "Price"; ?></td>
                    <td>:</td>
                    <td><?php echo $row['price']; ?></td>
                  </tr></div>
                  <div id="<?php echo $row['bookid']."pes95";?>" class="card-text btn btn-zoom btn-sm btn-block" style="margin-top: 10px;">Add to Bag</div>
                </div>
           </div>
       </div>
       <script>
          document.getElementById("<?php echo $row['bookid']."pes95";?>").addEventListener("click",function(event){
            window.open("http://localhost/addtocart.php?bookid=<?php echo $row['bookid'];?>","_self");
            event.stopPropagation();
          },true);
          document.getElementById("<?php echo $row['bookid']."res45";?>").addEventListener("click",function(){
            window.open("http://localhost/bookdetail.php?bookId=<?php echo $row['bookid']?>", "_self");
          },true);
        </script>
         <?php
           }?>
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
              <div id="modaldata" class="modal-body">
              <iframe id="frame" src="cartdetail.php" frameborder="0" style="position: relative; height: 100%; width: 100%;">
              </iframe>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <?php 
                $query = "select * from total where username='$user'";
                $result=mysqli_query($con,$query);
                $total=0;
                $result=mysqli_fetch_assoc($result);
                $total=$result['total'];
                ?>
                <a href="pay.php?total=<?php echo $total;?>" class="btn btn-primary">Pay</a>
              </div>
            </div>
          </div>
          <script>
            document.getElementById("pay").addEventListener("click", function(){
                window.open("http://localhost/payment.php?total=<?php echo $total;?>","_self")
            },false);
          </script>
        </div>
        <script src="navbar.js" async defer></script>
    </body>
</html>