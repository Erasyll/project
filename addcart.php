<?php 
include "db.php";
session_start();
$user_id=$_SESSION['id'];
$object_id=$_GET['object'];
$result=mysql_query("SELECT * FROM 2buy WHERE id='$object_id'",$db);
$myrow=mysql_fetch_array($result);
$object_title=$myrow['title'];
$object_cat=$myrow['category'];
$object_photo=$myrow['photo'];
$object_cost=$myrow['cost'];
$status="BUY NOW";

$result=mysql_query("INSERT INTO cart (id,user_id,object_id,object_title,object_cat,object_photo,object_cost,object_status) VALUES(NULL,'$user_id','$object_id','$object_title','$object_cat','$object_photo','$object_cost','$status')",$db);

if($result=='TRUE'){
	if($_GET['status']=='add'){header("location:mycart.php");
	
}

}



 ?>