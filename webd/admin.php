<?php
session_start();
if(!(isset($_SESSION['username']) && $_SESSION['username'] != "" && $_SESSION['admin'] == "true"))
{
    header("location:logout.php");
} else {
$user=$_SESSION['username'];
}
?>
<!DOCTYPE html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Get your Book</title>
        <link rel="stylesheet" href="css/admin.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
    <div class="background-image"></div>
    <nav class="navbar navbar-light bg-dark justify-content-between">
  <a class="navbar-brand"><p style="color:white;">Admin's Page</p></a>
  <ul class="nav nav-pills ml-auto">
  <li class="nav-item dropdown justify-right">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username'];?></a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="first.php">Books</a>
      <a class="dropdown-item" href="issue.php">Recently Issued</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item btn btn-danger" href="logout.php">Logout</a>
    </div>
  </li>
  </ul>
  <form class="form-inline" method="POST" action="makeadmin.php">
    <input class="form-control mr-sm-2" type="search" placeholder="Username" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Make Admin</button>
  </form>
</nav>
        <p class="content row">
        <center>
<fieldset class="card col-md-6" style="padding:10px;margin: 5vw 10px 10px 10px;">
<form method="POST" action="insertbook.php">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputBookId4">Book Id</label>
        <input type="text" name="bookid" class="form-control" id="inputEmail4" placeholder="Book Id">
      </div>
      <div class="form-group col-md-6">
        <label for="inputbookname">Book Name</label>
        <input type="text" name="bookname" class="form-control" id="inputPassword4" placeholder="Title of The Book">
      </div>
    </div>
    <div class="form-group">
      <label for="inputBookDesc"></label>Book Description</label>
      <input type="text" name="bookdesc" class="form-control" placeholder="Book Description">
    </div>
    <div class="form-group">
      <label for="inputAuthor">Author</label>
      <input type="text" name="author" class="form-control" id="inputAddress2" placeholder="Author">
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputDate">Date</label>
        <input type="text" name="date" class="form-control"  placeholder="Date of Import">
      </div>
      <div class="form-group col-md-4">
        <label for="inputStatus">Status</label>
        <select id="inputStatus" name="status" class="form-control">
          <option selected>Choose Status...</option>
          <option>Available</option>
          <option>Coming Soon</option>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="inputQuantity">Quantity</label>
        <input type="text" name="quantity" class="form-control" id="inputZip" placeholder="Quantity">
      </div>
      <div class="form-group col-md-2">
        <label for="inputPrice">Price</label>
        <input type="text" name="price" class="form-control" id="inputZip" placeholder="Price">
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Insert Book</button>
  </form>

</fieldset>
</center>
        </p>
        <script src="" async defer></script>
</html>