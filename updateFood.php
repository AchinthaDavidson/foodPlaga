<?php

require'config.php';
if (isset($_POST['upload'])) {
  $name=$_POST['name'];
  // $newName=$_POST['new_name'];
  // $newDis=$_POST['new_dis'];
  $newPrice=$_POST['new_price'];

  $sql="SELECT *FROM food WHERE name='$name'";
  $result = $conn->query($sql);

  if($result->num_rows > 0){

    while($row = $result->fetch_assoc()){
        if ($_POST['new_name']==""){
            $newName=$row["name"];
        }
        else{
          $newName=$_POST['new_name'];
        }

        if ($_POST['new_dis']==""){
            $newDis=$row["Discription"];
        }
        else{
            $newDis=$_POST['new_dis'];
        }

        if ($_POST['new_price']==""){
              $newPrice=$row["price"];
        }
        else{
            $newPrice=$_POST['new_price'];
        }

    }
  }

  $sql="UPDATE food SET name='$newName',price='$newPrice',Discription='$newDis' WHERE name='$name'";
  $result = $conn->query($sql);

  if ($conn->query($sql) === TRUE) {
    echo "Update Food Details";
  } else {
    echo "Error: " . $sq . "<br>" . $conn->error;
  }
}


 ?>

<html>
<head>
<title> Upload</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

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
<a href="#"><button class="raise">UPDATE FOOD</button></a>
<a href="DeleteFood.php"><button class="raise">DELETE FOOD</button></a>
<a href="prmotion.php"><button class="raise">PRMOTION</button></a>
<a href="income.php"><button class="raise">INCOME</button></a>

  <h1>UPDATE FOOD </h1>
  <form  action="" method="post" enctype="multipart/form-data">

    <p>Select Food Name to Update</p>
    			<select class="" name="name" id="catag" onChange="update()" required>
    				<?php
    						require 'config.php';
    						function readData()
    						{
    							global $conn;
    							$sql = "SELECT name FROM food";
    							$result = $conn->query($sql);
    							if ($result->num_rows > 0)
    								{
    									while($row = $result->fetch_assoc())
    										{
    												echo "<option>" . $row["name"] ." </option> " ;
    										}
    								}
    							else
    									{
    											echo "No results";
    									}
    							$conn->close();
    						}
    						readData();
                ?>
    			</select>



          <p>Edit Name</p>
          <input type="text" name="new_name"  value="">

          <p>Edit Discription</p>
          <input type="text" name="new_dis"  value="">

          <p>Edit Price</p>
          <input type="number" name="new_price"  value="" pattern="[0-9]{0-10}"><br><br>

          <button type="submit" name="upload">Update</button>
      </form>

</body>
</html>
