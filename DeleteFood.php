<?php

require'config.php';
if (isset($_POST['upload'])) {
  $name=$_POST['name'];


  $sql="DELETE FROM food WHERE name='$name'";
  $result = $conn->query($sql);

  if ($conn->query($sql) === TRUE) {
    echo "Food Item Deleted";
  } else {
    echo "Error: " . $sq . "<br>" . $conn->error;
  }
}


 ?>

<html>
<head>
<title>foodPlaga</title>
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
  <a href="updateFood.php"><button class="raise">UPDATE FOOD</button></a>
  <a href="#"><button class="raise">DELETE FOOD</button></a>
  <a href="prmotion.php"><button class="raise">PRMOTION</button></a>
  <a href="income.php"><button class="raise">INCOME</button></a>

  <h1>DELETE FOOD </h1>
  <form  action="" method="post" enctype="multipart/form-data">

    <p>Select Food Name to Delete</p>
    			<select class="" name="name"  onChange="update()" required>
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

          <button type="submit" name="upload">Delete</button>
      </form>

</body>
</html>
