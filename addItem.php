<?php
require'config.php';


error_reporting(0);

$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {
	$name=$_POST['name'];
	$price=$_POST['price'];
	$dis=$_POST['dis'];
	$catag=$_POST['catag'];
	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "images/food/".$filename;

	global $conn;
		$sql="SELECT RIGHT(Food_Id,3)  from food ORDER BY Food_Id DESC LIMIT 1 ";
		$result = $conn->query($sql);

		$sql1="SELECT C_ID FROM category where Name="."'$catag'";
		$result1 = $conn->query($sql1);

			if ($result->num_rows > 0) {
			  // output data of each row
			  while($row = $result->fetch_assoc()) {
						$id= $row["RIGHT(Food_Id,3)"];
						$id=$id+1;
							if ($result1->num_rows > 0) {
								// output data of each row
								while($row = $result1->fetch_assoc()) {

									$categ=$row["C_ID"];

									$sql1 = "INSERT INTO food VALUES ('FD$id', '$name', '$categ','$price','$filename','$dis','AD001')";
									}
								}
			  }
			}


		// Execute query
		mysqli_query($db, $sql1);

		// Now let's move the uploaded image into the folder: image
		if (move_uploaded_file($tempname, $folder)) {
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image";
	}
  if ($conn->query($sql1) === TRUE) {
    echo "Successfully Add the Food";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}
?>
<html>
<head>
	<style media="screen">

	</style>
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




<a href="#"><button class="raise" >ADD FOOD</button></a>
<a href="updateFood.php"><button class="raise">UPDATE FOOD</button></a>
<a href="DeleteFood.php"><button class="raise">DELETE FOOD</button></a>
<a href="prmotion.php"><button class="raise">PRMOTION</button></a>
<a href="income.php"><button class="raise">INCOME</button></a>

  <h1>ADD FOOD </h1>
  <form  action="addItem.php" method="post" enctype="multipart/form-data">


      <p>Food Name</p>
        <input type="text" size="50" required name="name">


      <p>Category</p>
			<select class="" name="catag" required>
				<?php
						require 'config.php';
						function readData()
						{
							global $conn;
							$sql = "SELECT Name FROM category";
							$result = $conn->query($sql);
							if ($result->num_rows > 0)
								{
									while($row = $result->fetch_assoc())
										{
												echo "<option>" . $row["Name"] ." </option> " ;
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

      <p>Price</p>
        <input type="number" size="50" required name="price" pattern="[0-9]{0-10}">

      <p>Discription</p>
        <input type="text" size="50" name="dis">
<br><br>
	<input type="file" name="uploadfile"  required value=""/>
<br><br>
	<div>
		<button type="submit" name="upload">Add</button>
		</div>
</form>
</div>
</body>
</html>
