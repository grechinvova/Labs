<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<div>
<?php
include "users.php";
$login = "";
$password = "";
$username = "";
    if (array_key_exists($_POST['login'],$users)){
	if($users[$_POST['login']][0] == $_POST['password']){
	$login = $_POST['login']; $password = $_POST['password']; $username = $users[$_POST['login']][1];}
	} else echo "qwrregrtfhj";
echo "<br> Ваш логін: $login <br> Ваш пароль: $password <br> Ваш ім'я користувача: $username <br>"; 
?>
</div>
<h3>Вхід на сайт</h3>
<form method="POST">
    Логін: <input type="text" name="login">
    Пароль: <input type="text" name="password">
    <input type="submit" value="Увійти">
</form>
</body>
</html>