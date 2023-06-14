<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
      <link rel="stylesheet" href="CSS/login_new.css">
      <link rel="stylesheet" href="CSS/style.css">
      <link rel="stylesheet" href="CSS/foodlist.css">
  </head>
  <body background="images\background.jpg">
    <center>
      <h1 class="section-title"> Welcome to FOOD PLAGA </h1>


      <div class="forms" >
        <div class="form-wrapper is-active">
          <button type="button" class="switcher switcher-login">
            Change Password
            <span class="underline"></span>
          </button>
          <form class="form form-login"method="post"action="">


              <div class="input-block">
                <label for="login-email">User Name</label>
                <input id="login-email" type="name" name="username" required>
                <!-- <a href="#"class="btn-login" onclick="change();" type="submit"> submit</a> -->
                <input type="submit" onclick="change();" class="btn-login" style="background-color:orange;" name="email" value="send OTP">
                </form>
                  <form class="form form-login"method="post"action="">

                <span id = "message3" style="color:white;"> </span><br>
                <label for="login-password">OTP</label>
                <input id="login-password" type="text" name="OTP"  >
                <input type="submit" name=" submit" value="submit">
              </div>




          </form>

</center>
<!-- <script src="javascript/login_new.js" charset="utf-8"></script> -->
  </body>
</html>


<?php

require'config.php';


$num=(rand(100,999));

  if (isset($_POST['email'])) {
    $userName=$_POST['username'];
  $sql="SELECT Email from customer where UserName='$userName'";
  $result=$conn->query($sql);

  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){


      $email=$row['Email'];
      $subject = 'OTP';
      $message = $num;
      $headers = "From: $email";
      echo $email;
      if (mail($email, $subject, $message, $headers)) {
          echo "Email successfully sent to $to_email...";
      } else {
          echo "Email sending failed...";
      }

    }
  }
}

  if (isset($_POST['delete'])) {
    $otp=$_POST['OTP'];
    if ($otp==$num) {
      echo "
         <div class='popup'>
           <h2></h2>

           <div class='content'>
        NEW Password sent to your Email <br>
           </div>
           <div class=''>
             <br>
             <a type='button' class='log_but' name='button' href='HTML/Login.html''> Ok</a>

           </div>
         </div>
        </div>";

    }else{

      echo "
         <div class='popup'>
           <h2></h2>

           <div class='content'>
        sorry try agin in few min <br>
           </div>
           <div class=''>
             <br>
             <a type='button' class='log_but' name='button' href='HTML/Login.html''> Ok</a>

           </div>
         </div>
        </div>";


    }

  }

 ?>
