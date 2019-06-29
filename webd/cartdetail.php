<?php
$idtobeadded = $_POST['bookid'];
$user= $_POST['username'];
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="root"; // Mysql password 
$db_name="books"; // Database name 
$tb1_name = "books"; // collection name
$tb2_name="cart"; // carts

$con=mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db($con,"$db_name")or die("cannot select DB");

$sql="SELECT * FROM $tbl_name WHERE bookid='$idtobeadded' LIMIT 1";
$result=mysql_query($sql);

//0-bookid
//1-bookname
//2-date
//3-quantity
//4-status
//5-bookdesc
//6-price

$row=mysql_fetch_array($result);
$bookname = $row[1];
$bookprice= $row[6];

$sq2 = "SELECT * FROM $tb2_name WHERE username='$user'";
$result2=mysql_query($sq2);
$row = mysql_num_rows($result2);

$query1 = "INSERT INTO $tb2_name(username,booksid,booksname,total) values ('$user','$idtobeadded','$bookname','$bookprice')";
mysql_query($query1);
//igonre - were trying to go and store as array but then found out when using serialize/unserialize would have
// to handle null values since it converts into bytes. so shifted to another method.
// $array = array("my", "litte", "array", 2);
// $serialized_array = serialize($array); 
// $unserialized_array = unserialize($serialized_array); 

// var_dump($serialized_array); // gives back a string, perfectly for db saving!
// var_dump($unserialized_array);
?>