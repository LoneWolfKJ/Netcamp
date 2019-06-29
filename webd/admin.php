<?php
    session_start();
    ?>
<!DOCTYPE html>
    <head>
    <?php
        session_start();
        $host="localhost"; // Host name 
        $username=$_POST['username'];
        $password=$_POST['password'];
        $password=""; // Mysql password 
        $db_name="movie_booking"; // Database name 
        // Connect to server and select databse.
        $connect = mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
        mysqli_select_db($connect, "admin");
        $query= "select * from admin where username='$username' and password='$password'"; 
        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result) > 0) {
        } else {
            header("location:logout.php");
        }
    ?>
    <?  
        session_start();
        if(!$_SESSION['username']) {
            header("location:main.php");
        }
    ?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Get your Book</title>
        <link rel="stylesheet" href="">
        <style type="text/css">
        a:link {
	    color:#ffffff;
	    text-decoration: underline;
        }
        a:visited {
	    color: #ffffff;
	    text-decoration: underline;
        }
        html, body {height:100%; margin:0; padding:0;}
        #page-background {position:fixed; top:0; left:0; width:100%; height:100%;}
        #content {position:relative; z-index:1; padding:10px;}
        </style>
    </head>
    <body>
        <div id="page-background"><img src="images/main%20baclground.jpg" width="100%" height="100%" alt="Smile"></div>
        <center>
        <div class="container" style="width:800px" id="content">
        <div class="header"><img src="images/logo.png" width="177" height="61" longdesc="main.php" />                   
        <center>
        <div class="content" style="background-image:url(); height:427px; color: #FFF;">
        <p align="right">[<a href="first.php">Main Page</a>] [<a href="logout.php">Logout</a>] </p><p align="left"> </p><p align="left"><?php
        $username = $_SESSION['myusername'];
        echo "Welcome $username";
        ?></p>
        <p>
<fieldset>
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="">
<tr>
<form name="form2" method="post" action="insertbook.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="">
<tr>
<td colspan="3"><p>&nbsp;</p>
  <p><strong> Insert Book</strong></p></td>
</tr>
<tr>
<td width="208">Book Id</td>
<td width="6">:</td>
<td width="294"><input name="bookid" type="text" id="bookid"></td>
</tr>
<tr>
<td>Book Name</td>
<td>:</td>
<td><input name="bookname" type="text" id="bookname"></td>
</tr>
<tr>
<tr>
<td>Book Description</td>
<td>:</td>
<td><input name="bookdesc" type="text" id="bookdesc"></td>
</tr>
<tr>
<tr>
<td>Quantity</td>
<td>:</td>
<td><input name="quantity" type="number" id="quantity"></td>
</tr>
<tr>
<td>Date</td>
<td>:</td>
<td><input name="date" type="text" id="date"></td>
</tr>
<tr>
<tr>
<td>Status</td>
<td>:</td>
<td><select name="status" id ="status">
<option value="Available">Available</option>
<option value="Coming Soon">Coming Soon</option></select></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Insert Book"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
</fieldset>
</p>
<fieldset>
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="">
<tr>
<form name="form2" method="post" action="deletecity.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="">
<tr>
<td colspan="3"><p>&nbsp;</p>
  <p><strong> Delete Book</strong></p></td>
</tr>
<tr>
<td>Book Name</td>
<td>:</td>
<td><input name="bookid" type="text" id="bookid"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Delete"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
</fieldset>
</p>
<p>
<fieldset>
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="">
<tr>
<form name="form2" method="post" action="makeadmin.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="">
<tr>
<td colspan="3"><p>&nbsp;</p>
<p><strong>Make Admin</strong></p></td>
</tr>
<tr>
<td>Username</td>
<td>:</td>
<td><input name="user" type="text" id="user"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Make Admin"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
</fieldset>
</p>
        </div>
        </div>
        <script src="" async defer></script>
    </body>
</html>