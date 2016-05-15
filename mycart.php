<!DOCTYPE html>
<html>
<head>
	<title>Watches</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<style type="text/css">
	html{
		font-family: arial !important;
	}
	.photo{ 
   
    display: inline-block;
    width: 100px;
    height: 100px;
    background-position: center center;
    background-size: cover;
    
	}.2buy_this{
	background-color: black;
	border: 1px solid black;
	}	</style>
	
</head>
<body bgcolor="#FDFDFD">


<?php 
session_start();
	$log=$_SESSION['login'];
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
	
		<div style="width: 600px;background-color: white;margin: auto;margin-top: 50px;" >
<center><table width='580px;'border='0'  style='text-align:center;margin:0;'>
<tr></tr>
<tr></tr>
<tr></tr>
<tr style="color:gray;margin-bottom: 15px;">


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
$sql = " SELECT * FROM cart WHERE user_id='$user_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
if ($row['object_status']=='BUY NOW'){
	echo "
<tr style='color:#2B5892;'>
<td><h3><div class='photo' style='background-image: url(".$row['object_photo'].");'></div></h3></td>
<td style='color:black'><h3>".$row['object_cat']."</h3></td>
<td><h3>".$row['object_title']."</h3></td>
<td style='color:#34A953;'><h3>$".$row['object_cost']."</h3></td>
<td><a href='cart_funct.php?task2=buy&object_id=".$row['id']."'><button style='color:white;background-color:#34A953;border:hidden;border-radius:2px;height:20px;width:80%;margin-bottom:3px;'>$ ".$row['object_status']."</button></a>
<a href='cart_funct.php?task2=delete&object_id=".$row['id']."'><button style='color:white;background-color:#EA4335;border:hidden;border-radius:2px;height:20px;width:80%;margin-bottom:3px;'>DELETE</button></a>


</tr>
";
}else{
	echo "
<tr style='color:#2B5892;'>
<td><h3><div class='photo' style='background-image: url(".$row['object_photo'].");'></div></h3></td>
<td style='color:black'><h3>".$row['object_cat']."</h3></td>
<td><h3>".$row['object_title']."</h3></td>
<td style='color:#34A953;'><h3>$".$row['object_cost']."</h3></td>
<td><a href='cart_funct.php?task2=buy&object_id=".$row['id']."'><button style='color:white;background-color:gray;border:hidden;border-radius:2px;height:20px;width:80%;margin-bottom:3px;' disabled> ".$row['object_status']."</button></a>
<a href='cart_funct.php?task2=delete&object_id=".$row['id']."'><button style='color:white;background-color:#EA4335;border:hidden;border-radius:2px;height:20px;width:80%;margin-bottom:3px;'>DELETE</button></a>


</tr>
";
}

}} else {
    echo "<br>";
    echo "<center> <p style='color:#888686;font-size:12px;'>empty</p></center>";
}
$conn->close();
?>


	</table></center>
		</div>

		

</body>
</html>
