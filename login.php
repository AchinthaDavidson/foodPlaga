
<?php
require'config.php';



$userName=$_POST['username'];
$pswd=$_POST['password'];

session_start();
// $query = mysql_query("select Coustomer_ID from account order by Coustomer_ID desc limit 1", $connection);
$sql = "select UserName ,Password , customer_ID from customer";
$result = $conn->query($sql);

$sql1 = "select userName ,password  from admin";
$result1 = $conn->query($sql1);


if($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
    if ($userName==$row["UserName"]&& $pswd==$row["Password"]){
      $accountId=$row["UserName"];
      header( 'Location: HTML/home.html' );

    }
    if($result1->num_rows > 0){
      while($row = $result1->fetch_assoc()){
        if ($userName==$row["userName"]&& $pswd==$row["password"]){
          header( 'Location: addItem.php' );
        }
        else{
            header( 'Location: HTML/Login.html' );
        }
      }
    }

  }

}
$sql1="SELECT customer_ID FROM customer where userName='$userName'";
$result1 = $conn->query($sql1);

  if ($result1->num_rows > 0) {
    while($row = $result1->fetch_assoc()) {
        $_SESSION['C_ID']=$row['customer_ID'];
      }
    }

$_SESSION['accountId']=$accountId;
// setcookie($accountId, "", time() + (86400 * 30), "/");

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;

}

$conn->close();
?>
