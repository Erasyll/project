<?php 
if($_GET['task2']=='delete'){
	include "db.php";
	$id=$_GET['object_id'];
	mysql_query("DELETE FROM cart WHERE id='$id'");
	header("location:mycart.php");
}
if($_GET['task2']=='buy'){
	include "db.php";
	$id=$_GET['object_id'];
	$result=mysql_query("SELECT * FROM cart WHERE id='$id'",$db);
	$myrow=mysql_fetch_array($result);

header('location:buyfinish.php?object_id='.$id.'&photo='.$myrow['object_photo'].'&title='.$myrow['object_title'].'&cost='.$myrow['object_cost']);
}
if($_GET['task2']=='finish_buy'){
	$object_id=$_GET['object_id'];
	$photo=$_GET['photo'];
	$title=$_GET['title'];
	$cost=$_GET['cost'];
	$name=$_GET['name'];
	$city=$_GET['city'];
	$address=$_GET['address'];
	$number=$_GET['number'];
	include "db.php";
	$res=mysql_query("INSERT INTO orders (id,object_id,photo,title,cost,name,city,address,number_u) VALUES(NULL,'$object_id','$photo','$title','$cost','$name','$city','$address','$number')");
	if($res='TRUE'){
		
		$res2=mysql_query("UPDATE cart SET object_status='BOUGHT' WHERE id='$object_id'");
		if($res=='TRUE'){
			
			header('location:mycart.php');
		}
	}
}
 ?>
