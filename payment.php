<!DOCTYPE html>
<?php
require'config.php';
global $conn;
session_start();

$id=$_SESSION['C_ID'];
$sql="SELECT * FROM payment where Coustomer_ID=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {

        $curd_no=$row['curd_no'];
        $exp_mon  =$row['exp_mon'];
        $exp_year  =$row['exp_year'];
            }
      }
      else{
        $curd_no="";
        $exp_mon  ="";
        $exp_year  ="";


      }



 ?>


 <html>
     <head>
       <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@600&display=swap" rel="stylesheet">

         <title>Payment</title>
         <!-- <link rel="stylesheet" href="CSS/payment.css"> -->

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
         .container {
                     width: 30%;
                     background-image: url("../images/pay.jpg");
                     border:1px solid;
                     background-color: white;
                     display: flex;
                     flex-direction: column;
                     padding: 40px;
                     color: black;
                     opacity: 0.8;
                   }
                   .first-row {
                                display: flex;
                              }

                   .Owner {
                         width:100%;
                         margin-right: 40px;
                          }




                   .input-field input{
                       width:100%;
                       border-width: 2px;
                       padding: 10px;
                   }

                   .selection{
                       display: flex;
                       justify-content: space-between;
                       align-items: center;

                   }

                   .selection select{
                       padding: 10px 20px;
                   }


                  .btn {
                     background-color: #18b527;
                     color: white;
                     border: none;
                     border-radius: 5px;
                     height: 40px;
                     width: 100px;
                     font-size: 18px;
                   }

                                     .btn {
                                        background-color: #18b527;
                                        color: white;
                                        border: none;
                                        border-radius: 5px;
                                        height: 40px;
                                        width: 100px;

                                      }

                   .change{
                     border: none;
                     background: none;
                     float:left;
                     color:gray;
                   }
                   .visa{
                     float: right;
                   }

         </style>
     </head>
     <body background="images\back1.jpg">
       <a href="cart.php"><img src="images\BBo.png" height="40px" width="40px"alt=""></a>
<center>

         <h3 >CHECKOUT</h3>




                 <br>




         <div class="container" >
           <form class="" action="" method="post" >


             <h2>Add card details</h2>
             <div class="first-row">
                 <div class="Owner">
                     <h3>Owner</h3>
                     <div class="input-field">
                         <input type="text" required>
                     </div>
                 </div>
                 <div class="cvv">
                     <h3>CVV</h3>
                     <div class="input-field">
                         <input type="password" required pattern="[0-9]{3}"  maxlength="3">
                     </div>
                 </div>
             </div>
             <div class="second-row">
                 <div class="card-number">
                     <h3>Card-number</h3>
                     <div class="input-field">
                       <input id="ccn" type="tel" inputmode="numeric" name="cardNum" pattern="[0-9\s]{13,16}" value="<?php echo $curd_no ?>"  autocomplete="cc-number" maxlength="16" placeholder="xxxx xxxx xxxx xxxx">
                         <!-- <input type="tel" name="cardNum"   value="<?php echo $curd_no ?>"> -->
                     </div>
                 </div>
             </div>
             <div class="third-row">
                     <h3 align="left">Expiration Date</h3>

                         <div class="first-row input-field">
                            <input type="text" class="input-field" style="width:50px" name="mon" pattern="[0-1]+[0-9]" maxlength="2" placeholder="MM"value="<?php echo $exp_mon ?>" required>  &nbsp;
                            <input type="text" class="input-field"  style="width:50px" name="year" pattern="[2]+[0-9]" maxlength="2" placeholder="YY" value="<?php echo $exp_year ?>"required>
                          </div><img src="images/Visa.png" alt="Flowers in Chania" height="40px" class="visa">
                        <br>
                             <div class="first-row input-field">
                            <input type="text" style="width:70px; float:right;" name="" value="RS <?php echo $_SESSION['tot'] ?>.00" disabled>
                         </div>

                     </div>
                     <br>

                 <input type="submit" name="submit" class="change"value="save details">
                 <input type="submit" name="delete"  class="change" value="delete my card details"><br>
                <hr>
                 <br>
                 <input type="radio" name="button"  required class="btn1" onclick=" btn1();" >Delivery
                  <input type="radio" name="button" required class="btn1"  onclick=" btn1();">Takeaway<br><br>
                  </form>
                  <a href="paymentcon.php">
                  <button type="submit"  name= "button1" href="payment.html"name="button"id="b1" class="btn" style="float:right;" disabled value="PAY">pay</button>
                  </a>


       </div>

       </center>
     </body>
     <script type="text/javascript">
       function btn1(){

        document.getElementById("b1").disabled=false;
       }
     </script>
 </html>



<?php

require'config.php';
global $conn;

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

}
else {
  // echo "Error: " . $sql . "<br>" . $conn->error;
}

  if (isset($_POST['submit'])) {
    $C_No=$_POST['cardNum'];
    $Ex_m=$_POST['mon'];
    $Ex_y=$_POST['year'];
  $sql="INSERT into payment values('$id',' $C_No','$Ex_y','  $Ex_m')";

  if ($conn->query($sql) === TRUE) {
  // header( 'Location: payment.php' );


  }
  else {

    $sql="UPDATE payment SET  curd_no=$C_No, exp_year=$Ex_y, exp_mon=$Ex_m WHERE Coustomer_ID=$id";
    if ($conn->query($sql) === TRUE) {
      // header( 'Location: payment.php' );


    }
    else {
      // echo "Error: " . $sql . "<br>" . $conn->error;
    }

  }

  }

  if (isset($_POST['delete'])) {

    $sql="DELETE FROM payment WHERE Coustomer_ID=$id";
  if ($conn->query($sql) === TRUE) {
  // header("Refresh:1");
  }
  else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
  }


  }

  if (isset($_POST['button1'])) {

$_SESSION['orderid']=0;
echo "hi";

  }
?>
