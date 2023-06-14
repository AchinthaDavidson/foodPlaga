<?php
require'config.php';
global $conn;

session_start();
$orderid=$_SESSION['orderid'];
$userName=$_SESSION['accountId'];
$id=$_SESSION['C_ID'];
$sql="SELECT customer_ID FROM customer where userName='$userName'";
$result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $C_ID=$row['customer_ID'];
        date_default_timezone_set('Asia/Kolkata');
        $date=date("Y/m/d h:i:sa");
        $sql="INSERT into orderlists values('$orderid',' $date','$date','$C_ID','100')";

      }
    }
if ($conn->query($sql) === TRUE) {
 header( 'Location:payment.php' );
}
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  header( 'Location:payment.php' );
}
 ?>
