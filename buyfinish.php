
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
    border:3px solid #eaeaea;
    display: inline-block;
    width: 100px;
    height: 100px;
    background-position: center center;
    background-size: cover;
    border-radius: 5px;
	}.2buy_this{
	background-color: black;
	border: 1px solid black;
	}	</style>
	
</head>
<body bgcolor="#FDFDFD">


<?php 
session_start();
	$log=$_SESSION['login'];
	$object_id=$_GET['object_id'];
	$photo = $_GET['photo'];
	$title = $_GET['title'];	
	$cost = $_GET['cost'];
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
	
		<div class="source" style="box-shadow:none;"><center>
	<br><b style="color:black;font-family:arial;font-size: 25px;">Make an order
</b><br><div style="border: 4px solid gray;width: 560px;border-radius: 5px;"><table>
	<tr>
		<td><div class="photo" style="background-image: url(<?php echo $photo; ?>);"></div></td>
		<td><h2><?php echo $title; ?></h2></td>
		<td><h2>$<?php echo $cost; ?></h2></td>
	</tr>
</table></div><br>
<form action="cart_funct.php" method="get">
<table >
	<tr><td><label>costumer name</label></td><td>
	<input type="hidden" name='task2' value="finish_buy"></input>
	<input type="hidden" name="object_id" value="<?php echo $object_id; ?>"></input>
	<input type="hidden" name='photo' value="<?php echo $photo; ?>"></input>
	<input type="hidden" name='title' value="<?php echo $title; ?>"></input>
	<input type="hidden" name='cost' value="<?php echo $cost; ?>"></input>
	<input class="upload_inpt" type="text" name="name" placeholder=" name and surname" required=""></input>
		
	</td></tr>
	<tr><td><label>your city</label></td><td><input class="upload_inpt" type="text" name="city" placeholder=" city" required=""></input></td></tr>
	<tr><td><label>your address</label></td><td><input class="upload_inpt" type="text" name="address" placeholder=" your address" required=""></input></td></tr>
	<tr><td><label>your number</label></td><td><input class="upload_inpt" type="text" name="number" placeholder=" +7 777 777 77 77 " required=""></input></td></tr>

</table>
	<input type="submit" value="Next" style="width: 100px;height: 25px;color:white;background-color:#517498;border-radius: 3px;border:hidden; "></input>
</form>
</center>
<br>

	</div>

		

</body>
</html>
