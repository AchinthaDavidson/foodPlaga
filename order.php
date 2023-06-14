<?php
require'config.php';
session_start();

$foodId=$_POST["cart"];
$price=$_POST["price"];
$orderid=$_SESSION['orderid'];
global $conn;

$sql="INSERT into order_details values('','1','$price','$orderid','$foodId')";

if ($conn->query($sql) === TRUE) {
  header( 'Location: cart.php' );
} else {
  echo "Error: " . $sq . "<br>" . $conn->error;
}



 ?>
