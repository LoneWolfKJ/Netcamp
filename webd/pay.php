<!DOCTYPE html>
<html>
<head>
<title>Payment gateway</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/payment.css" type="text/css" media="screen">

</head>
<body>
<?php 
$total=$_GET['total'];
?>
<div class="main">
<h2 id="h">PAYMENT GATEWAY :</h2>
<img src="pictures/cards.png" class="cards"><br><br><br><br><br>
<form class="form">
    Card number :
    <input type="text" id="box1" placeholder="Card Number"><br><br>
    Card Holder's name :
    <input type="text" id="box2" placeholder="Name on card"><br><br>
    Expiry :
    <input type="month" id="box3" placeholder="Expiry month and year">
    CVV :
    <input type="number" id="box4" placeholder="3-digit code"><br><br><br><br>
    <a href="payment.php?total=<?php echo $total;?>" id="red" style="width: 150px; height: 40px; background-color: skyblue; border-radius: 10px; font-size: 15px;">PAY</a>&nbsp;
    <a href="first.php" id="red" style="width: 150px; height: 40px; background-color: skyblue; border-radius: 10px; font-size: 15px;">CANCEL</a>
    <br><br><br><br><br>
    </form>
      
</div>
</body>
</html>