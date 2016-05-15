<!DOCTYPE html>
<html>
<head>
	<title>Watches</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	
</head>
<body style="background-color:#FDFDFD">
	<div class="wall">
		<div class="nav">
		<a href="index.php"><img src="img/logo.jpg"></a>
			<div class="nav_left">

				
			</div>
			<div class="nav_right">

			<p>
			<a href="sign.html" >Sign in</a>
			</p>
			</div>
		</div>
		<div class="sign_in">
			<center>
				<br>
 <head>
    <meta charset="utf-8">
</head>
<?php
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
   
 if (empty($login) or empty($password)) 
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);


    $login = trim($login);
    $password = trim($password);

    include ("db.php");
    $result = mysql_query("SELECT id FROM users WHERE login='$login'",$db);
    $myrow = mysql_fetch_array($result);
    if (!empty($myrow['id'])) {
    echo"Извините, введённый вами логин уже зарегистрирован. Введите другой логин.";
    echo "<hr>";
    }else{ 
    $result2 = mysql_query ("INSERT INTO users (login,password) VALUES('$login','$password')");
    
    if ($result2=='TRUE')
    {if($password==$_POST['password_r']){
    echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='sign.html'>Главная страница</a>";
}
    }
 else {
    echo "Ошибка! Вы не зарегистрированы.";
    echo "";
    }}
    ?>

 </center
		</div>


		</div>
		</body>
	</div>
</body>
</html>
