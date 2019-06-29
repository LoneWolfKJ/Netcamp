<!DOCTYPE html>
<html lang="en">
<head>
     <script src="https://kit.fontawesome.com/f6a4bcef76.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css.css" type="text/css" media="screen">
</head>
<body>
    <h1 class="name">
        BIRLA INSTITUTE OF TECHNOLOGY
        <img src="bitmesraicon.png" class="bit">
    </h1>
    <h2 class="title">
        COLLEGE LIBRARYx
    </h2>
    <div class="loginbox">
       <img src="user.svg" class="usericon">
       <form action="checklogin.php">
       <div class="textbox">
            <!-- <i class="fas fa-user" ></i> -->
           <input type="text" name="" placeholder="Username" size="30">
       </div>

       <div class="textbox">
            <!-- <i class="fas fa-lock" aria-hidden="true"></i> -->
            <input type="password" name="" placeholder="Password" size="30">
        </div>

        <input type="submit" value="Sign in" class="btn">
        <input type="submit" value="Register" class="btn" formaction="register.php">
        <input type="submit" value="Login as admin" class="btn" formaction="adminlogin.php"> </form>
    </div>
    
</body>
</html>