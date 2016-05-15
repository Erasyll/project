<?php 
if(isset($_POST['category'])){
	$category=$_POST['category'];
	$title=$_POST['title'];
	$photo=$_POST['photo'];
	$cost=$_POST['cost'];
	echo "<a href='".$photo."'>link</a>";
	include "db.php";
	mysql_query("INSERT INTO 2buy (id,category,title,photo,cost) VALUES(NULL,'$category','".addslashes($title)."','$photo','$cost')")or die(mysql_error());
	header("location:index.php");
	}

 ?>