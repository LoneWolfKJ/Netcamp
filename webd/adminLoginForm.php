<?php
session_start();
if((isset($_SESSION['username']) && $_SESSION['username'] != "" && $_SESSION['admin'] == "true"))
{
    header("location:admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <script src="https://kit.fontawesome.com/f6a4bcef76.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/css.css" type="text/css" media="screen">
</head>
<body>
    <div class="bgimage">
    </div><br><br>
    <div class="content">
    <h2 class="title">
        LOGIN AS ADMIN
    </h2>
    <div class="adloginbox">
       <img src="pictures/admin.png" class="usericon">
       <form method="POST" action="adminLogin.php">
       <div class="textbox">
             <i class="fas fa-user-circle"></i> 
           <input type="text" name="username" placeholder="Admin username">
       </div>

       <div class="textbox">
            <i class="fas fa-lock" aria-hidden="true"></i> 
            <input type="password" name="password" placeholder="Password">
        </div><br><br>
        <input type="submit" value="Sign in as admin" class="adbtn">
      </form>
    </div>
    </div>
</body>
</html>