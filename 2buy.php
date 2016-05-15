<!DOCTYPE html>
<html>
<head>
	<title>Watches</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<style type="text/css">
	
	.photo{ 
    border:3px solid #eaeaea;
    display: inline-block;
    width: 150px;
    height: 150px;
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
		<div class="nav" style="font-family:arial !important;">
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
		
<div class="source" style="width:600px;height:100%;box-shadow:none;">
<center>

<?php 
$id=$_GET['object'];
include 'db.php';
$result=mysql_query("SELECT * FROM 2buy WHERE id='$id'",$db);
$myrow=mysql_fetch_array($result);


 ?>


<table border="0"><tr><td><img src="<?php echo $myrow['photo']; ?>" style='height: 200px;width: auto;box-shadow: 0 0 5px black;'></td><td><table><tr><td><h2 style="color:#31587E;"><?php echo $myrow['title']; ?><h2></td></tr><tr><td><h1 style="color: #34A853;;">$ <?php echo $myrow['cost']; ?></h1></td></tr></table></td></tr>
<tr>
	<td><input type="button" value="Back" onclick="window.history.back()" / style="width: 40%;height: 25px;font-size: 15px;color: black;background-color: green;border: hidden;border-radius: 3px;"> </td>

	<td><center>
<form action="addcart.php">
<input type="hidden" name="status" value="add"></input>
<input type="hidden" name="object" value="<?php echo $myrow['id']; ?>"></input>
<input type="submit" value="add to cart" style="width: 60%;height: 25px;font-size: 15px;color: black;background-color: green;border: hidden;border-radius: 3px;"></input></form>
</center>

	</td>
	
</tr></table></center>
</div>
</body>
</html>
