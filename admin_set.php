<!DOCTYPE html>
<html>
<header></header>
	<title>Watches</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<style type="text/css">
.photo{ 
    border:3px solid #eaeaea;
    display: inline-block;
    width: 50px;
    height: 50px;
    background-position: center center;
    background-size: cover;
}.upload_inpt{
	height: 20px;
	width: 250px;
	border-radius: 3px;
	background-color: white;
	}</style>
		
</head>
<body style="background-color:#FDFDFD">


<?php 
session_start();
include "db.php";
$log= $_SESSION['login'];
if($log!='admin'){header("location:sign.php");}
$result=mysql_query("SELECT * FROM users WHERE login='$log'",$db);
$myrow=mysql_fetch_array($result);
if (empty($_SESSION['login']) or empty($_SESSION['id'] or empty($_SESSION['password'])) )
{
header("location:sign.html");
}  ?>
	<div class="wall">
		<div class="nav">
			<a href="index.php"><img src="img/logo.jpg"></a>
			<div class="nav_left">
				

<table style="float:left;">

<tr>
 <?php
            if($_SESSION['login']=="admin"){
              echo '<td style="width: 100px;">
          <p>
              <a href="admin_set.php">Admin</a>
          </p>
            </td>';
            }
           ?>
<td style="width: 100px;">
<p>
<a href="index.php">Main page</a>
</p>
</td>
<td style="width: 100px;">
<p>
<a href="mycart.php">My cart</a>
</p>
</td>
<td style="width: 100px;">
<p>
<a  style="color:lightblue;">@<?php echo $log; ?></a>
</p>
</td>

</tr>
</table>
			</div>
			<div class="nav_right">

			<p>
			<a href="delete.php" >log out</a>
			</p>
			</div>
	
		</div>
	
	<div class="source" style="box-shadow:none"><center>
	<br><b style="color:gray;font-family:arial;font-size: 25px;">Append a new watch</b><br><br>
<form action="upload_thing.php" method="post">
<table >
	<tr><td><label>Title</label></td><td>
	<select class="upload_inpt" name="category" required="">
		<option disabled>Choose a category</option>
		<option value="hublot">Hublot</option>
		<option value="rolex">Rolex</option>
		
	</select></td></tr>
	<tr><td><label>Model</label></td><td><input class="upload_inpt" type="text" name="title" placeholder=" Model of product" required=""></input></td></tr>
	<tr><td><label>Link</label></td><td><input class="upload_inpt" type="text" name="photo" placeholder=" http://watch.com/image" required=""></input></td></tr>
	<tr><td><label>Cost</label></td><td><input class="upload_inpt" type="text" name="cost" placeholder=" cost $100" required=""></input></td></tr>

</table>
	<input type="submit" value="Upload" style="width: 100px;height: 25px;color:white;background-color:green;border-radius: 3px;border:hidden; "></input>
</form>
</center>
<br>

	</div>

	<div class="source" style="width: 100%;box-shadow:none;"><center>
	<br><b style="color:gray;font-family:arial;font-size: 25px;">Orders</b><br><br>
	<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Ers";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$user_id=$_SESSION['id'];
$sql = " SELECT * FROM orders ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	echo "<table>";
while($row = $result->fetch_assoc()) {

	echo "<tr>
	<td>".$row['id']."</td>
	<td>".$row['object_id']."</td>
	<td><div class='photo' style='background-image:url(".$row['photo'].")'></div></td>
	<td>".$row['title']."</td>
	<td>".$row['name']."</td>
	<td>".$row['city']."</td>
	<td>".$row['address']."</td>
	<td>".$row['number_u']."</td>
	<td>$".$row['cost']."</td>
	</tr>";


}echo "</table>";
} else {
    echo "<br>";
    echo "<center> <p style='color:#888686;font-size:12px;'>empty </p></center>";
}
$conn->close();
?>
	 </center>
	</div>

	



</body>
</html>
