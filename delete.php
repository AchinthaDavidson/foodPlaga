<?php
require'config.php';


$id=$_POST['delete'];
  // echo ($id);

$sql = "DELETE FROM order_details WHERE Details_Id='$id'";

  if ($conn->query($sql) === TRUE ) {
  header( 'Location: yourorders.php' );

  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;

  }

 ?>
