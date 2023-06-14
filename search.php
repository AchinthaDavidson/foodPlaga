<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="CSS/foodlist.css">
  </head>
    <body background="images\back1.jpg">

 <table >
   <tr>


<?php
require'config.php';
session_start();
if (isset($_POST['action'])) {
     $name=$_POST['submit'] ;
}
$sql="SELECT order_no FROM orderlist ORDER BY order_no DESC LIMIT 1";
$result = $conn->query($sql);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
  $_SESSION['orderid']=$row["order_no"]+1;
}
}
$search=$_POST["search"];
$sql = "SELECT * from food where name like '%$search%'";
$result = $conn->query($sql);
$count=0;

if($result->num_rows > 0){

  while($row = $result->fetch_assoc()){

       echo "<td>
       <img src='images/food/".$row["image"]."' width='100%'>
       <label class='name'>".$row['name']."</label><br><br><lable class='dis'>".$row['Discription'] ."</lable><br><br>
       <lable class='name'>LKR ".$row['price'].".00</lable>
       <form method='post' action='order.php'>
       <input type='hidden' name='price' value='$row[price]'>
       <button class='cart' name='cart' value='$row[Food_Id]'onclick='diseble()'> <img src='images/add-to-cart-icon.png' height='55px' width='55px'></button></form>
       </td>";
       $count=$count+1;

       if ($count>=3){
         $count=0;
         echo "</tr><tr>";

       }

  }
}
else{
  header( 'Location: home.html' );
}
?>
<script type="text/javascript">


</script>

</table>
</body>
</html>
