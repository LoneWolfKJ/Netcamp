<?php if($mypassword!="" && $mypassword!="" && $mypassword2!="" && $myemail!="")

$collegeid=$_POST['collegeid'];
$username=$_POST['username'];
$mypassword=$_POST['password'];
$mypassword2=$_POST['password2'];

if($collegeid!="" || $username!="" || $mypassword!="" || $mypassword2!=""){
    
    $con=mysqli_connect("localhost","root","root");
    
    $myusername = stripslashes($myusername);
    $mypassword = stripslashes($mypassword);
    $mypassword2 = stripslashes($mypassword2);
    $myusername = mysqli_real_escape_string($con,$myusername);
    $mypassword = md5($mypassword);
    $mypassword = mysqli_real_escape_string($con,$mypassword);
    $mypassword2 = md5($mypassword2);
    $mypassword2 = mysqli_real_escape_string($con,$mypassword2);
    $collegeid = mysqli_real_escape_string($con,$collegeid);
    mysqli_select_db($con,"library");
    $query="select * from users where username='$username' and collegeid='$collegeid'";


if($count==1){
    if($mypassword==$mypassword2)
    {
            $sql="UPDATE users set password='$mypassword' where username='$myusername'";
            $result=mysqli_query($con,$sql);
            $_SESSION['username']=$myusername;
            $_SESSION['password']=$mypassword;
            $_SESSION['admin']="false";
            header("location:first.php");
    }
    else
        echo "Passwords don't match";
        ?><a href="update.html">CLICK HERE </a><?php echo "to go back";
    }
}
else
{
    echo "One or more fields are empty";
    ?><a href="update.html">CLICK HERE </a><?php echo "to go back";
}
?>