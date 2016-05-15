<!DOCTYPE html>
<html>
<head>
	<title>Watches</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<style type="text/css">
	.buy_watches
{
	display: inline-block !important;
	height: 100%;
	width: 185px;
	vertical-align: top;
	margin-right: 3px;
	margin-left: 3px;
	border-radius: 3px;
	font-family:arial;
	color: #618AD2;
	box-shadow: none;
	padding-left: 10px;
	padding-right: 10px;

}.photo{ 
    border:3px solid #eaeaea;
    display: inline-block;
    width: 150px;
    height: 150px;
    background-position: center center;
    background-size: cover;
}.buy_btn{
	background-color: #34A853;
	color: white;
	width: 80%;
	height: 25px;
	border-radius: 3px;
	border:hidden;



	}</style>
		
</head>
<body style="background-color:#FDFDFD">


<?php 
session_start();
include "db.php";
$log= $_SESSION['login'];
$user_id=$_SESSION['id'];

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
<a  style="color:lightblue;">@<?php echo $myrow['login']; ?></a>
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
			<div class="source" style="width:860px;margin-left: -25px;margin-top:50px;box-shadow:none;"><center>
	<br><b style="color:gray;font-family:arial;font-size: 25px;">Hublot</b><br><br>
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

$sql = " SELECT * FROM 2buy WHERE category='hublot' ORDER BY id DESC LIMIT 0,4";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {

echo "<div class='buy_watches' >
<br>
<div class='photo' style='background-image: url(".$row['photo'].");'></div>
	<br><br>
	<b>".$row['title']."</b><br>
	<b style='color:black'>$".$row['cost']."</b><br>
	<a href='2buy.php?object=".$row['id']."'><button class='buy_btn'>Buy</button></a><br><br>
	</div>";
}
} else {
    echo "<br>";
    echo "<center> <p style='color:#888686;font-size:12px;'>empty</p></center>";
}
$conn->close();
?><br><br>
<br><b style="color:gray;font-family:arial;font-size: 25px;">Rolex </b><a href="#" style="text-decoration: none; color:black;font-family: arial"></a><br><br>
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

$sql = " SELECT * FROM 2buy WHERE category='rolex' ORDER BY id DESC LIMIT 0,4";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {

echo "<div class='buy_watches' >
<br>
<div class='photo' style='background-image: url(".$row['photo'].");'></div>
	<br><br>
	<b>".$row['title']."</b><br>
	<b style='color:black'>$".$row['cost']."</b><br>
	<a href='2buy.php?object=".$row['id']."'><button class='buy_btn'>Buy</button></a><br><br>
	</div>";
}
} else {
    echo "<br>";
    echo "<center> <p style='color:#888686;font-size:12px;'>empty </p></center>";
}
$conn->close();
?>
<br>


</center>
<br>
<hr>
	</div>

		</div>
		</body>
	</div>
</body>
</html>
