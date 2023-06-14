<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styleAcc.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@600&display=swap" rel="stylesheet">
  </head>
  <link rel="stylesheet" href="CSS/account.css">
  <link rel="stylesheet" href="CSS/static.css">
  </head>

  <body background="images\back1.jpg">
    <a href="HTML/home.html"> <img src="images\BBo.png" height="40px" width="40px"alt=""> </a>
    <div class="data">
        <br>
        <img src="images/Food Plaga Logo.png" height="80" width="80"  alt="">
        <label class="logo">Food Plaga</label>
        <hr class="line" align= "left">

        <table  >
          <tr >
            <td rowspan="6" >
              <img class="img" src="images/avatar/<?php echo (rand(1,18))  ?>.jpeg" alt="">
              <br>
              <?php
                  require'config.php';
                  session_start();
                  $username=$_SESSION['accountId'];
                  // $username=$_COOKIE[$accountId];
                  echo "<h2 class='user'>".$username."</h2>";

                  $sql = "select * from customer where UserName='".$username."' ";
                  $result = $conn->query($sql);

                  if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){

                  ?>
            </td>
              <td>
                 <label for="">Name :
                      <?php   echo "  ".$row["Name"];

                        ?>
                  </label>
              </td>


          </tr>
          <tr>
            <td>
              <label for="">Email :
                      <?php   echo "  ".$row["Email"];
                     ?>
               </label>
            </td>

          </tr>
          <tr>
            <td>
              <label for="">Address :
                <?php   echo "  ".$row["Address"];

                     ?>
              </label><br>
                    <label class="change" id="check" onclick="enable()"> change address </label>
            </td>
            <td>
            <form class=" details" action="changeAccount.php" method="post" >
              <input type="text"  id="Address1" name="address1"  placeholder="Enter the new Address..." disabled>
              <input type="submit" id="Address2" value="change"  name="address" disabled>
            </form>
            </td>

          </tr>
          <tr>
            <td>
              <label for="">Contact NO :
                <?php   echo "  ".$row["Tele_No"];
              }}
                     ?>
                </label>
                    <label class="change" id="check1" onclick="enable1()">change Contact No </label><br><br>
                    <label class="change" id="check2" onclick="enable2()">change Password </label>
            </td>
            <td><br><br><br>
              <form class="details" action="changeAccount.php"  method="post">
                <input type="text"placeholder="Enter the new  Number..."  name="con1" id="con1" value=""disabled>
                <input type="submit" name="con2" id="con2"value="Change"disabled>
              </form><br>


              <form class="details" action="changeAccount.php" method="post">
                <input type="password" placeholder="Enter the current password" name="psw1" id="psw1"value=""disabled><br>
                <input type="password" placeholder="Enter the new password" name="psw2" id="psw2"value=""disabled onkeyup='check();'required><br>
                  <input type="password" placeholder="confirmed password"name="paw3" id="psw3"value=""disabled onkeyup='check();'required><br>
                  <span id = "message2" style="color:red; font-size:12px;"> </span>
                <input type="submit" name="submit" id="submit"value="change"disabled>
              </form>
            </td>

          </tr>


        </table>


    </div>


    <script type="text/javascript">
    function enable(){
     if(document.getElementById("check").onclick)
     {
      document.getElementById("Address1").disabled=false;
      document.getElementById("Address2").disabled=false;
     }
     else{
      document.getElementById("Address1").disabled=true;
        document.getElementById("Address2").disabled=false;
     }
    }


    function enable1(){
     if(document.getElementById("check1").onclick)
     {
      document.getElementById("con1").disabled=false;
      document.getElementById("con2").disabled=false;
     }
     else{
      document.getElementById("con1").disabled=true;
        document.getElementById("con2").disabled=false;
     }
    }


    function enable2(){
     if(document.getElementById("check2").onclick)
     {
      document.getElementById("psw1").disabled=false;
      document.getElementById("psw2").disabled=false;
      document.getElementById("psw3").disabled=false;
      document.getElementById("submit").disabled=false;
     }
     else{
      document.getElementById("psw1").disabled=true;
      document.getElementById("pws2").disabled=false;
      document.getElementById("pws3").disabled=true;
      document.getElementById("submit").disabled=false;
     }
    }

    function check(){
    if(document.getElementById("psw2").value !=
    document.getElementById("psw3").value)
    {
    	      document.getElementById("message2").innerHTML = "**Passwords are not same";
    	      return false;
    	    }
    	else{
    		document.getElementById("message2").innerHTML = " ";
    		document.getElementById("submit").disabled=false;
    	}
    }

    </script>
      <script src="javascript/login_new.js" charset="utf-8"></script>
  </body>
</html>
