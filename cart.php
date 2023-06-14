<!DOCTYPE html>
<?php

session_start();
$orderid=$_SESSION['orderid'];

 ?>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>


  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@600&display=swap" rel="stylesheet">

  <style media="screen">
  body{
    margin-left:5%;
    margin-right:5%;
    margin-top: 5%;
    background-position: center center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  color: white;
  font-family: 'Josefin Sans', sans-serif;
  }

  .tb_cart{

    border-spacing: 0 15px;
  }
  tr{
    background-color: black;
    opacity: 0.7;

  }
  td{
    text-align:center;
  }
  .table1{
      border-spacing: 0 ;
  }
#id1{
  height: 50px;
}
#id2{
  height: 50px;
}
#id03{
  font-size: 20px;
}
#pay{
  background-color: #18b527;
  color: white;
  border: none;
  border-radius: 5px;
  height: 40px;
  font-size: 18px;
}
.p_btn ,.m_btn{
  background-color: #ff8640;
  color: white;
  border: none;
  border-radius: 20px;
  height: 20px;
  width: 20px;
  font-size: 18px;
  text-align: center;
  padding:0px 3px;
}
.delete{
  background-color: black;
  color:  black;
  border: none;
  border-radius: 5px;
  height: 30px;
  font-size: 18px;

}
  </style>


  <script src="javascript/cart.js"></script>


</head>

<body onload="tot()" background="images\back1.jpg">

<a href="HTML/home.html"> <img src="images\BBo.png" height="40px" width="40px"alt=""> </a>


  <h1>Shopping Cart</h1>

  <table border="0" class="tb_cart" width="100%">
    <tr id="id1" >
      <th>

      </th>
      <th >
      </th>
      <th>
        Quantity
      </th>
      <th></th>
      <th>
        Unit Price
      </th>
      <th>
        Amount
      </th>
    </tr>


        <?php
          require'config.php';
          global $conn;
          $count=0;
          $total=0;
          $sum=0;
          $tot=0;
          //// methana sesion ekk add krl eka ganin palleha dl thiyen nama
          $sql="SELECT food_id , Details_Id, qty FROM order_details where order_no='$orderid'";
          $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $id=$row['food_id'];

                $D_Id=($row['Details_Id']);
                $qty=$row['qty'];
                  // echo($orderid);

                $sql1 = "SELECT * FROM food where Food_Id ='$id' "; // methana name chack krhn
                $result1 = $conn->query($sql1);


                if($result1->num_rows > 0){

                    while($row = $result1->fetch_assoc()){


                  echo "
                  <tr>
                  <td width='10%'><img src='images/food/".$row["image"]."' width='100%' height='100%'></td>
                  <td>$row[name]</td>
                  <td>
                    <div><b>
                    <form class='' action='' method='post'>
                      <input type='hidden' name='D_ID' value='$D_Id'>

                      <button type='submit' name='plus' class='p_btn' onmouseout='tot() ' onmouseup='tot(),quit() '> + </button>
                      <p  class='qut' id='qty'>$qty</p>
                      <button type='submit' name='minus' class='m_btn'  onmouseout='tot()' onmouseup='tot(),quit()'> - </button>

                        </form>
                    </b></div>

                  </td>
                  <td>
                  <form method='POST' action='cart.php'>
                  <input type='hidden' name='D_ID' value='$D_Id'>

                  <button type='submit' class= 'delete' name='delete' ><img src='images\Delete buttion.png' height='35px' width='25px'></button>
                  </form> </td>

                  <td><label class='amount'>$row[price]</label></td>
                  <td><label class='sum'>".$row['price']* $qty ."</lable></td></tr>


                  ";
                      $sum=$sum+$row['price']* $qty;
                }
              }

                echo "";

                $sql3 = "SELECT discount FROM promotion where foodId ='$id' "; // methana name chack krhn
                $result3 = $conn->query($sql3);


                if($result3->num_rows > 0){

                    while($row = $result3->fetch_assoc()){

                      // echo "$row[discount]";
                      $total=$total+$row['discount'];

                    }
                  }

                  $tot=$sum-$total;

          }
          }

          // session_destroy();
          if (isset($_POST['delete'])) {
          $Details_Id=$_POST['D_ID'];

          // echo($Details_Id);
          $sql2 = "DELETE FROM order_details WHERE Details_Id='$Details_Id'";

          if ($conn->query($sql2) === TRUE ) {
          header("Refresh:1");
          } else {
            // echo "Error: " . $sql2 . "<br>" . $conn->error;

          }


          }
          if (isset($_POST['plus'])) {
          $Details_Id=$_POST['D_ID'];

          $sql5 = "SELECT qty FROM order_details WHERE Details_Id=$Details_Id "; // methana name chack krhn
          $result5 = $conn->query($sql5);


            if($result5->num_rows > 0){
            while($row = $result5->fetch_assoc()){

                  $sql4 = "UPDATE order_details SET qty=$row[qty]+1  WHERE Details_Id=$Details_Id";

                  if ($conn->query($sql4) === TRUE ) {
                  header("Refresh:1");
                  } else {
                    // echo "Error: " . $sql4 . "<br>" . $conn->error;


                  }
                }
              }
            }




            if (isset($_POST['minus'])) {
            $Details_Id=$_POST['D_ID'];

            $sql6 = "SELECT qty FROM order_details WHERE Details_Id=$Details_Id "; // methana name chack krhn
            $result6 = $conn->query($sql6);


              if($result6->num_rows > 0){
              while($row = $result6->fetch_assoc()){

                  if ($row['qty']<=1) {
                    $sql7 = "UPDATE order_details SET qty=1 WHERE Details_Id=$Details_Id";
                  }
                  else{
                    $sql7 = "UPDATE order_details SET qty=$row[qty]-1 WHERE Details_Id=$Details_Id";

                    if ($conn->query($sql7) === TRUE ) {
                      // header( 'Location: cart.php' );
                    } else {
                      // echo "Error: " . $sql7 . "<br>" . $conn->error;

                    }
                    }
                  }
                }
              }




        ?>
      </table>

        <table width="100%" class="table1">

        <tr>
          <td colspan="5" width="85%"></td>

          <td>

            <h3 id="id01"><?php echo $sum; ?></h3>

          </td>
        </tr>
        <tr>
          <td colspan="5"  style="text-align:right"> Discount</td>

          <td id="id02">-0</td>
        </tr>
        <tr >
          <td colspan="5" id="id2" style="text-align:right" > <h2>Total pay</h2></td>
          <td id="id03" onchange=""><?php echo $tot; ?></td>
        </tr>

</table>
<?php
$_SESSION['tot']=$tot;

 ?>

<br>
<div class="pay">
  <p align="right"><a href="payment.php" > <button type="button" name="button" id="pay" onclick="qty()" >check out </button> </a></p>
</div>


</body>
</html>

<script>


const element1 = document.getElementById("id02");
element1.innerHTML = -"<?php echo $total ?>";


//


  </script>
