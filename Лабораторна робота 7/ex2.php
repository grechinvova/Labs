<!DOCTYPE html>
 <html>
 <head> 
 <meta charset="utf-8"> 
 </head> 
 <body> 
 <div>
<?php
if ($_FILES['userfile']['error'] !== "0"){
$uploaddir = '/texts/';
$uploadfile = __DIR__ . '/texts/' . basename($_FILES['userfile']['name']);
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "Файл корректен и был успешно загружен.\n";
} else {
    echo "Возможная атака с помощью файловой загрузки!\n";
}
echo $_FILES['userfile']['name'];} else echo $_FILES['userfile']['error'];
$filename = "";
if ($_POST['filename'] !== ""){
$filename = $_POST['filename'];
if (file_exists(__DIR__ .'/texts/'.$filename)){
$file = fopen(__DIR__ .'/texts/'.$filename, 'r');
while (!feof($file)) {
    echo "<p>".fgets($file)."</p>";
}
fclose($file);} else echo "pinj[ognj[dfkigpkdfm";}
?>
</div>
 <form enctype="multipart/form-data" method="POST">
	 <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
	 Отправить этот файл: <input name="userfile" type="file" accept="text/plain"/>
	 <input name="filename">
     <input type="submit" value="submit">
 </form>
 </body> 
 </html> 
 </body> 
 </html>