<?php

require'config.php';
session_start();
$username=$_SESSION['accountId'];
	global $conn;

if (isset($_POST['address'])) {
  $address=$_POST['address1'];
    $sql= "UPDATE customer set Address='$address' where UserName='$username' ";


  }

  if (isset($_POST['con2'])) {
    $contact=$_POST['con1'];
      $sql= "UPDATE customer set Tele_No='$contact' where UserName='$username' ";


    }


    if (isset($_POST['submit'])) {
      $password=$_POST['psw1'];
      $newPsw=$_POST["paw3"];
        $sql= "SELECT Password from customer  where  UserName='$username' ";
        $result=$conn->query($sql);

        if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
						echo $newPsw;
            if ($row["Password"]==$password){

              $sql="UPDATE customer set Password='$newPsw' WHERE UserName='$username'";
            }
            else{
              // header( 'Location: account.php' );
            }

          }
        }


      }


  if ($conn->query($sql) === TRUE) {
    header( 'Location: account.php' );

  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }


$conn->close();
 ?>
