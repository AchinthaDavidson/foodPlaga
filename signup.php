<html lang="en" dir="ltr">
  <head>
  <link rel="stylesheet" href="CSS/style.css">
  <link rel="stylesheet" href="CSS/foodlist.css">
</head>
  <body background="images\back1.jpg">
<?php
require'config.php';


$name=$_POST['FirstName']." ".$_POST['LastName'];
$address=$_POST['address'];
$tellNo=$_POST['tellNo'];
$email=$_POST['email'];
$userName=$_POST['userName'];
$pswd=$_POST['pswd'];


// $query = mysql_query("select Coustomer_ID from account order by Coustomer_ID desc limit 1", $connection);

$sql = "select UserName from customer";
$result = $conn->query($sql);





if($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
    if($userName===$row['UserName']){

      // echo $userName;
      echo $row['UserName'];
        $sql=0;


      }
      else {
        $sql = "INSERT INTO customer
        VALUES ('','$name', '$address','$email', '$tellNo','$userName','$pswd')";

      }




    }
  }

  if ($conn->query($sql) === TRUE ) {
    echo "
       <div class='popup'>
         <h2></h2>

         <div class='content'>
         Your Account was Created Successfully...!
         <br>
         </div>
         <div class=''>
           <br>
           <a type='button' class='log_but' name='button' href='HTML/Login.html''> Ok</a>

         </div>
       </div>
    ";

  } else {
    echo "
       <div class='popup'>
         <h2></h2>

         <div class='content'>
        User name is allready used <br>
         </div>
         <div class=''>
           <br>
           <a type='button' class='log_but' name='button' href='HTML/Login.html''> Ok</a>

         </div>
       </div>
    ";

  }






$conn->close();
?>
</body>

</html>
