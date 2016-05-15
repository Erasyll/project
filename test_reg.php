<!DOCTYPE html>
<html>
<head>
	<title>Watches</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<meta charset="utf-8">

</head>
<body>
	<div class="wall">
		<div class="nav">
			<a href="index.php"><img src="img/logo.jpg"></a>
			<div class="nav_left">	
			</div>
			<div class="nav_right">

			<p>
			<a href="sign.html" ><p style:"font-family:arial;;text-align:center;">Sign in</p></a>
			</p>
			</div>
		</div>
		<div class="sign_in">
			<center>
				<br>
<?php
    session_start();
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
  
if (empty($login) or empty($password)) 
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);

    $login = trim($login);
    $password = trim($password);

    include ("db.php");
 
    $result = mysql_query("SELECT * FROM users WHERE login='$login'",$db);
    $myrow = mysql_fetch_array($result);
    if (empty($myrow['password']))
    {
    
    exit ("Извините, введённый вами логин или пароль неверный.");
    }
    else {

    if ($myrow['password']==$password) {
  
    $_SESSION['login']=$myrow['login']; 
    $_SESSION['id']=$myrow['id'];
    header('location:index.php');
    }
 else {
  

    exit ("Извините, введённый вами логин или пароль неверный.");
    }
    }
    ?>

 </center
		</div>


		</div>
		</body>
	</div>
</body>
</html>
