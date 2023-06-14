<?php
require'config.php';
if (isset($_POST['add'])) {
  $name=$_POST['name'];
  $price=$_POST['price'];
  global $conn;

  $sql="SELECT Food_Id from food  where name='$name' ";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        $id=$row['Food_Id'];
        $sql1 = "INSERT INTO promotion VALUES('$row[Food_Id]' ,$price,'AD002','$row[Food_Id]')";
    }
  }

  if ($conn->query($sql1) === TRUE) {
    echo "New record created successfully";
  } else {

    // echo "Error: " . $sql2 . "<br>" . $conn->error;

      $sql1="UPDATE promotion SET P_ID ='$id',discount=$price, A_ID ='AD002',foodId='$id' WHERE P_ID='$id'";

    if ($conn->query($sql1) === TRUE) {
      echo "New record created ";
    } else {
      echo "Error: " . $sql1 . "<br>" . $conn->error;
    }

  }


}
if (isset($_POST['delete'])) {
    $delete=$_POST['delete1'];

    $sql="SELECT Food_Id from food  where name='$delete' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          $sql="DELETE from promotion where p_ID='$row[Food_Id]'";

        }
      }
      if ($conn->query($sql) === TRUE) {
        echo "New record created ";
      } else {
        echo "Error: " . $sql. "<br>" . $conn->error;
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
<a href="updateFood.php"><button class="raise">UPDATE FOOD</button></a>
<a href="DeleteFood.php"><button class="raise">DELETE FOOD</button></a>
<a href="#"><button class="raise">PRMOTION</button></a>
<a href="income.php"><button class="raise">INCOME</button></a>

  <h1>ADD/UPDATE Promotion </h1>
  <form  action="prmotion.php" method="post" enctype="multipart/form-data">





      <p>Select Food for Add Promotion</p>
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
      <p>Promotion Amount</p>
        <input type="text" size="50" required name="price" pattern="[0-9]{0-10}">

<br><br>

	<div>
		<button type="submit" name="add">Add/Update</button>
		</div>
</form>

<h1>DELETE FOOD </h1>
<form  action="" method="post" enctype="multipart/form-data">

  <p>Select Food Name to Delete</p>
        <select class="" name="delete1"  onChange="update()" required>
          <?php
              require 'config.php';

                global $conn;
                $sql = "SELECT name FROM food ,promotion WHERE promotion.foodId= food.Food_Id";
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


              ?>
        </select>

        <button type="submit" name="delete">Delete</button>
    </form>

</div>
</body>
</html>
