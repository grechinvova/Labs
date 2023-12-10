<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<div>
<?php
$login = "";
$mail = "";
$text = "";
$fname = "";
$fsize = "";
$ftype = "";
$ftmp = "";
$ferror = "";
    if(isset($_POST['login'])) $login = $_POST['login'];
    if (isset($_POST['mail'])) $mail = $_POST['mail'];  
    if (isset($_POST['text'])) $text = $_POST['text'];	
	switch ($_FILES['userfile']['error']){
	case 1: echo "Размер принятого файла превысил максимально допустимый размер."; break;
	case 2: echo "Размер загружаемого файла превысил значение."; break;
	case 3: echo "Загружаемый файл был получен только частично."; break;
	case 4: echo "Файл не был загружен."; break;
	case 6: echo "Отсутствует временная папка."; break;
	case 7: echo "Не удалось записать файл на диск."; break;
	case 8: echo "Модуль PHP остановил загрузку файла."; break;
	default: { $fname = $_FILES['userfile']['name']; $fsize = $_FILES['userfile']['size']; $ftype = $_FILES['userfile']['type']; $ftmp = $_FILES['userfile']['tmp_name']; $ferror = $_FILES['userfile']['error'];
	echo "І`мя файлу:$fname
	<br> Тип файлу: $ftype
	<br> Розмір файлу: $fsize 
	<br> Тимчасове імя файлу: $ftmp 
	<br> Помилка файлу: $ferror <br>";}}
echo "<br> І`мя користувача: $login <br> Почта: $mail <br> Текст повідомлення: $text <br>"; 
?>
</div>
<h3>Вхід на сайт</h3>
<form enctype="multipart/form-data" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
	І`мя: <input type="text" name="login" required>
    Почта: <input type="email" name="mail" required>
	<p>Текст повідомлення: <textarea name="text" required></textarea>
	Файл: <input name="userfile" type="file" /></p>
    <input type="submit" value="Відправити">
</form>
</body>
</html>