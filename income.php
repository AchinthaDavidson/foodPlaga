<html>
<head>
<title>foodPlaga</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style media="screen">
.img1{
  width: 100px;
  height: 20%;
  background-color: rgba(0,0,0,0.8);
}
table{
  border-color: black;
  border-radius: 5px;
  border-collapse: collapse;
  border-spacing:  20px 15px;
  width: 100%;
}
tr{
   background-color: black;
  opacity: 0.7;
}
.name1{
  padding: 10% ;
  margin-bottom: 10px;
  font-size: 15px;

}
</style>

<link rel="stylesheet" href="CSS/Addmin.css">

</head>
  <body background="images\back1.jpg">
  <br>
  <label style="margin-left:5%;"><img  src="images/Food Plaga Logo.png" alt="logo" height="60" width="60"></label>
  <label class="logo" for="">Food Plaga</label>
  <a href="#popup5"><button href="#popup5" type="button" style="margin-left:65%" name="button">logout</button></a>

  <div id="popup5" class="overlay">
   <div class="popup">
     <h2>log out</h2>
     <a class="close" href="#">&times;</a>
     <div class="content">
      Are you sure you want to close application<br>
     </div>
     <div class="">
       <br>
       <a type="button" class="log_but" name="button" href="#"> No</a>
        <a  type="button" class="log_but" name="button" href="HTML/login.html">yes</a>
     </div>
   </div>
  </div>
  <hr >





  <a href="addItem.php"><button class="raise" >ADD FOOD</button></a>
  <a href="updateFood.php"><button class="raise">UPDATE FOOD</button></a>
  <a href="DeleteFood.php"><button class="raise">DELETE FOOD</button></a>
  <a href="prmotion.php"><button class="raise">PRMOTION</button></a>
  <a href="#"><button class="raise">INCOME</button></a>

  <h1>SALSE INCOME</h1>
  <table border="1">
<tr>
  <td></td>
  <td>Price</td>
  <td>QTY</td>
  <td>Income</td>
</tr>

<?php
require 'config.php';
$tot=0;
$sql = "SELECT image ,name,order_details.food_id ,price from order_details,food  where order_details.food_id=food.Food_Id GROUP BY order_details.food_id";
$result = $conn->query($sql);

if($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
      echo("<tr>
      <td><img  src='images/food/$row[image]' class='img1'><label class='name1'>$row[name]</lable></td>
      <td>Rs $row[price].00</td>"
    );
      $qty=$row['price'];

      $sql1 = "SELECT SUM(amount)as tot , SUM(qty)as qt  from order_details WHERE food_id='$row[food_id]'";
      $result1 = $conn->query($sql1);

      if($result1->num_rows > 0){
        while($row = $result1->fetch_assoc()){

          $qty1=$row['qt'];
          $ftot=$qty*$qty1;
          $tot=$tot+$ftot;
          echo("
          <td>$qty1</td>
          <td>Rs $ftot.00</td></tr>");

        }
      }

  }
}
echo("<tr>
  <td  colspan='3'><br><h3>
   Total sales</td>
  <td>Rs $tot.00</td>
</tr>")
 ?>


  </table>


</body>
</html>
