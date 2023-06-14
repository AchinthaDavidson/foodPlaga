<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styleAcc.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@600&display=swap" rel="stylesheet">


<link rel="stylesheet" href="CSS/static.css">
  </head>

  <body background="images\back1.jpg">
      <a href="HTML/home.html"> <img src="images\BBo.png" height="40px" width="40px"alt=""> </a>
    <div class="data">
        <br>
        <img src="images/Food Plaga Logo.png" height="80" width="80" alt="">
        <label class="logo">Food Plaga</label>
        <hr class="line" align= "left">
        <h1>your orders</h1>

        <table >
          <?php
          require'config.php';
          global $conn;
          session_start();

          $C_ID=$_SESSION['C_ID'];
          // echo($C_ID);

          $sql="SELECT order_no, date, time from orderlists where customer_ID=$C_ID ";
          $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
// echo($row['order_no']);
                     $O_ID=$row['order_no'];
                     $DATE=$row['date'];
                     $TIME=$row['time'];
                      $sql1="SELECT * from order_details,food where order_details.food_id=food.Food_Id and order_no='$O_ID'";
                      $result1 = $conn->query($sql1);

                              if ($result1->num_rows > 0) {
                                while($row = $result1->fetch_assoc()) {
                                    // echo($row['food_id'].'<br>');
                                    // $_SESSION['D_ID']=$row['Details_Id'];



                                                  echo ("
                                                  <tr>
                                                  <td width='10%'><img src='images/food/".$row["image"]."' width='100%' height='100%'></td>
                                                  <td><label class='name'>$row[name]</label> <label class='date'>$DATE/ $TIME</label></td>

                                                  <td><h3><label class='amount'>Rs$row[price].00</label></h3></td>

                                                  <td>
                                                  <form action='delete.php' method='post'>
                                                  <button type='submit' name='delete' value='$row[Details_Id]'>Delete food</button>
                                                  </form>
                                                  </td>
                                                  </tr>");


                                        }
                                    }
                                }
                            }

                      $conn->close();
?>
</table>



  </body>
</html>
